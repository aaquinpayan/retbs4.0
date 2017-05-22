<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PropertySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Real Estate Properties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="property-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?= Html::a('Create Property', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model) {
<<<<<<< HEAD
            $url = Url::to(['property/view', 'id' => $model['p_no']]);
=======
            $url = Url::to(['property/view', 'id' => $model['property_id']]);
>>>>>>> origin/db_branch
            return ['onclick' => "window.location.href='{$url}'"];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

<<<<<<< HEAD
=======
            'property_id',
>>>>>>> origin/db_branch
            'property_index_no',
            'name_of_owner',
            'kind',
            'location',
        ],
    ]); ?>
</div>
