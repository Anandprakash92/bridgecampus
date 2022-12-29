<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\helpers\Url;
use common\widgets\CKEditor;
use iutbay\yii2kcfinder\KCFinder;
use common\models\Courses;

/* @var $this yii\web\View */
/* @var $model common\models\Courses */
/* @var $form yii\widgets\ActiveForm */
$validateUrl = ($model->isNewRecord)?Url::to(['courses/validate']):Url::to(['courses/validate','id'=>$model->id]);

    $kcfOptions = array_merge(KCFinder::$kcfDefaultOptions, [
      'uploadURL' => Yii::$app->myhelper->getFileBasePath(),
      'access' => [
        'files' => [
          'upload' => true,
          'delete' => true,
          'copy' => true,
          'move' => true,
          'rename' => true,
        ],
        'dirs' => [
          'create' => true,
          'delete' => true,
          'rename' => true,
        ],
      ],
    ]);

    Yii::$app->session->set('KCFINDER', $kcfOptions);
    
?>

<div class="courses-form">
  <div class="custumbox box box-info">
   <div class="box-body">
    <?php $form = ActiveForm::begin([
     'layout' => 'horizontal',
     'enableClientValidation' => true,
     'enableAjaxValidation' => true,
     'validationUrl' => $validateUrl,
     'options' => ['enctype' => 'multipart/form-data'],
   ]);?>

    <?= $form->field($model, 'programID')->widget(Select2::classname(), [
       'name' => 'programID',
        'data' => Yii::$app->myhelper->getProgram(),
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Program'],
            'pluginOptions' => [
                'allowClear' => true
        ],
    ]);?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>
    
    <?php if (!$model->isNewRecord) {
        $model->code = Yii::$app->myhelper->getCourseCode($model->code);
      ?>
      <?= $form->field($model, 'code',['enableAjaxValidation' => true])->textInput(['maxlength' => true,'disabled'=>true]) ?>
    <?php } ?>

    <?= $form->field($model, 'certification_type')->widget(Select2::classname(), [
       'name' => 'certification_type',
        'data' => Yii::$app->myhelper->getCertificationType(),
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Certification Type'],
            'pluginOptions' => [
                'allowClear' => true
        ],
    ]);?>
    
    <?= $form->field($model, 'qualification_type')->widget(Select2::classname(), [
       'name' => 'qualification_type',
        'data' => Yii::$app->myhelper->getQualificationType(),
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Qualification Type'],
            'pluginOptions' => [
                'allowClear' => true
        ],
    ]);?>

    <?= $form->field($model, 'full_part_time')->dropDownList(Yii::$app->myhelper->getFullPartTime(),['class'=>'form-control'])?>

    <?= $form->field($model, 'courseType')->dropDownList(Yii::$app->myhelper->getCourseType(),['class'=>'form-control'])?>

    <?= $form->field($model, 'duration')->widget(Select2::classname(), [
       'name' => 'duration',
        'data' => Yii::$app->myhelper->getCourseDurationType(),
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Duration Type'],
            'pluginOptions' => [
                'allowClear' => true
        ],
    ]);?>
       
    <?= $form->field($model, 'medium_of_teaching')->widget(Select2::classname(), [
       'name' => 'medium_of_teaching',
        'data' => Yii::$app->myhelper->getMedium(),
        'size' => Select2::SMALL,
        'options' => ['placeholder' => 'Select Mode of Teaching'],
            'pluginOptions' => [
                'allowClear' => true
        ],
    ]);?>
       
    <?= $form->field($model, 'required_skillset')->widget(CKEditor::className(), [
      'options' => ['rows' => 6],
      'preset' => 'standard',
      'clientOptions'=>[
        'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
        /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
      ]
    ]) ?>

    <?= $form->field($model, 'course_high_lights')->widget(CKEditor::className(), [
      'options' => ['rows' => 6],
      'preset' => 'standard',
      'clientOptions'=>[
        'removePlugins' => 'save,newpage,print,pastetext,pastefromword,forms,language,flash,spellchecker,about,smiley,div,flag',
        /* 'filebrowserUploadUrl' => Url::to(['course-documents/upload-image']),*/
      ]
    ]) ?>

    

    <?= $form->field($model, 'status')->dropDownList(Yii::$app->myhelper->getActiveInactive(),['class'=>'form-control'])?>

    <div class="col-sm-offset-2 col-sm-4">
      <button id="back_btn" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
      <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'load' ,'data-loading-text'=>"<i class='fa fa-spinner fa-spin '></i> Processing"]) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
</div>


<?php $this->registerJs("".Yii::$app->myhelper->formsubmitedbyajax('w0','../course/index')."");?>