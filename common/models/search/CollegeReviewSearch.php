<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CollegeReview;

/**
 * CollegeReviewSearch represents the model behind the search form of `common\models\CollegeReview`.
 */
class CollegeReviewSearch extends CollegeReview
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'contact_number', 'admission_recommend'], 'integer'],
            [['visitor_name', 'college_name', 'highest_education', 'year_completion', 'current_status', 'email_id', 'sumerize_review', 'placement_percent', 'placement_salary_offer', 'placement_companies', 'placement_roles', 'placement_internship', 'infra_infrastructure', 'infra_falilities', 'hostel_boys', 'hostel_mesh', 'hostel_ac', 'hostel_other_facilities', 'hostel_bed_shared', 'hostel_girl_other_facilities', 'hostel_girl_mesh', 'hostel_girl_ac', 'hostel_girl_facilities', 'hostel_girl_bed_shared', 'facility_course', 'other_details_course_best', 'other_details_course_improve', 'other_details_course_extra', 'title_review', 'other_reviews', 'review_status', 'course', 'program', 'created_at', 'updated_at'], 'safe'],
            [['rate_value_money', 'rate_infra', 'rate_food_acc', 'rate_college_crowd', 'rate_campus_life', 'rate_faculty', 'rate_visiting_faculty_lectures', 'rate_admin_staff', 'rate_course_curriculum', 'rate_internship', 'rate_placement'], 'number'],
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
        $query = CollegeReview::find();

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
            'rate_value_money' => $this->rate_value_money,
            'rate_infra' => $this->rate_infra,
            'rate_food_acc' => $this->rate_food_acc,
            'rate_college_crowd' => $this->rate_college_crowd,
            'rate_campus_life' => $this->rate_campus_life,
            'rate_faculty' => $this->rate_faculty,
            'rate_visiting_faculty_lectures' => $this->rate_visiting_faculty_lectures,
            'rate_admin_staff' => $this->rate_admin_staff,
            'rate_course_curriculum' => $this->rate_course_curriculum,
            'rate_internship' => $this->rate_internship,
            'rate_placement' => $this->rate_placement,
            'admission_recommend' => $this->admission_recommend,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'visitor_name', $this->visitor_name])
            ->andFilterWhere(['like', 'college_name', $this->college_name])
            ->andFilterWhere(['like', 'highest_education', $this->highest_education])
            ->andFilterWhere(['like', 'year_completion', $this->year_completion])
            ->andFilterWhere(['like', 'current_status', $this->current_status])
            ->andFilterWhere(['like', 'email_id', $this->email_id])
            ->andFilterWhere(['like', 'sumerize_review', $this->sumerize_review])
            ->andFilterWhere(['like', 'placement_percent', $this->placement_percent])
            ->andFilterWhere(['like', 'placement_salary_offer', $this->placement_salary_offer])
            ->andFilterWhere(['like', 'placement_companies', $this->placement_companies])
            ->andFilterWhere(['like', 'placement_roles', $this->placement_roles])
            ->andFilterWhere(['like', 'placement_internship', $this->placement_internship])
            ->andFilterWhere(['like', 'infra_infrastructure', $this->infra_infrastructure])
            ->andFilterWhere(['like', 'infra_falilities', $this->infra_falilities])
            ->andFilterWhere(['like', 'hostel_boys', $this->hostel_boys])
            ->andFilterWhere(['like', 'hostel_mesh', $this->hostel_mesh])
            ->andFilterWhere(['like', 'hostel_ac', $this->hostel_ac])
            ->andFilterWhere(['like', 'hostel_other_facilities', $this->hostel_other_facilities])
            ->andFilterWhere(['like', 'hostel_bed_shared', $this->hostel_bed_shared])
            ->andFilterWhere(['like', 'hostel_girl_other_facilities', $this->hostel_girl_other_facilities])
            ->andFilterWhere(['like', 'hostel_girl_mesh', $this->hostel_girl_mesh])
            ->andFilterWhere(['like', 'hostel_girl_ac', $this->hostel_girl_ac])
            ->andFilterWhere(['like', 'hostel_girl_facilities', $this->hostel_girl_facilities])
            ->andFilterWhere(['like', 'hostel_girl_bed_shared', $this->hostel_girl_bed_shared])
            ->andFilterWhere(['like', 'facility_course', $this->facility_course])
            ->andFilterWhere(['like', 'other_details_course_best', $this->other_details_course_best])
            ->andFilterWhere(['like', 'other_details_course_improve', $this->other_details_course_improve])
            ->andFilterWhere(['like', 'other_details_course_extra', $this->other_details_course_extra])
            ->andFilterWhere(['like', 'title_review', $this->title_review])
            ->andFilterWhere(['like', 'other_reviews', $this->other_reviews])
            ->andFilterWhere(['like', 'review_status', $this->review_status])
            ->andFilterWhere(['like', 'course', $this->course])
            ->andFilterWhere(['like', 'program', $this->program]);

        return $dataProvider;
    }
}
