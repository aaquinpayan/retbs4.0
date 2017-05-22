<?php
<<<<<<< HEAD

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountStatementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-statement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

=======

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountStatementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-statement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

>>>>>>> origin/db_branch
    <?= $form->field($model, 'soa_id') ?>

    <?= $form->field($model, 'td_no') ?>

    <?= $form->field($model, 'barangay') ?>

    <?= $form->field($model, 'year_unpaid') ?>

    <?= $form->field($model, 'percentage') ?>

    <?php // echo $form->field($model, 'basic') ?>

    <?php // echo $form->field($model, 'penalty_basic') ?>

    <?php // echo $form->field($model, 'sef') ?>

    <?php // echo $form->field($model, 'penalty_sef') ?>

    <?php // echo $form->field($model, 'total_amount') ?>

    <?php // echo $form->field($model, 'grand_total') ?>

    <?php // echo $form->field($model, 'validity') ?>

<<<<<<< HEAD
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
=======
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
>>>>>>> origin/db_branch
