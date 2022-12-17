<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $name ФИО
 * @property int $type
 * @property string|null $naks НАКС
 * @property string|null $speciality Должность
 * @property int|null $region Регион
 * @property bool|null $examination Аттестация
 * @property bool|null $criminal Судимость
 * @property int|null $status Статус
 * @property string|null $email Email адрес
 * @property string $birthday Дата рождения
 * @property int|null $phone Телефон
 * @property bool|null $medical Медицинский осмотр
 * @property string|null $education Образование
 * @property string|null $worktime Рабочее время
 * @property string $password_hash
 * @property boolean $is_admin;
 *
 * @property Cost[] $costs
 * @property Identification[] $identifications
 * @property Payroll[] $payrolls
 * @property Workman[] $workmen
 * @property Region $regionObj
 */
class Employees extends \yii\db\ActiveRecord
{
    const TYPE_ADMIN=1;
    const TYPE_TEACHER =2;
    const TYPE_STUDENT=3;
    
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function beforeValidate() {
        if($this->password) {
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);            
        }
        return parent::beforeValidate();
    }

    public function rules()
    {
        return [
            [['name', 'type', 'birthday', 'is_admin'], 'required'],
            [['region', 'status', 'phone'], 'default', 'value' => null],
            [['password'],'string','max'=>20],
            [['region', 'status', 'phone'], 'integer'],
            [['naks', 'birthday', 'worktime'], 'safe'],
            [['speciality', 'email', 'education','password_hash'], 'string'],
            [['email'],'email'],
            [['examination', 'criminal', 'medical','is_admin'], 'boolean'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'password'=>'Пароль',
            'password_hash' => 'Хеш пароля',
            'is_admin' => 'Администратор',
            'type' => 'Type',
            'naks' => 'НАКС',
            'speciality' => 'Должность',
            'region' => 'Регион',
            'examination' => 'Аттестация',
            'criminal' => 'Судимость',
            'status' => 'Статус',
            'email' => 'Email адрес',
            'birthday' => 'Дата рождения',
            'phone' => 'Телефон',
            'medical' => 'Медицинский осмотр',
            'education' => 'Образование',
            'worktime' => 'Рабочее время',
        ];
    }

    /**
     * Gets query for [[Costs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCosts()
    {
        return $this->hasMany(Cost::class, ['employees_id' => 'id']);
    }

    /**
     * Gets query for [[Identifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdentifications()
    {
        return $this->hasMany(Identification::class, ['employees_id' => 'id']);
    }

    /**
     * Gets query for [[Payrolls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayrolls()
    {
        return $this->hasMany(Payroll::class, ['employees_id' => 'id']);
    }

    /**
     * Gets query for [[Workmen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkmen()
    {
        return $this->hasMany(Workman::class, ['employees_id' => 'id']);
    }
}
