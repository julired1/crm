<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "building".
 *
 * @property int $id
 * @property string $title
 * @property int|null $region
 * @property bool|null $trials
 * @property int|null $status
 * @property int|null $phone
 *
 * @property Cost[] $costs
 * @property Payroll[] $payrolls
 * @property Workman[] $workmen
 */
class Building extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'building';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string'],
            [['region', 'status', 'phone'], 'default', 'value' => null],
            [['region', 'status', 'phone'], 'integer'],
            [['trials'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'region' => 'Region',
            'trials' => 'Trials',
            'status' => 'Status',
            'phone' => 'Phone',
        ];
    }

    /**
     * Gets query for [[Costs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCosts()
    {
        return $this->hasMany(Cost::class, ['building_id' => 'id']);
    }

    /**
     * Gets query for [[Payrolls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayrolls()
    {
        return $this->hasMany(Payroll::class, ['building_id' => 'id']);
    }

    /**
     * Gets query for [[Workmen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkmen()
    {
        return $this->hasMany(Workman::class, ['building_id' => 'id']);
    }
}
