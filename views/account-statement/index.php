<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountStatementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Statements of Account';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-statement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Statement of Account', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) {
            $url = Url::to(['account-statement/view', 'id' => $model['soa_id']]);
            return ['onclick' => "window.location.href='{$url}'"];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'soa_id',
            'property_owner',
            'arp_no',
            'barangay',
            //'assessed_value',
            //'year_unpaid',
            //'percentage',
            //'basic',
            //'penalty_basic',
            //'sef',
            //'penalty_sef',
            //'total_amount',
            // 'grand_total',
            // 'validity',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

