<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cost".
 * @property int @id 
 * @property int $building_id Объект
 * @property int $employees_id Сотрудник
 * @property int|null $product Наименование
 * @property float $price Цена
 *
 * @property Building $building
 * @property Employees $employees
 * @property Cost[] $costs
 * @property Cost[] $costsearch
 * @property CostSearch::search(array $params)
 * @property Region $buildingObj
 * @property Region $employeesObj



 */
class Cost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cost';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['building_id', 'employees_id', 'price'], 'required'],
            [['building_id', 'employees_id',], 'default', 'value' => null],
            [['building_id', 'employees_id'], 'integer'],
            [['product'],'string'],
            [['price'], 'number'],
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
            'id' => 'ID',
            'building_id' => 'Объект',
            'employees_id' => 'Сотрудник',
            'product' => 'Наименование',
            'price' => 'Стоимость',
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
      public function getCosts()
    {
        return $this->hasMany(Cost::class, ['employees_id' => 'id']);
    }
        public function getBuildingObj()
    {
        return $this->hasOne(Building::class, ['id' => 'building']);
    }
         public function getEmployeesObj()
    {
        return $this->hasOne(Employees::class, ['id' => 'employees']);
    }
    /**
        * 
        * @return array
        */
       public static function getList(): array{
           $models = self::find()->orderBy('title')->all();
           $list =[];
           foreach($models as $model){
           $list[$model->id] = $model->title;
           }
           return $list;
       }
       
}


