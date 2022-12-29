<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvertiseClassifiedDisplayAdLocations */

$this->title = 'Advertise Classified Display Ad Locations';
$this->params['breadcrumbs'][] = ['label' => 'Advertise Classified Display Ad Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-classified-display-ad-locations-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
