<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CollegeReview */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'College Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="college-review-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'visitor_name',
            'university_name',
            'highest_education:ntext',
            'year_completion:ntext',
            'current_status',
            'email_id:ntext',
            'contact_number',
            'sumerize_review',
            'placement_percent',
            'placement_salary_offer',
            'placement_companies',
            'placement_roles',
            'placement_internship',
            'infra_infrastructure',
            'infra_falilities',
            'hostel_boys',
            'hostel_mesh',
            'hostel_ac',
            'hostel_other_facilities',
            'hostel_bed_shared',
            'hostel_girl_other_facilities',
            'hostel_girl_mesh',
            'hostel_girl_ac',
            'hostel_girl_facilities',
            'hostel_girl_bed_shared',
            'facility_course',
            'other_details_course_best',
            'other_details_course_improve',
            'other_details_course_extra',
            'title_review',
            'rate_value_money',
            'rate_infra',
            'rate_food_acc',
            'rate_college_crowd',
            'rate_campus_life',
            'rate_faculty',
            'rate_visiting_faculty_lectures',
            'rate_admin_staff',
            'rate_course_curriculum',
            'rate_internship',
            'rate_placement',
            'admission_recommend',
            'other_reviews',
            'review_status:ntext',
            'course',
            'program',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
