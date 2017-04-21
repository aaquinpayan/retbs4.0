<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Taxpayer */

$this->title = 'Create Taxpayer';
$this->params['breadcrumbs'][] = ['label' => 'Taxpayers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taxpayer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
