<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertisePurposeType */

$this->title = 'Update : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Advertise Purpose Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advertise-purpose-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
