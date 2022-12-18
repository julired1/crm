<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employees;


/**
 * EmployeesSearch represents the model behind the search form of `app\models\Employees`.
 */
class EmployeesSearch extends Employees
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type', 'region', 'status', 'phone'], 'integer'],
            [['name', 'naks', 'speciality', 'email', 'birthday', 'education', 'worktime'], 'safe'],
            [['examination', 'criminal', 'medical'], 'boolean'],
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
        $query = Employees::find();

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
            'type' => $this->type,
            'naks' => $this->naks,
            'region' => $this->region,
            'examination' => $this->examination,
            'criminal' => $this->criminal,
            'status' => $this->status,
            'birthday' => $this->birthday,
            'phone' => $this->phone,
            'medical' => $this->medical,
            'worktime' => $this->worktime,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'speciality', $this->speciality])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'education', $this->education]);

        return $dataProvider;
    }
}
