<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdvDisplayAdLocation */

$this->title = 'Create Adv Display Ad Location';
$this->params['breadcrumbs'][] = ['label' => 'Adv Display Ad Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adv-display-ad-location-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
