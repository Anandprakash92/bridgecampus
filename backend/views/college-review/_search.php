<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\CollegeReviewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="college-review-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'visitor_name') ?>

    <?= $form->field($model, 'university_name') ?>

    <?= $form->field($model, 'highest_education') ?>

    <?= $form->field($model, 'year_completion') ?>

    <?php // echo $form->field($model, 'current_status') ?>

    <?php // echo $form->field($model, 'email_id') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'sumerize_review') ?>

    <?php // echo $form->field($model, 'placement_percent') ?>

    <?php // echo $form->field($model, 'placement_salary_offer') ?>

    <?php // echo $form->field($model, 'placement_companies') ?>

    <?php // echo $form->field($model, 'placement_roles') ?>

    <?php // echo $form->field($model, 'placement_internship') ?>

    <?php // echo $form->field($model, 'infra_infrastructure') ?>

    <?php // echo $form->field($model, 'infra_falilities') ?>

    <?php // echo $form->field($model, 'hostel_boys') ?>

    <?php // echo $form->field($model, 'hostel_mesh') ?>

    <?php // echo $form->field($model, 'hostel_ac') ?>

    <?php // echo $form->field($model, 'hostel_other_facilities') ?>

    <?php // echo $form->field($model, 'hostel_bed_shared') ?>

    <?php // echo $form->field($model, 'hostel_girl_other_facilities') ?>

    <?php // echo $form->field($model, 'hostel_girl_mesh') ?>

    <?php // echo $form->field($model, 'hostel_girl_ac') ?>

    <?php // echo $form->field($model, 'hostel_girl_facilities') ?>

    <?php // echo $form->field($model, 'hostel_girl_bed_shared') ?>

    <?php // echo $form->field($model, 'facility_course') ?>

    <?php // echo $form->field($model, 'other_details_course_best') ?>

    <?php // echo $form->field($model, 'other_details_course_improve') ?>

    <?php // echo $form->field($model, 'other_details_course_extra') ?>

    <?php // echo $form->field($model, 'title_review') ?>

    <?php // echo $form->field($model, 'rate_value_money') ?>

    <?php // echo $form->field($model, 'rate_infra') ?>

    <?php // echo $form->field($model, 'rate_food_acc') ?>

    <?php // echo $form->field($model, 'rate_college_crowd') ?>

    <?php // echo $form->field($model, 'rate_campus_life') ?>

    <?php // echo $form->field($model, 'rate_faculty') ?>

    <?php // echo $form->field($model, 'rate_visiting_faculty_lectures') ?>

    <?php // echo $form->field($model, 'rate_admin_staff') ?>

    <?php // echo $form->field($model, 'rate_course_curriculum') ?>

    <?php // echo $form->field($model, 'rate_internship') ?>

    <?php // echo $form->field($model, 'rate_placement') ?>

    <?php // echo $form->field($model, 'admission_recommend') ?>

    <?php // echo $form->field($model, 'other_reviews') ?>

    <?php // echo $form->field($model, 'review_status') ?>

    <?php // echo $form->field($model, 'course') ?>

    <?php // echo $form->field($model, 'program') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
