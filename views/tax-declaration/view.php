<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TaxDeclaration */

$this->title = $model->property_owner;
$this->params['breadcrumbs'][] = ['label' => 'Tax Declarations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-declaration-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p style="float: right;">
<<<<<<< HEAD
        <?= Html::a('Tax Declaration', ['report', 'id' => $model->td_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Field Appraisal & Assessment Sheet', ['report', 'id' => $model->td_no], ['class' => 'btn btn-primary']) ?>
    </p>
=======
        <!--<?= Html::a('Update', ['update', 'id' => $model->td_no], ['class' => 'btn btn-primary']) ?> -->
        <?= Html::a('Download Tax Declaration', ['report', 'id' => $model->td_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Download FAAS', ['report', 'id' => $model->td_no], ['class' => 'btn btn-primary']) ?>
        
        <!--<?= Html::a('Delete', ['delete', 'id' => $model->td_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>
    <p style="float: left;"><?= Html::a('Create Tax Declaration', ['create'], ['class' => 'btn btn-success']) ?></p>
>>>>>>> origin/db_branch

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'property_owner',
            'property_index_no',
            'arp_no',
            'address',
            'property_kind', //add
            'classification',
            'location', //add
            'assessed_value',
            'taxability', //add
            'effectivity_year', //not sure
            'cancels_arp_no',
            'cancels_assessed_value',
<<<<<<< HEAD
=======
            
>>>>>>> origin/db_branch
        ],
    ]) ?>


</div>
