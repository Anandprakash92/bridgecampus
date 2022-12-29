<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Unitestimonial;

/**
 * UnitestimonialSearch represents the model behind the search form of `common\models\Unitestimonial`.
 */
class UnitestimonialSearch extends Unitestimonial
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'contact_number'], 'integer'],
            [['visitor_name', 'course','program','visitor_photo', 'highest_edu', 'year_completion', 'current_status', 'email_id', 'summ_testimonial', 'intern_placement', 'infrastructure', 'hostel', 'faculty', 'course_curriculum', 'library', 'status', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params,$id,$type='university')
    {
        $query = Unitestimonial::find();
        if($type == 'university'){
            $query->andWhere(['unitestimonial.col_uniID'=>$id]);
        }else{
            $query->andWhere(['unitestimonial.col_uniID'=>$id]);
        }

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
            'contact_number' => $this->contact_number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'visitor_name', $this->visitor_name])
            ->andFilterWhere(['like', 'visitor_photo', $this->visitor_photo])
            ->andFilterWhere(['like', 'highest_edu', $this->highest_edu])
            ->andFilterWhere(['like', 'year_completion', $this->year_completion])
            ->andFilterWhere(['like', 'current_status', $this->current_status])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'summ_testimonial', $this->summ_testimonial])
            ->andFilterWhere(['like', 'intern_placement', $this->intern_placement])
            ->andFilterWhere(['like', 'infrastructure', $this->infrastructure])
            ->andFilterWhere(['like', 'hostel', $this->hostel])
            ->andFilterWhere(['like', 'faculty', $this->faculty])
            ->andFilterWhere(['like', 'course_curriculum', $this->course_curriculum])
            ->andFilterWhere(['like', 'library', $this->library])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'course', $this->course])
            ->andFilterWhere(['like', 'program', $this->program]);

        return $dataProvider;
    }
}
