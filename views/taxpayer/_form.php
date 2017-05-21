<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Taxpayer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taxpayer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'gender')->radioList(array('F'=>'Female', 'M' =>'Male')); ?>

    <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea()->label('Address'); ?>

    <?php echo $form->field($model, 'payment_status')->dropDownList(['Paid' => 'Paid', 'Not Paid' => 'Not Paid']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
