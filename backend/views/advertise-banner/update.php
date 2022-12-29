<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseBanner */

$this->title = 'Advertise Banner: ' . $model->institute_name;
$this->params['breadcrumbs'][] = ['label' => 'Advertise Banners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advertise-banner-update">

    <?= $this->render('_form', [
        'model' => $model,
        'imgPreview'=>$imgPreview,
            'imgPreviewConfig'=> $imgPreviewConfig
    ]) ?>

</div>
