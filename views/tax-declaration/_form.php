<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tax-declaration-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'arp_no')->textInput() ?>

    <?= $form->field($model, 'property_index_no')->textInput() ?>

    <?= $form->field($model, 'property_owner')->textInput() ?>

    <?= $form->field($model, 'address')->textarea()->label('Address'); ?>

    <?= $form->field($model, 'tel_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beneficial_user')->textInput() ?>

    <?= $form->field($model, 'user_tel_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_address')->textarea() ?>

    

    <?= $form->field($model, 'location')->textarea()->label('Location'); ?>

    <?= $form->field($model, 'otc')->textInput() ?>

    <?= $form->field($model, 'oct')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'survey_no')->textInput() ?>

    <?= $form->field($model, 'lot_no')->textInput() ?>

    <?= $form->field($model, 'blk_no')->textInput() ?>

    <?= $form->field($model, 'bound_north')->textInput() ?>

    <?= $form->field($model, 'bound_south')->textInput() ?>

    <?= $form->field($model, 'bound_east')->textInput() ?>

    <?= $form->field($model, 'bound_west')->textInput() ?>



    <?php echo $form->field($model, 'property_kind')->dropDownList(['a' => 'Land', 'b' => 'Building', 'c' => 'Machinery', 'd' => 'Others']); ?>

    <?= $form->field($model, 'classification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <?= $form->field($model, 'market_value')->textInput() ?>

    <?= $form->field($model, 'actual_use')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assessment_level')->textInput() ?>

    <?= $form->field($model, 'taxability')->radioList(array('1'=>'Taxable', 2=>'Exempt')); ?>

    <?= $form->field($model, 'effectivity_quarter')->textInput() ?>

    <?= $form->field($model, 'effectivity_year')->textInput() ?>

    <?= $form->field($model, 'mun_assessor')->textInput() ?>

    <?= $form->field($model, 'prov_assessor')->textInput() ?>

    <!--<?= $form->field($model, 'tax_dec_filename') ?>

    <?= $form->field($model, 'taxdec_pdf')->widget(FileInput::classname(), [
        'options'=>['accept'=>'pdf/*'],
        'pluginOptions'=>['allowedFileExtensions'=>'pdf']
    ]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
