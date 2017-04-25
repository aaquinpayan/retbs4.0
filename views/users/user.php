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

<?php $this->beginContent('@app/views/layouts/main.php'); ?>
	<div class="sidenav">
   <?php
        use kartik\widgets\SideNav; //side nav extension

        echo SideNav::widget([
            'type' => SideNav::TYPE_DEFAULT,
            'heading' => 'Administrator', //dynamic - user_type
            'items' => [
                ['label' => 'Taxpayer Profiles', 'icon' => 'user', 'url' => ['site/taxpayerProfiles']],
                ['label' => 'Real Estate Properties', 'icon' => 'home', 'url' => ['site/realEstateProperties']],
                ['label' => 'Tax Declaration', 'icon' => 'home', 'url' => ['site/taxDeclaration']],
                ['label' => 'Statement of Account', 'icon' => 'home', 'url' => ['site/statementOfAccount']],
                ['label' => 'Accounts', 'icon' => 'user', 'items' => [
                    ['label' => 'Change Password', 'url' => ['users/password']],
                    ['label' => 'Taxpayer', 'url' => ['users/taxpayer']],
                    ['label' => 'Assessor', 'url' => ['users/assessor']],
                    ['label' => 'Treasurer', 'url' => ['users/treasurer']],
                    ['label' => 'Administrator', 'url' => ['users/admin']],
                ]],
            ],
        ]);    
    ?>  
	</div>
	<div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

       <?= $content?>
</div>

<?php $this->endContent();