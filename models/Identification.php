<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "identification".
 * @property int $id
 * @property int|null $employees_id Сотрудник
 * @property string $name ФИО
 * @property string|null $email Email адрес
 * @property string|null $password Пароль
 *
 * @property Employees $employees
 */
class Identification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'identification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employees_id'], 'default', 'value' => null],
            [['employees_id'], 'integer'],
            [['name'], 'required'],
            [['email'], 'string'],
            [['name', 'password'], 'string', 'max' => 255],
            [['employees_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::class, 'targetAttribute' => ['employees_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employees_id' => 'Сотрудник',
            'name' => 'ФИО',
            'email' => 'Email адрес',
            'password' => 'Пароль',
        ];
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
