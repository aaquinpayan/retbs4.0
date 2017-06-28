
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<?php $this->beginContent('@app/views/layouts/main.php'); ?>
	<div class="sidenav">
   <?php
        use kartik\widgets\SideNav; //side nav extension

        echo SideNav::widget([
            'type' => SideNav::TYPE_DEFAULT,
            'heading' => 'Assessor', //dynamic - user_type
            'items' => [
                ['label' => 'Taxpayer Profiles', 'icon' => 'user', 'url' => ['taxpayer/index']],
                ['label' => 'Tax Declaration', 'icon' => 'home', 'url' => ['tax-declaration/index']],
                ['label' => 'Change Password', 'icon' => 'pencil', 'url' => ['site/changepassword']],
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