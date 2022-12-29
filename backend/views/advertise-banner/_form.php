<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\widgets\DatePicker;
use backend\controllers\UserController;
use kartik\widgets\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseBanner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertise-banner-form">
 <div class="custumbox box box-info">
   <div class="box-body">

    <?php $form = ActiveForm::begin([
     'layout' => 'horizontal',
     'enableClientValidation' => true,
     'enableAjaxValidation' => false,
     'options' => ['enctype' => 'multipart/form-data'],
   ]);?>
   <br/>

    <?= $form->field($model, 'institute_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
        ]) 
    ?>

    <?= $form->field($model, 'sub_title_description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'standard',
        'clientOptions'=>[
          'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
          /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
        ]
        ]) 
    ?>

    <?php echo $form->field($model, 'image')->widget(FileInput::classname(), [
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

    <?php 
   $show_duration_days = 'none';
   if(!$model->isNewRecord){
    $date_from = date('d-m-Y',strtotime($model->date_from));
    $to_date = date('d-m-Y',strtotime($model->to_date));
  }else{
    $date_from = '';
    $to_date = '';
  }
  ?>

     <?= $form->field($model, 'date_from')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'From Date','value'=>$date_from],
    'removeButton' => false,
    'pluginOptions' => [
      'autoclose'=>true,
      'startDate' => '-0d',
      'format' => 'dd-mm-yyyy'
    ]
  ]);?>

  <?= $form->field($model, 'to_date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'To Date','value'=>$to_date],
    'removeButton' => false,
    'pluginOptions' => [
      'autoclose'=>true,
      'startDate' => '+1d',
      'format' => 'dd-mm-yyyy'
    ]
  ]);?>

   <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?> 
   <?php

   $contriesList = UserController::actionGetCountrieslist();
   if($model->isNewRecord){
    $stateLists = UserController::actionGetStateslist();
    $citiesLists = UserController::actionGetCitieslist();
    $model->country = 101;/*india*/
    $model->state = 22;/*maharsahtra*/
  }else{
    if(!empty($model->country)){

      $stateLists = UserController::actionGetStateslist($model->country);
    }else{
      $stateLists = UserController::actionGetStateslist(101);
    }
    if(!empty($model->state)){
      $citiesLists = UserController::actionGetCitieslist($model->state);
    }else{
      $citiesLists = UserController::actionGetCitieslist(22);
    }
  }
  ?>
  
  <?= $form->field($model, 'country')->dropDownList(json_decode($contriesList,true),['class'=>'form-control',
    'onchange'=>'$.get("../user/get-stateslist?countryID="+$(this).val(), function( data ) {
      data = $.parseJSON(data);
      $(\'#advertisebanner-state\').empty().append("<option value=\'\'>-- Select State --</option>");
      $(\'#advertisebanner-city\').empty().append("<option value=\'\'>-- Select City --</option>");
      $.each(data, function(index, value) {
       $(\'#advertisebanner-city\').append($(\'<option>\').text(value).attr(\'value\', index));
       });
       });
       ','prompt'=>'-- Select Country --'])?>

  <?= $form->field($model, 'state')->dropDownList(json_decode($stateLists,true),['class'=>'form-control','prompt'=>'-- Select State --',
    'onchange'=>'$.get("../user/get-citieslist?stateID="+$(this).val(), function( data ) {
     data = $.parseJSON(data);
      $(\'#advertisebanner-city\').empty().append("<option value=\'\'>-- Select City --</option>");
     
      $.each(data, function(index, value) {
       $(\'#advertisebanner-city\').append($(\'<option>\').text(value).attr(\'value\', index));
       });
      });
       '])?>
    <?= $form->field($model, 'city')->dropDownList(json_decode($citiesLists,true),['class'=>'form-control','prompt'=>'-- Select City --'])?>

   <?= $form->field($model, 'status')->dropDownList(Yii::$app->myhelper->getActiveInactive(),['class'=>'form-control'])?>

  <div class="form-group" style="margin-left: 18% !important;">
      <button id="back_btn" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
   <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'load' ,'data-loading-text'=>"<i class='fa fa-spinner fa-spin '></i> Processing"]) ?>
 </div>


 <?php ActiveForm::end(); ?>
</div>
</div>
</div>