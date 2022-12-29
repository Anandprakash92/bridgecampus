<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseClassifiedDisplayAdLocations */

$this->title = 'Update Advertise Classified Display Ad Locations: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Advertise Classified Display Ad Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advertise-classified-display-ad-locations-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
