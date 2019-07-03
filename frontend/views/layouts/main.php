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
use common\models\TbTransaksiBarang;

AppAsset::register($this);

$user_id = Yii::$app->user->id;

$jumlahData = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 1])->count()


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
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5d1cb39922d70e36c2a3f49d/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->
</head>
<body class="animsition">
<?php $this->beginBody() ?>


	<!-- header fixed -->
	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="<?= Url::to(['site/index']) ?>" class="logo">
			<img src="<?= Yii::getAlias("@web")."/template/images/logo.png" ?>" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
				<li>
					<a href="<?= Url::to(['/']) ?>">Home</a>
					<!-- <ul class="sub_menu">
						<li><a href="index.html">Homepage V1</a></li>
						<li><a href="home-02.html">Homepage V2</a></li>
						<li><a href="home-03.html">Homepage V3</a></li>
					</ul> -->
				</li>

				<!-- <li>
					<a href="<?= Url::to(['site/kategori','k' =>1]) ?>">Terbaru</a>
				</li> -->

				<li >
					<a href="<?= Url::to(['site/kategori','k' =>1]) ?>">Gamis</a>
				</li>

				<li>
					<a href="<?= Url::to(['site/kategori','k' =>2]) ?>">Khimar</a>
				</li>

				<li>
					<a href="<?= Url::to(['site/kategori','k' =>3]) ?>">Outer</a>
				</li>

				<li>
					<a href="<?= Url::to(['site/kategori','k' =>4]) ?>">Rok</a>
				</li>

				<li>
					<a href="<?= Url::to(['site/kategori','k' =>5]) ?>">Set Syari</a>
				</li>
				<li>
					<a href="<?= Url::to(['site/kategori','k' =>5]) ?>"></a>
				</li>
				<li>
					<a href="<?= Url::to(['site/kategori','k' =>5]) ?>"></a>
				</li>
				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
		<div class="header-icons">
			<!-- <a href="#" class="header-wrapicon1 dis-block">
				<img src="template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>

			<span class="linedivide1"></span> -->

			<!-- <div class="header-wrapicon2"> -->
				<?php if (Yii::$app->user->isGuest) { ?>
					<a href="<?= Url::to(['login'])?>" class="m-r-6">
						Login
					</a>
					<a href="<?= Url::to(['signup'])?>">
						Register
					</a>
				<?php }else{ ?>
					<a href="<?= Url::to(['konfirmasi-pembayaran/create']) ?>" class="header-wrapicon1 dis-block m-l-30 m-r-30">
						Konfirmasi Pembayaran
					</a>
					<div class="header-cart header-dropdown">
							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<?= Html::a('<i class="fas fas-lock"></i> Logout', Url::to(['site/logout']), ['data-method' => 'POST', 'class' => 'flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-12']) ?>									
								</div>
							</div>
						</div>
					<div class="header-wrapicon2">
						<!-- <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON"> -->
						<span class="header-icon1 js-show-header-dropdown"><?=  (Yii::$app->user->identity) ? Yii::$app->user->identity->username : '' ?></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-12">
										Logout
									</a>
								</div>
							</div>
						</div>
					</div>
					<!--  -->
					<a href="<?= Url::to(['profile/index']) ?>" class="header-wrapicon1 dis-block m-l-30">
						<img src="<?= Yii::getAlias("@web")."/template/images/icons/icon-header-01.png" ?>" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2 m-r-13">
						<a href="<?= Url::to(['transaksi-barang/index']) ?>">
							<img src="<?= Yii::getAlias("@web")."/template/images/icons/icon-header-02.png" ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
							<span class="header-icons-noti"><?= $jumlahData ?></span>
						</a>

						<!-- Header cart noti -->
						
					</div>
				<?php } ?>
			<!-- </div> -->
		</div>
	</div>

	<!-- Header -->
	<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<!-- Logo2 -->
				<a href="<?= Url::to(['site/index']) ?>" class="logo2">
					<img src="<?= Yii::getAlias("@web")."/template/images/logo.png" ?>" alt="IMG-LOGO" width=200>
				</a>

				<div class="topbar-child2">
					<?php if (Yii::$app->user->isGuest) { ?>
						<a href="<?= Url::to(['login'])?>" class="m-r-6">
							Login
						</a>
						<a href="<?= Url::to(['signup'])?>">
							Register
						</a>
					<?php }else{ ?>
						<a href="<?= Url::to(['konfirmasi-pembayaran/create']) ?>" class="header-wrapicon1 dis-block m-l-30 m-r-30">
							Konfirmasi Pembayaran
						</a>
						<div class="header-wrapicon2">
							<!-- <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON"> -->
							<span class="header-icon1 js-show-header-dropdown"><?=  (Yii::$app->user->identity) ? Yii::$app->user->identity->username : '' ?></span>

							<!-- Header cart noti -->
							<div class="header-cart header-dropdown">
								<div class="header-cart-buttons">
									<div class="header-cart-wrapbtn">
										<!-- Button -->
										<?= Html::a('<i class="fas fas-lock"></i> Logout', Url::to(['site/logout']), ['data-method' => 'POST', 'class' => 'flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-12']) ?>
									</div>
								</div>
							</div>
						</div>
						<!--  -->
						<a href="<?= Url::to(['profile/index']) ?>" class="header-wrapicon1 dis-block m-l-30">
							<img src="<?= Yii::getAlias("@web")."/template/images/icons/icon-header-01.png" ?>" class="header-icon1" alt="ICON">
						</a>

						<span class="linedivide1"></span>

						<div class="header-wrapicon2 m-r-13">
							<a href="<?= Url::to(['transaksi-barang/index']) ?>">
								<img src="<?= Yii::getAlias("@web")."/template/images/icons/icon-header-02.png" ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
								<span class="header-icons-noti"><?= $jumlahData ?></span>
							</a>

							<!-- Header cart noti -->
							
						</div>
					<?php } ?>
					
					
				</div>
			</div>

			<div class="wrap_header">

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="<?= Url::to(['/']) ?>">Home</a>
								<!-- <ul class="sub_menu">
									<li><a href="index.html">Homepage V1</a></li>
									<li><a href="home-02.html">Homepage V2</a></li>
									<li><a href="home-03.html">Homepage V3</a></li>
								</ul> -->
							</li>

							<li>
								<a href="<?= Url::to(['site/kategori','k' =>1]) ?>">Terbaru</a>
							</li>

							<!-- <li class="sale-noti"> -->
								<a href="<?= Url::to(['site/kategori','k' =>1]) ?>">Gamis</a>
							<!-- </li> -->

							<li>
								<a href="<?= Url::to(['site/kategori','k' =>2]) ?>">Khimar</a>
							</li>

							<li>
								<a href="<?= Url::to(['site/kategori','k' =>3]) ?>">Outer</a>
							</li>

							<li>
								<a href="<?= Url::to(['site/kategori','k' =>4]) ?>">Rok</a>
							</li>

							<li>
								<a href="<?= Url::to(['site/kategori','k' =>5]) ?>">Set Syari</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">

				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="<?= Url::to(['site/index']) ?>" class="logo-mobile">
				<img src="<?= Yii::getAlias("@web")."/template/images/logo.png" ?>" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="<?= Url::to(['site/index'])?>" class="header-wrapicon1 dis-block">
						<img src="<?= Yii::getAlias("@web")."/template/images/icons/icon-header-01.png" ?>" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<a href="<?= Url::to(['transaksi-barang/index']) ?>">
								<img src="<?= Yii::getAlias("@web")."/template/images/icons/icon-header-02.png" ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
								<span class="header-icons-noti"><?= $jumlahData ?></span>
							</a>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="template/images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="template/images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="template/images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.html">Home</a>
						<ul class="sub-menu">
							<li><a href="index.html">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.html">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
    <?= $content ?>

	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Tentang Kami
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis expedita repudiandae obcaecati recusandae illum facere. Placeat alias harum voluptates iusto!
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
					</div>
				</div>
			</div>

			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3" style="text-align : center">
				<h4 class="s-text12 p-b-30">
					Kategori
				</h4>

				<ul>
					<li >
						<a href="<?= Url::to(['site/kategori','k' =>1]) ?>">Gamis</a>
					</li>

					<li>
						<a href="<?= Url::to(['site/kategori','k' =>2]) ?>">Khimar</a>
					</li>

					<li>
						<a href="<?= Url::to(['site/kategori','k' =>3]) ?>">Outer</a>
					</li>

					<li>
						<a href="<?= Url::to(['site/kategori','k' =>4]) ?>">Rok</a>
					</li>

					<li>
						<a href="<?= Url::to(['site/kategori','k' =>5]) ?>">Set Syari</a>
					</li>
				</ul>
			</div>


			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Alamat
				</h4>

				<ul>
					<li class="p-b-9">
						<span href="#" class="fs-18 color1 p-r-20 fa fa-location-arrow"></span> <span>Jl. Belawan no.15</span>
					</li>
					<li class="p-b-9">
						<span href="#" class="fs-18 color1 p-r-20 fa fa-envelope"></span> <span>uni.rancak@email.com</span>
					</li>

					<li class="p-b-9">
						<span href="#" class="fs-18 color1 p-r-20 fa fa-phone"></span> <span>+62 883322121</span>
						
					</li>
				</ul>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			
			<div class="t-center s-text8 p-t-20">
				<!-- Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
				Copyright © 2018 All rights reserved.</a>
			</div>
		</div>
	</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
