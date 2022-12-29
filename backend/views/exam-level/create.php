<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ExamLevel */

$this->title = 'Create Exam Level';
$this->params['breadcrumbs'][] = ['label' => 'Exam Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-level-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
