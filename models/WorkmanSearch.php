<?php

namespace app\models;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Workman;

/**
 * WorkmanSearch represents the model behind the search form of `app\models\Workman`.
 */
class WorkmanSearch extends Workman
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['building_id', 'employees_id', 'limit', 'id'], 'integer'],
            [['medical', 'criminal', 'examination'], 'boolean'],
            [['naks', 'speciality', 'education'], 'safe'],
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
        $query = Workman::find();

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
            'building_id' => $this->building_id,
            'employees_id' => $this->employees_id,
            'medical' => $this->medical,
            'naks' => $this->naks,
            'criminal' => $this->criminal,
            'limit' => $this->limit,
            'examination' => $this->examination,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['ilike', 'speciality', $this->speciality])
            ->andFilterWhere(['ilike', 'education', $this->education]);

        return $dataProvider;
    }
}
