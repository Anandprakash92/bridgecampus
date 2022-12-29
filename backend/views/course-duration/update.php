<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseDuration */

$this->title = 'Update Course Duration: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Course Durations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-duration-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
