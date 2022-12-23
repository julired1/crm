<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Building;
use app\models\BuildingSearch;


/**
 * BuildingSearch represents the model behind the search form of `app\models\Building`.
 */
class BuildingSearch extends Building
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'region', 'status','limit'], 'integer'],
            [['title','phone'], 'safe'],
            [['trials'], 'boolean'],
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
    public function search($params)
    {
        $query = Building::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'region' => $this->region,
            'trials' => $this->trials,
            'status' => $this->status,
            'phone' => $this->phone,
            'limit'=> $this->limit,
        ]);

        $query->andFilterWhere(['ilike', 'title', $this->title]);

        return $dataProvider;
    }
}
