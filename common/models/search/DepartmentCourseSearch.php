<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DepartmentCourse;

/**
 * ExamCategorySearch represents the model behind the search form of `common\models\ExamCategory`.
 */
class DepartmentCourseSearch extends DepartmentCourse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'departmentID', 'courseID', 'createdBy', 'updatedBy'], 'integer'],
            [['courseID', 'courseID', 'createdBy'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = DepartmentCourse::find();
//        if($type == 'university'){
//            $query->andWhere(['university_college_course.universityID'=>$id,'university_college_course.collegeID'=>NULL]);
//        }else{
//            $query->andWhere(['university_college_course.collegeID'=>$id]);
//        }

        $query->joinWith(['course'=>function($q){
            $q->joinWith(['program']);
        }]);
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
            'departmentID' => $params['fid'],
            'courseID' => $this->courseID,
        ]);

        $query->andFilterWhere(['like', 'departmentID', $params['fid']])
        ->andFilterWhere(['like', 'courses.name', $this->courseID]);
//        ->andFilterWhere(['like', 'program.name', $this->program_name]);

        return $dataProvider;
    }
}
