<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrator';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="users-index">
    <h3>Manage Administrator</h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>  
        <p>
            <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?=GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name:ntext',
                'username',
                'password',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); 
       ?>
</div>




  

