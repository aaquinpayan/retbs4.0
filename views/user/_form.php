<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
        <!-- <div id="user-type""> -->
        <?= $form->field($model, 'user_type')->dropDownList(['admin'=>'Admin', 'assessor'=>'Assessor', 'treasurer'=>'Treasurer','taxpayer'=>'Taxpayer'], ['prompt'=>'Select User Type'], ['class'=>'form-control type']); ?>
        
       <?php    
            $this->registerJs('
             $(".type").change(function(){
                var value = this.value;
                if(value == "taxpayer"){
                    $("#mydiv2").hide();

                }
                else{
                    $("#mydiv2").show();
                }

                
                console.log(this.value);
             
                });'

            );

        ?>

        <div id="mydiv2">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]); ?>
            
            <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true]); ?>
        </div>

         <div id="mydiv">
            <?php $data = ArrayHelper::map(\app\models\TaxDeclaration::find()->all(), 'property_owner', 'property_owner');?>
            <?php echo $form->field($model, 'last_name')->widget(TypeaheadBasic::className(), [
                'data' => $data,
                'pluginOptions' => ['highlight' => true],
                'options' => ['placeholder' => 'Select Taxpayer'],
                ]); ?>
   
        </div>
    

    <!-- <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>