<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\AccountStatement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-statement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'td_no')->textInput() ?>

   <!-- <?= $form->field($model, 'barangay')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year_unpaid')->textInput() ?>

    <?= $form->field($model, 'percentage')->textInput() ?>

    <?= $form->field($model, 'basic')->textInput() ?>

    <?= $form->field($model, 'penalty_basic')->textInput() ?>

    <?= $form->field($model, 'sef')->textInput() ?>

    <?= $form->field($model, 'penalty_sef')->textInput() ?>

    <?= $form->field($model, 'total_amount')->textInput() ?>

    <?= $form->field($model, 'grand_total')->textInput() ?>

    <?= $form->field($model, 'validity')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
