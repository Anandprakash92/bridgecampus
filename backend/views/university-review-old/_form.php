<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\UniversityReview */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="university-review-form">
    <div class="custumbox box box-info">
       <div class="box-body">

        <?php $form = ActiveForm::begin([
         'layout' => 'horizontal',
         'enableClientValidation' => true,
         'enableAjaxValidation' => false,
         'options' => ['enctype' => 'multipart/form-data'],
     ]);?>
     <br/>

    <?= $form->field($model, 'visitor_name')->textInput(['maxlength' => true]) ?>
     
     <?php
    $universityName = ArrayHelper::map(\common\models\University::find()->where(['status' => 1])->asArray()->all(),'id','name');
    echo $form->field($model, 'university_name')->widget(Select2::classname(), [
        'name' => 'university_name',
        'data' => $universityName,
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select University ...',],
            'pluginOptions' => [
                'allowClear' => true
        ]
      ]);
    ?> 
     
    <?php
    $courseName = ArrayHelper::map(\common\models\Courses::find()->where(['status' => 1])->asArray()->all(),'id','name');
    echo $form->field($model, 'course')->widget(Select2::classname(), [
        'name' => 'course',
        'data' => $courseName,
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Course ...',],
            'pluginOptions' => [
                'allowClear' => true
        ]
      ]);
    ?> 

    <?php // echo $form->field($model, 'program')->textInput(['maxlength' => true]) ?>

    <?php
    $programName = ArrayHelper::map(\common\models\Program::find()->where(['status' => 1])->asArray()->all(),'id','name');
    echo $form->field($model, 'program')->widget(Select2::classname(), [
        'name' => 'program',
        'data' => $programName,
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Program ...',],
            'pluginOptions' => [
                'allowClear' => true
        ]
      ]);
    ?> 
    <?= $form->field($model, 'highest_education')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'year_completion')->textarea(['rows' => 6]) ?>
 
    <?= $form->field($model, 'current_status')->dropDownList([ 1 => 'Currently Studing', 2 => 'Recent passed out', 3=> 'Alumna / Alumnus'], ['prompt' => '']) ?>

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

    <?= $form->field($model, 'admission_recommend')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'other_reviews')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'review_status')->dropDownList([ 1 => 'Approved', 2 => 'Pending', 3 => 'Blocked' ], ['prompt' => 'Select Status'])->label('Status') ?>
    


     <div class="form-group" style="margin-left: 18% !important;">
        <button id="back_btn" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
       <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'load' ,'data-loading-text'=>"<i class='fa fa-spinner fa-spin '></i> Processing"]) ?>
   </div>


   <?php ActiveForm::end(); ?>
</div>
</div>
</div>

<?php $this->registerJs("".Yii::$app->myhelper->formsubmitedbyajax('w0','../university-review/index')."");?>
