<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccountStatement */

$this->title = $model->soa_id;
$this->params['breadcrumbs'][] = ['label' => 'Account Statements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-statement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tax Declaration', ['update', 'id' => $model->soa_id], ['class' => 'btn btn-primary']) ?>
        <!--<?= Html::a('Delete', ['delete', 'id' => $model->soa_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'soa_id',
            'td_no',
            'barangay',
            'year_unpaid',
            'percentage',
            'basic',
            'penalty_basic',
            'sef',
            'penalty_sef',
            'total_amount',
            'grand_total',
            //'validity',
        ],
    ]) ?>

</div>
