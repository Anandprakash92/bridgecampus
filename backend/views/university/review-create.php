<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model common\models\UniversityReview */
/* @var $form yii\widgets\ActiveForm */

if($model->isNewRecord){

  $this->title = $university->name.' Review';
  $this->params['subtitle'] = '<h1>Review</h1>';
  $this->params['breadcrumbs'][] = ['label' => 'Universities', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $university->name;
  $this->params['breadcrumbs'][] = 'Review';
}else{
  $this->title = $university->name.' Update Review';
  $this->params['subtitle'] = '<h1>Update Review</h1>';
  $this->params['breadcrumbs'][] = ['label' => 'Universities', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $university->name;
  $this->params['breadcrumbs'][] = 'Update Review';
}
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
     
     <?= $form->field($model, 'course')->widget(Select2::classname(), [
       'name' => 'course',
        'data' => Yii::$app->myhelper->getCourse(),
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Course'],
            'pluginOptions' => [
                'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'program')->widget(Select2::classname(), [
       'name' => 'program',
        'data' => Yii::$app->myhelper->getProgram(),
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Program'],
            'pluginOptions' => [
                'allowClear' => true
        ],
    ]);?>
     
    <?= $form->field($model, 'highest_education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year_completion')->textInput(['maxlength' => true]) ?>
 
    <?= $form->field($model, 'current_status')->dropDownList([ 1 => 'Currently Studing', 2 => 'Recent passed out', 3=> 'Alumna / Alumnus'], ['prompt' => 'Select Status']) ?>

    <?= $form->field($model, 'email_id')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'rate_value_money')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
    ]);?>

    <?= $form->field($model, 'rate_infra')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
    ]);?>

    <?= $form->field($model, 'rate_food_acc')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
    ]);?>

    <?= $form->field($model, 'rate_college_crowd')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
    ]);?>

    <?= $form->field($model, 'rate_campus_life')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
    ]);?>

    <?= $form->field($model, 'rate_faculty')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
    ]);?>

    <?= $form->field($model, 'rate_visiting_faculty_lectures')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
    ]);?>

    <?= $form->field($model, 'rate_admin_staff')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
    ]);?>

    <?= $form->field($model, 'rate_course_curriculum')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
    ]);?>
     
    <?= $form->field($model, 'rate_internship')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
    ]);?>
     
    <?= $form->field($model, 'rate_placement')->widget(StarRating::classname(), [
            'pluginOptions' => ['size'=>'md']
    ]);?>

    <?= $form->field($model, 'admission_recommend')->inline(true)->radioList([ 1 => 'Yes', 2 => 'No', ]) ?>

    <?= $form->field($model, 'other_reviews')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'review_status')->dropDownList([ 1 => 'Approved', 2 => 'Pending', 3 => 'Blocked' ], ['options'=>[2=>['Selected'=>true]]], ['prompt' => 'Select Status'])->label('Status') ?>
    
<div class="form-group" style="margin-left: 18% !important;">
        <button id="back_btn" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
       <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'load' ,'data-loading-text'=>"<i class='fa fa-spinner fa-spin '></i> Processing"]) ?>
   </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
<?php $this->registerJs("".Yii::$app->myhelper->formsubmitedbyajax('w0','../university/view')."");?>
<?php 
$this->registerCss("
  .app-title{
    display: none;
  }
  ");
?>