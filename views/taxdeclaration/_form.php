<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tax-declaration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'property_index_no')->textInput() ?>

    <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'survey_no')->textInput() ?>

    <?= $form->field($model, 'classification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <?= $form->field($model, 'market_value')->textInput() ?>

    <?= $form->field($model, 'actual_use')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assessment_level')->textInput() ?>

    <?= $form->field($model, 'assessment_value')->textInput() ?>

    <?= $form->field($model, 'php')->textInput() ?>

    <?= $form->field($model, 'total_php')->textInput() ?>

    <?= $form->field($model, 'tot_assessed_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'effectivity_quarter')->textInput() ?>

    <?= $form->field($model, 'effectivity_year')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
