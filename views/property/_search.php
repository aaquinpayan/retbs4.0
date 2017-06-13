<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PropertySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="property-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'property_id') ?>

    <?= $form->field($model, 'property_index_no') ?>

    <?= $form->field($model, 'name_of_owner') ?>

    <?= $form->field($model, 'kind') ?>

    <?= $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'north_boundary') ?>

    <?php // echo $form->field($model, 'south_boundary') ?>

    <?php // echo $form->field($model, 'east_boundary') ?>

    <?php // echo $form->field($model, 'west_boundary') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
