<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="animsition">
<?php $this->beginBody() ?>


	<!-- header fixed -->
	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="index.html" class="logo">
			<img src="<?= Yii::getAlias('@web'). 'template/images/logo.png' ?>" alt="IMG-LOGO" width=200>
		</a>
	</div>

	<!-- Header -->
	<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				<!-- Logo2 -->
				<a href="<?= Url::to('/') ?>" class="logo2">
					<img src="<?= Yii::getAlias('@web'). '../template/images/logo.png' ?>" alt="IMG-LOGO" width=200>
				</a>
				</div>
			</div>
		</div>

	</header>
	
	<div class="container m-t-4 p-t-45 m-l-auto m-r-auto">
		<?= $content ?>
	</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
