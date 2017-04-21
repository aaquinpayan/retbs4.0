<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaxDeclarationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tax Declarations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tax-declaration-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tax Declaration', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'td_no',
            'property_index_no',
            'contact_no',
            'survey_no',
            'classification',
            // 'area',
            // 'market_value',
            // 'actual_use',
            // 'assessment_level',
            // 'assessment_value',
            // 'php',
            // 'total_php',
            // 'tot_assessed_value',
            // 'effectivity_quarter',
            // 'effectivity_year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
