<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseCertificationType */

$this->title = 'Create Course Certification Type';
$this->params['breadcrumbs'][] = ['label' => 'Course Certification Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-certification-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
