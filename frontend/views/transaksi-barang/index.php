<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TransaksiBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keranjang Anda';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-transaksi-barang-index">

    <section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-3">Catatan</th>
							<th class="column-4 p-l-70">Jumlah</th>
							<th class="column-5">Total</th>
							<th class="column-5">Aksi</th>
						</tr>

                        <?php foreach($model as $key => $data){ ?>
                            <tr class="table-row">
                                <td class="column-1">
                                    <div class="cart-img-product b-rad-4 o-f-hidden">
                                        <img src="<?='../../backend/web/uploads/'.$data->produkMedia->name.$data->produkMedia->type?>" alt="IMG-PRODUCT">
                                    </div>
                                </td>
                                <td class="column-2"><?= $data->produk->nama_barang ?></td>
                                <td class="column-3"> <?= 'Rp '.number_format($data->produk->harga_barang,2,",",".") ?></td>
                                <td class="column-3"> <?=  $data->catatan ?></td>
                                <td class="column-4"><p class="text-center"><?= $data->qty ?></p></td>
                                <td class="column-5"><?= 'Rp '.number_format($data->total_harga,2,",",".") ?></td>
								<td>
									<a href="<?= Url::to(['ubah-data', 'id' => $data->id_barang])?>" class="fs-18 color1 p-r-20 fa fa-edit"></a>
									<a href="<?= Url::to(['hapus-data', 'id' => $data->id])?>" class="fs-18 color1 p-r-20 fa fa-trash"></a>
								</td>
							</tr>
                        <?php } ?>

					</table>
				</div>
			</div>
			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<a href="<?= Url::to(['site/index'])?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Lanjut Belanja
						</a>
					</div>
				</div>
			</div>
			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">

						<?= 'Rp '.number_format($jumlahBelanja,2,",",".") ?>
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<a href="<?= Url::to(['transaksi-barang/proses-checkout']) ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proses Checkout
					</a>
				</div>
			</div>
		</div>
	</section>
</div>
