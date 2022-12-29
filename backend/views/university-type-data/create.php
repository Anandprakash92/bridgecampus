<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UniversityTypeData */

$this->title = 'Create University Type';
$this->params['breadcrumbs'][] = ['label' => 'University Type Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-type-data-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
