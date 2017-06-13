<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */

$this->title = 'Create Tax Declaration';
$this->params['breadcrumbs'][] = ['label' => 'Tax Declarations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-declaration-create">


    <h3><?= Html::encode($this->title) ?></h3>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
