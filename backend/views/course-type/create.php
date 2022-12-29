<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseType */

$this->title = 'Create Course Type';
$this->params['breadcrumbs'][] = ['label' => 'Course Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
