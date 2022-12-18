<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cost;

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
    public function search(array $params):ActiveDataProvider {
        $query = new Query();
        $query
                ->from(['employees_id' => 'project.project_process'])
                ->innerJoin(['part' => 'project.cost_table'], 'pp.cost_table_num = part.num')
                ->innerJoin(['proj' => 'project.cost'], 'employees_id.project_id = proj.id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $this->createSort(),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query
                ->andFilterWhere(['ilike', 'part.code', $this->project_part])
                ->andFilterWhere([
            'building_id' => $this->building_id,
            'employees_id' => $this->employees_id,
            'product' => $this->product,
            'price' => $this->price,
            'id' => $this->id,
            
        ]);
        

        return $dataProvider;
    }
}
$rows = self::find()->alias('t')
->joinWith('ideaTags it', false)
->groupBy('t.id')
->select('t.id, t.name, count(it.idea_id) c')
->orderBy('t.name')
->asArray()
->all();

$models = Document::find()
->alias('d')
->andWhere("d.date_reg is not null")
->all();