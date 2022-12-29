<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseVideoBanner */

$this->title = 'Create Advertise Video Banner';
$this->params['breadcrumbs'][] = ['label' => 'Advertise Video Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-video-banner-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
