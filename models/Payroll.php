<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payroll".
 * @property int $id
 * @property int $employees_id Сотрудник
 * @property string $name ФИО
 * @property int $building_id Объект
 * @property string|null $speciality Специальность
 * @property string|null $worktime Рабочее время
 * @property int|null $coefficient Зарплатный коэффициент
 * @property int|null $vat НДС
 * @property int|null $daily Cуточные
 * @property int|null $hourly Часовая ставка
 *
 * @property Building $building
 * @property Employees $employees
 */
class Payroll extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payroll';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employees_id', 'name', 'building_id'], 'required'],
            [['employees_id', 'building_id', 'coefficient', 'vat', 'daily', 'hourly'], 'default', 'value' => null],
            [['employees_id', 'building_id', 'coefficient', 'vat', 'daily', 'hourly'], 'integer'],
            [['name', 'speciality'], 'string'],
            [['worktime'], 'safe'],
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
            'employees_id' => 'Сотрудник',
            'name' => 'ФИО',
            'building_id' => 'Объект',
            'speciality' => 'Специальность',
            'worktime' => 'Рабочее время',
            'coefficient' => 'Зарплатный коэффициент',
            'vat' => 'НДС',
            'daily' => 'Cуточные',
            'hourly' => 'Часовая ставка',
        ];
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
