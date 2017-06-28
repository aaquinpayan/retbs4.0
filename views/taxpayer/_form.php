<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;

/* @var $this yii\web\View */
/* @var $model app\models\Taxpayer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taxpayer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $data = ArrayHelper::map(\app\models\TaxDeclaration::find()->all(), 'property_owner', 'property_owner');?>
    <?= $form->field($model, 'full_name')->widget(TypeaheadBasic::className(), [
            'data' => $data,
            'pluginOptions' => ['highlight' => true],
            'readonly' => !$model->isNewRecord,
            'options' => ['placeholder' => 'Select Taxpayer'],
        ]); ?>

     <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'gender')->radioList(array('Female'=>'Female', 'Male' =>'Male')); ?>

    <?= $form->field($model, 'occupation')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
