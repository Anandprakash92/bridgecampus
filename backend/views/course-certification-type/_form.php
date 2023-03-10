<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CourseCertificationType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-certification-type-form">
<div class="custumbox box box-info">
           <div class="box-body">

            <?php $form = ActiveForm::begin([
             'layout' => 'horizontal',
             'enableClientValidation' => true,
             'enableAjaxValidation' => false,
             'options' => ['enctype' => 'multipart/form-data'],
         ]);?>
         <br/>
    <?= $form->field($model, 'certification_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Active' => 'Active', 'Inactive' => 'Inactive', '' => '', ], ['prompt' => '']) ?>

   <div class="form-group" style="margin-left: 18% !important;">
        <button id="back_btn" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
       <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'load' ,'data-loading-text'=>"<i class='fa fa-spinner fa-spin '></i> Processing"]) ?>
   </div>


   <?php ActiveForm::end(); ?>
</div>
</div>
</div>

<?php $this->registerJs("".Yii::$app->myhelper->formsubmitedbyajax('w0','../course-certification-type/index')."");?>