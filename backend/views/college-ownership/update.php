<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CollegeOwnership */

$this->title = 'Update College Ownership: ' . $model->ownership_name;
$this->params['breadcrumbs'][] = ['label' => 'College Ownerships', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="college-ownership-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
