<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CollegeReview */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="college-review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'visitor_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'university_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'highest_education')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'year_completion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'current_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sumerize_review')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'placement_percent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'placement_salary_offer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'placement_companies')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'placement_roles')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'placement_internship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infra_infrastructure')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'infra_falilities')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hostel_boys')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hostel_mesh')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hostel_ac')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hostel_other_facilities')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hostel_bed_shared')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hostel_girl_other_facilities')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hostel_girl_mesh')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hostel_girl_ac')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'hostel_girl_facilities')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hostel_girl_bed_shared')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'facility_course')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_details_course_best')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_details_course_improve')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'other_details_course_extra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_review')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate_value_money')->textInput() ?>

    <?= $form->field($model, 'rate_infra')->textInput() ?>

    <?= $form->field($model, 'rate_food_acc')->textInput() ?>

    <?= $form->field($model, 'rate_college_crowd')->textInput() ?>

    <?= $form->field($model, 'rate_campus_life')->textInput() ?>

    <?= $form->field($model, 'rate_faculty')->textInput() ?>

    <?= $form->field($model, 'rate_visiting_faculty_lectures')->textInput() ?>

    <?= $form->field($model, 'rate_admin_staff')->textInput() ?>

    <?= $form->field($model, 'rate_course_curriculum')->textInput() ?>

    <?= $form->field($model, 'rate_internship')->textInput() ?>

    <?= $form->field($model, 'rate_placement')->textInput() ?>

    <?= $form->field($model, 'admission_recommend')->textInput() ?>

    <?= $form->field($model, 'other_reviews')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_status')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'course')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'program')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
