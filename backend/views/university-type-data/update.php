<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UniversityTypeData */

$this->title = 'Update University Type Data: ' . $model->university_name;
$this->params['breadcrumbs'][] = ['label' => 'University Type Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="university-type-data-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
