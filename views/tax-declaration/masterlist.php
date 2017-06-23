<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */

$this->title = 'Master List';
$this->params['breadcrumbs'][] = ['label' => 'Tax Declarations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Master List', 'url' => ['masterlist', 'viewName'=>$viewName]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-declaration-masterlist">


    <h3><?= Html::encode($this->title) ?></h3>

    

   <?php 
        // $this->name = $name;
                        $inputFileType = 'Excel5';
                        $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                        $inputFileName = 'uploads'.'/'. $viewName;
                        $objPHPExcel = $objReader->load($inputFileName);

                        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');
                        $objWriter->save('php://output');

    ?>

    

       







</div>