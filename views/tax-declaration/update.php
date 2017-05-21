<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */

$this->title = 'Update Tax Declaration: ' . $model->td_no;
$this->params['breadcrumbs'][] = ['label' => 'Tax Declarations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->td_no, 'url' => ['view', 'id' => $model->td_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tax-declaration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
