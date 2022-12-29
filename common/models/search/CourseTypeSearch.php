<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CourseType;

/**
 * CourseTypeSearch represents the model behind the search form of `common\models\CourseType`.
 */
class CourseTypeSearch extends CourseType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'createdBy', 'updatedBy', 'statue'], 'integer'],
            [['name', 'createdDate', 'updatedDate'], 'safe'],
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
        $query = CourseType::find();

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
            'createdDate' => $this->createdDate,
            'createdBy' => $this->createdBy,
            'updatedDate' => $this->updatedDate,
            'updatedBy' => $this->updatedBy,
            'statue' => $this->statue,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
