<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CollegeOwnership */

$this->title = 'Create College Ownership';
$this->params['breadcrumbs'][] = ['label' => 'College Ownerships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="college-ownership-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
