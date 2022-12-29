<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseVideoBanner */

$this->title = 'Update Advertise Video Banner: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Advertise Video Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advertise-video-banner-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
