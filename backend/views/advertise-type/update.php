<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseType */

$this->title = 'Update Advertise Listing Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Advertise Listing Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advertise-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
