<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CollegeReviewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'College Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-review-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create College Review', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'visitor_name',
            'university_name',
            'highest_education:ntext',
            'year_completion:ntext',
            //'current_status',
            //'email_id:ntext',
            //'contact_number',
            //'sumerize_review',
            //'placement_percent',
            //'placement_salary_offer',
            //'placement_companies',
            //'placement_roles',
            //'placement_internship',
            //'infra_infrastructure',
            //'infra_falilities',
            //'hostel_boys',
            //'hostel_mesh',
            //'hostel_ac',
            //'hostel_other_facilities',
            //'hostel_bed_shared',
            //'hostel_girl_other_facilities',
            //'hostel_girl_mesh',
            //'hostel_girl_ac',
            //'hostel_girl_facilities',
            //'hostel_girl_bed_shared',
            //'facility_course',
            //'other_details_course_best',
            //'other_details_course_improve',
            //'other_details_course_extra',
            //'title_review',
            //'rate_value_money',
            //'rate_infra',
            //'rate_food_acc',
            //'rate_college_crowd',
            //'rate_campus_life',
            //'rate_faculty',
            //'rate_visiting_faculty_lectures',
            //'rate_admin_staff',
            //'rate_course_curriculum',
            //'rate_internship',
            //'rate_placement',
            //'admission_recommend',
            //'other_reviews',
            //'review_status:ntext',
            //'course',
            //'program',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
