<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cost;
use app\models\CostSearch;


/**
 * CostSearch represents the model behind the search form of `app\models\Cost`.
 */
class CostSearch extends Cost
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['building_id', 'employees_id', 'product', 'id'], 'integer'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    public $searchCost;
    public function search(array $params):ActiveDataProvider {
                    $query = Cost::find();

        $query = new Query();
        $query
                ->from();
  
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['updated_at' => SORT_DESC],
                'params' => \Yii::$app->getRequest()->post(),
                'attributes' => [
                    'building_id',
                    'employees_id',
                    'price',
                    'product',
                ],
            ],
            'pagination' => [
            ]
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query
                ->andFilterWhere([
            'building_id' => $this->building_id,
            'employees_id' => $this->employees_id,
            'product' => $this->product,
            'price' => $this->price,
            'id' => $this->id,
            
        ]);
        $models = $query->all();

        return $dataProvider;
    }
}

