<?php
<<<<<<< HEAD

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AccountStatement */

$this->title = 'Create Account Statement';
$this->params['breadcrumbs'][] = ['label' => 'Account Statements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-statement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
=======

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AccountStatement */

$this->title = 'Create Account Statement';
$this->params['breadcrumbs'][] = ['label' => 'Account Statements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-statement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
>>>>>>> origin/db_branch
