<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ClassifiedDisplayAdLocations */

$this->title = 'Update Classified Display Ad Locations: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Classified Display Ad Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classified-display-ad-locations-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
