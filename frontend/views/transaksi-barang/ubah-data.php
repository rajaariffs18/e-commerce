<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'My Yii Application';

?>


	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>
                    
					<div class="slick3">
                        <?php foreach($model->produkMediaAll as $datas){ ?>

                            <div class="item-slick3" data-thumb="<?='../../backend/web/uploads/'.$datas->name.$datas->type?>">
                                <div class="wrap-pic-w">
                                    <img src="<?='../../backend/web/uploads/'.$datas->name.$datas->type?>" alt="IMG-PRODUCT">
                                </div>
                            </div>
                        <?php } ?>
						<!-- <div class="item-slick3" data-thumb="images/thumb-item-02.jpg">
							<div class="wrap-pic-w">
								<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="images/thumb-item-03.jpg">
							<div class="wrap-pic-w">
								<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">
							</div>
						</div> -->
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
					<?= $model->nama_barang ?>
				</h4>

				<span class="m-text17">
                    <?= 'Rp '.number_format($model->harga_barang,2,",",".") ?>
				</span>

				<p class="s-text8 p-t-10">
					<?= $model->deskripsi ?>
				</p>

					<div class="flex-r-m flex-w p-t-10">

							<?php $form = ActiveForm::begin(); ?>
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>
									<input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="<?= $TbTransaksiBarang->qty ?>">
								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
								<div class="form-group">
									<label for="comment">Catatan:</label>
									<textarea class="form-control" rows="5" id="comment" name="catatan" placeholder="Isi dengan Warna, Ukuran dan Lain-lain"><?= $TbTransaksiBarang->catatan ?></textarea>
								</div>


								<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10" style="color:white">	
									<?= Html::submitButton('Add to Cart', ['class' => 'lex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4']) ?>
								</div>

							<?php ActiveForm::end(); ?>

							
						</div>
				</div>

			</div>
		</div>
	</div>


