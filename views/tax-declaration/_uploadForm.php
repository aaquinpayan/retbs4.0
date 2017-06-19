<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;




/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tax-declaration-upload">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>


<div class="form-group">
        <?= Html::submitButton('Upload Master List', ['class' => 'btn btn-success']) ?>
    	
    </div>


    <?php ActiveForm::end(); ?>

</div>