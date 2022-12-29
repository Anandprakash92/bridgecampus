<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ExamLevel */

$this->title = 'Update Exam Level: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Exam Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="exam-level-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
