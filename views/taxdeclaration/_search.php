<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclarationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tax-declaration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'td_no') ?>

    <?= $form->field($model, 'property_index_no') ?>

    <?= $form->field($model, 'contact_no') ?>

    <?= $form->field($model, 'survey_no') ?>

    <?= $form->field($model, 'classification') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'market_value') ?>

    <?php // echo $form->field($model, 'actual_use') ?>

    <?php // echo $form->field($model, 'assessment_level') ?>

    <?php // echo $form->field($model, 'assessment_value') ?>

    <?php // echo $form->field($model, 'php') ?>

    <?php // echo $form->field($model, 'total_php') ?>

    <?php // echo $form->field($model, 'tot_assessed_value') ?>

    <?php // echo $form->field($model, 'effectivity_quarter') ?>

    <?php // echo $form->field($model, 'effectivity_year') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
