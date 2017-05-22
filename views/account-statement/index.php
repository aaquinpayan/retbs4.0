<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountStatementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Account Statements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-statement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Account Statement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'soa_id',
            'td_no',
            'barangay',
            'year_unpaid',
            'percentage',
            // 'basic',
            // 'penalty_basic',
            // 'sef',
            // 'penalty_sef',
            // 'total_amount',
            // 'grand_total',
            // 'validity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
