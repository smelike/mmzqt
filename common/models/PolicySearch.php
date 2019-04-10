<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Policy;

/**
 * PolicySearch represents the model behind the search form of `common\models\Policy`.
 */
class PolicySearch extends Policy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['policy_id', 'type_id', 'open_time', 'end_time', 'support_way', 'charge_depart', 'industry', 'scale', 'rank', 'status', 'is_recommend', 'create_time', 'update_time'], 'integer'],
            [['thumb', 'title', 'age', 'brief', 'requirement', 'support_content', 'material', 'original_info', 'manual'], 'safe'],
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
        $query = Policy::find();

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
            'policy_id' => $this->policy_id,
            'type_id' => $this->type_id,
            'open_time' => $this->open_time,
            'end_time' => $this->end_time,
            'support_way' => $this->support_way,
            'charge_depart' => $this->charge_depart,
            'industry' => $this->industry,
            'scale' => $this->scale,
            'rank' => $this->rank,
            'status' => $this->status,
            'is_recommend' => $this->is_recommend,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'thumb', $this->thumb])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'age', $this->age])
            ->andFilterWhere(['like', 'brief', $this->brief])
            ->andFilterWhere(['like', 'requirement', $this->requirement])
            ->andFilterWhere(['like', 'support_content', $this->support_content])
            ->andFilterWhere(['like', 'material', $this->material])
            ->andFilterWhere(['like', 'original_info', $this->original_info])
            ->andFilterWhere(['like', 'manual', $this->manual]);

        return $dataProvider;
    }
}
