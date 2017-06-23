<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */

$this->title = 'Master List';
$this->params['breadcrumbs'][] = ['label' => 'Tax Declarations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-declaration-upload">


    <h3><?= Html::encode($this->title) ?></h3>

    <!-- google docs sample -->
    <!-- <iframe width="100%" height="400" src="https://docs.google.com/viewer?url=http%3A%2F%2Fresearch.google.com%2Farchive%2Fbigtable-osdi06.pdf&embedded=true"></iframe> -->

     <?php

                $files=\yii\helpers\FileHelper::findFiles('uploads/');
                if (isset($files[0])) {
                    foreach ($files as $index => $file) {
                        $viewName = substr($file, strrpos($file, '/') + 1);
                        // $this->render('masterlist', array('name'=> $name));
                        //$imodel->viewName = $viewName;
                        
                        echo Html::a($viewName, ['masterlist','viewName' => $viewName]) . "<br/>" . "<br/>" ; 
                        //  echo "<br/>" . "<br/>" . $viewName;
                     
                    }
                } else {
                    echo "There are no files available for viewing." . "<br/>" . "<br/>";
                }

    ?>

    <?= $this->render('_uploadForm', [
        'model' => $model,
    ]) ?>

       







</div>