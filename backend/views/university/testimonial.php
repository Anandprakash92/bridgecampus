<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

if($model->isNewRecord){

  $this->title = $university->name.' Testimonial';
  $this->params['subtitle'] = '<h1>Testimonial</h1>';
  $this->params['breadcrumbs'][] = ['label' => 'Universities', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $university->name;
  $this->params['breadcrumbs'][] = 'Testimonial';
}else{
  $this->title = $university->name.' Update Testimonial';
  $this->params['subtitle'] = '<h1>Update Testimonial</h1>';
  $this->params['breadcrumbs'][] = ['label' => 'Universities', 'url' => ['index']];
  $this->params['breadcrumbs'][] = $university->name;
  $this->params['breadcrumbs'][] = 'Update Testimonial';
}

?>
<div class="testimonial-details-form">
  <div class="custumbox box box-info">
    <div class="box-body">
      <?php $form = ActiveForm::begin([
       'layout' => 'horizontal',
       'enableClientValidation' => true,
       'enableAjaxValidation' => false,
       'options' => ['enctype' => 'multipart/form-data'],
     ]);?>

    <?= $form->field($model, 'visitor_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'visitor_photo')->widget(FileInput::classname(), [
      'pluginOptions' => [
        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
        'options' => ['multiple' => false],

        'initialPreview'=> $imgPreview,
        'initialPreviewConfig'=> [
          $imgPreviewConfig
        ],
        'initialPreviewAsData'=>true,
        'overwriteInitial'=>true,
        'dropZoneEnabled'=> false,
        'showCaption' => true,
        'showRemove' => false,
        'showUpload' => false,
      ],
    ]);?>
    <?= $form->field($model, 'highest_edu')->textInput(['maxlength' => true]) ?>
        
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
        
    <?= $form->field($model, 'year_completion')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'current_status')->dropDownList([ 1 => 'Currently Studing', 2 => 'Recent passed out', 3=> 'Alumna / Alumnus'], ['prompt' => 'Select Current Status']) ?>
        
    <?= $form->field($model, 'email_id')->textInput(['maxlength' => true]) ?>
        
    <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>
        
    <?= $form->field($model, 'summ_testimonial')->textarea(['rows' => 6]) ?>
        
    <?= $form->field($model, 'intern_placement')->textarea(['rows' => 6]) ?>
        
    <?= $form->field($model, 'infrastructure')->textarea(['rows' => 6]) ?>
        
    <?= $form->field($model, 'hostel')->textarea(['rows' => 6]) ?>
        
    <?= $form->field($model, 'faculty')->textarea(['rows' => 6]) ?>
        
    <?= $form->field($model, 'course_curriculum')->textarea(['rows' => 6]) ?>
        
    <?= $form->field($model, 'library')->textarea(['rows' => 6]) ?>
        
    <?= $form->field($model, 'status')->dropDownList([ 1 => 'Approved', 2 => 'Pending', 3 => 'Blocked' ], ['prompt' => 'Select Status'])->label('Status') ?>
        
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