<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseQualificationType */

$this->title = 'Update Course Qualification Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Course Qualification Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-qualification-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
