<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseType */

$this->title = 'Update Course Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Course Certification Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
