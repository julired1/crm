<?php

namespace app\models;


use Yii;
use app\models\Employees;
use app\models\Building;
/**
 * This is the model class for table "workman".
 * @property int $id
 * @property int $building_id Объект
 * @property int $employees_id Сотрудник
 * @property bool|null $medical Медицинский осмотр
 * @property string|null $naks НАКС
 * @property bool|null $criminal Судимость
 * @property string|null $speciality Специальность
 * @property int $limit Количество требуемых сотрудников
 * @property bool $examination Аттестация
 * @property string $education Образование
 *
 * @property Building $building
 * @property Employees $employees
 */
class Workman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['building_id', 'employees_id', 'limit', 'examination', 'education'], 'required'],
            [['building_id', 'employees_id', 'limit'], 'default', 'value' => null],
            [['building_id', 'employees_id', 'limit'], 'integer'],
            [['medical', 'criminal', 'examination'], 'boolean'],
            [['naks'], 'safe'],
            [['speciality', 'education'], 'string'],
            [['building_id'], 'exist', 'skipOnError' => true, 'targetClass' => Building::class, 'targetAttribute' => ['building_id' => 'id']],
            [['employees_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::class, 'targetAttribute' => ['employees_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'=> 'ID',
            'building_id' => 'Объект',
            'employees_id' => 'Сотрудник',
            'medical' => 'Медицинский осмотр',
            'naks' => 'НАКС',
            'criminal' => 'Судимость',
            'speciality' => 'Специальность',
            'limit' => 'Количество требуемых сотрудников',
            'examination' => 'Аттестация',
            'education' => 'Образование',
        ];
    }
    public function beforeValidate() {
        if($this->building && $this->building->status == 2 && $this instanceof Workman) {
            $this->addError('building_id', 'Нельзя назначать на завершенный объект!');
        }
        if($this->employees && $this->employees->status == 2 && $this instanceof Workman) {
            $this->addError('employees_id', 'Сотрудник уволен!');
        
    }
    return parent::beforeValidate();
    }    

    /**
     * Gets query for [[Building]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuilding()
    {
        return $this->hasOne(Building::class, ['id' => 'building_id']);
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasOne(Employees::class, ['id' => 'employees_id']);
    }
}
