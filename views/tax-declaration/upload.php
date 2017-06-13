<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */

$this->title = 'Upload File';
$this->params['breadcrumbs'][] = ['label' => 'Tax Declarations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-declaration-upload">


    <h3><?= Html::encode($this->title) ?></h3>


    <?= $this->render('_uploadForm', [
        'model' => $model,
    ]) ?>

  <!--  <?= 
    Html::a('Download file', ['/uploads', 'id' => $model->id], ['class' => 'btn btn-primary']);
?>    
	<?= Html::a('PDF', [
   	'tax-declaration/index',
    'id' => $model->id,
	], [
    'class' => 'btn btn-primary',
    'target' => '_blank',
]); ?>-->







</div>