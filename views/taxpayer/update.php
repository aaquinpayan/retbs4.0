<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Taxpayer */

$this->title = 'Update Taxpayer: ' . $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Taxpayers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->taxpayer_id, 'url' => ['view', 'id' => $model->taxpayer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="taxpayer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
