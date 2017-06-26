<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;

/* @var $this yii\web\View */
/* @var $model app\models\AccountStatement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-statement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $data = ArrayHelper::map(\app\models\TaxDeclaration::find()->all(), 'arp_no', 'arp_no');?>
    <?= $form->field($model, 'arp_no')->widget(TypeaheadBasic::className(), [
            'data' => $data,
            'pluginOptions' => ['highlight' => true],
            'options' => ['placeholder' => 'Select Tax Declaration No.'],
        ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
