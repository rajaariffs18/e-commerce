<?php

use yii\helpers\Url;


?>
<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Kategori
						</h4>

						<ul class="p-b-54">
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
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					

					<!-- Product -->
					<div class="row">
                        <?php foreach($model as $data){ ?>
                            <?php $dataGambar = $data->produkMedia; ?>
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                        <img src="<?='../../backend/web/uploads/'.$dataGambar->name.$dataGambar->type?>" alt="IMG-PRODUCT">

                                        <div class="block2-overlay trans-0-4">
                                            <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                            </a>

                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <a href="<?= Url::to(['site/detail', 'id' => $data->id])  ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    Add to Cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="block2-txt p-t-20">
										<a href="<?= Url::to(['site/detail', 'id' => $data->id])  ?>" class="block2-name dis-block s-text3 p-b-5">
											<?= $data->nama_barang ?>
										</a>

										<span class="block2-price m-text6 p-r-5">
											<?= number_format($data->harga_barang,2,",",".") ?>
										</span>
									</div>
                                </div>
                            </div>

                        <?php } ?>

					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
	</section>