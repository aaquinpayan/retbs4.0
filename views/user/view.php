<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['user/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>
     <?php if (Yii::$app->session->hasFlash('success')): ?>
              <div class="alert alert-success alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <h4><i class="icon fa fa-check"></i>Saved!</h4>
              <?= Yii::$app->session->getFlash('success') ?>
              </div>
    <?php endif; ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'first_name',
            'middle_name',
            'last_name',
            //'user_id',
            'username',
            // 'password',
            'user_type',
        ],
    ]) ?>

</div>
