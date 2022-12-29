<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="fle-upload-form">
    <div class="custumbox box box-info">
        <div class="box-body">
            <?php $form = ActiveForm::begin([
             'layout' => 'horizontal',
             'enableClientValidation' => true,
             'enableAjaxValidation' => false,
             'options' => ['enctype' => 'multipart/form-data'],
           ]);?>
           <br/>
            <?php echo Html::a('Download Program Sample file', ['program/download'],['class' => 'btn btn-primary']);?>
        <br/>   
        <?= FileInput::widget([
                'model' => $model,
                'attribute' => 'name',
                'options' => ['multiple' => false]
            ]);
        ?>
         
            <div class="form-group" style="margin: 2% !important;">
              <button id="back_btn" class="btn btn-default"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
              <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Submit') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id'=>'load' ,'data-loading-text'=>"<i class='fa fa-spinner fa-spin '></i> Processing"]) ?>
            </div>
        <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>