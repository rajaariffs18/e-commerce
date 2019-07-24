<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TransaksiBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Barang';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(
    '@web/template/js/load_ajax_change.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<div class="tb-transaksi-barang-index">

    <section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
		<?php $form = ActiveForm::begin(); ?>

		<div class="row">
			<div class="col-md-4">
			
				<div class="bo9 w-size18 p-l-10 p-r-10 p-t-30 p-b-38 m-t-30 m-r-auto m-l-0 p-lr-15-sm">
					<h5 class="m-text15 p-b-24">
							Nama Dan Alamat
						</h5>
						<hr>
						<div class="row">
							<div class="col-md-6">
							<?= $form->field($modelTransaksiData, 'nama_depan')->textinput() ?>						
							</div>
							<div class="col-md-6">
								<?= $form->field($modelTransaksiData, 'nama_belakang')->textinput() ?>								
							</div>
						</div>
						<?= $form->field($modelTransaksiData, 'provinsi')->dropDownList($RefProvinsi, [
							'prompt'=>'Pilih Provinsi',
							'class' => 'form-control load_ajax_change',
							'id' => 'kd_prov',
							'data-ajaxload' => Url::to(["ajax-load/get-kabupaten"]),
							'data-ajaxdata' => '#kd_prov',
							'data-ajaxtarget' => '#kd_city'
						]) ?>

						<?= $form->field($modelData, 'kd_city')->dropDownList($RefKabupaten, [
							'prompt'=>'Pilih Kab/Kota',
							'class' => 'form-control load_ajax_change',
							'id' => 'kd_city',
							'data-ajaxload' => Url::to(["ajax-load/get-kurir"]),
							'data-ajaxdata' => '#kd_prov|#kd_city',
							'data-ajaxtarget' => '#kurir',
							// 'data-format' => 'val',

						]) ?>

						<?= $form->field($modelTransaksiData, 'metode_pembayaran')->dropDownList($kurir, [
							'prompt'=>'Pilih Kurir',
							'class' => 'form-control load_ajax_change',
							'id' => 'kurir',
							'data-ajaxload' => Url::to(["ajax-load/get-harga"]),
							'data-ajaxdata' => '#kd_city|#kurir',
							'data-ajaxtarget' => '#kd_service',
							// 'data-format' => 'val',

						])->label('Kurir') ?>

						<?= $form->field($modelTransaksiData, 'layanan')->dropDownList($kurir, [
							'prompt'=>'Pilih Layanan',
							'class' => 'form-control load_ajax_change',
							'id' => 'kd_service',
							'data-ajaxload' => Url::to(["ajax-load/get-harga-fix"]),
							'data-ajaxdata' => '#kd_service',
							'data-ajaxtarget' => '#harga_final_fix',
							'data-format' => 'val',

						])->label('Layanan') ?>

						<?= $form->field($modelData, 'harga_final')->hiddeninput(['id' => 'harga_final'])->label(false) ?>
						<?= $form->field($modelTransaksiData, 'estimasi_pengiriman')->hiddeninput(['id' => 'estimasi_pengiriman'])->label(false) ?>
						<?= $form->field($modelTransaksiData, 'ongkos_kirim')->hiddeninput(['id' => 'ongkos_kirim'])->label(false) ?>
						<?= $form->field($modelTransaksiData, 'total_pembayaran')->hiddeninput(['id' => 'total_pembayaran'])->label(false) ?>
						<?= $form->field($modelTransaksiData, 'provinsi')->hiddeninput(['id' => 'provinsi'])->label(false) ?>
						<?= $form->field($modelTransaksiData, 'kab_kota')->hiddeninput(['id' => 'kab_kota'])->label(false) ?>

						<?= $form->field($modelTransaksiData, 'alamat')->textarea(['rows' => 4]) ?>

						<?= $form->field($modelData, 'pembelian')->hiddeninput(['value' => $jumlahBelanja, 'id' => 'pembelian'])->label(false) ?>
						<div class="row">
							<div class="col-md-6">
							<?= $form->field($modelTransaksiData, 'kode_pos')->textinput() ?>						
							</div>
							<div class="col-md-6">
								<?= $form->field($modelTransaksiData, 'no_telp')->textinput() ?>								
							</div>
						</div>

				</div>
			</div>
			<div class="col-md-4">
				<div class="bo9 w-size18 p-l-10 p-r-10 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
					<h5 class="m-text15 p-b-4">
						Metode Pembayaran
					</h5>
					<hr>


					<!--  -->
					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<p id="metode-pembayaran">-</p>
					</div>

					<h5 class="m-text15 p-b-4">
						Metode Pembayaran
					</h5>
					<hr>

					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<div class="form-group">

							<?= $form->field($modelTransaksiData, 'kd_atm')->radioList( $RefRekening)->label('Pilih Bank'); ?>

						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="bo9 w-size18 p-l-10 p-r-10 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
					<h5 class="m-text15 p-b-4">
						Review Order Anda
					</h5>
					<hr>

					<!--  -->
					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<table width="100%">
							<tr>
								<td width="45%">Nama Produk</td>
								<td width="21%">Jumlah</td >
								<td width="55%">Subtotal</td >
							</tr>
							<?php foreach($model as $data){ ?>
								<tr>
									<td><?= $data->produk->nama_barang ?></td>
									<td><?= $data->qty ?></td>
									<td><?=  'Rp '.number_format($data->total_harga,2,",",".") ?></td>
								</tr>
							<?php } ?>
								<tr>
									<td colspan="2" style="text-align: left"> Subtotal</td>
									<td><?= 'Rp '.number_format($jumlahBelanja,2,",",".") ?></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align: left"> Biaya Pengiriman</td>
									<td><h6 id="biaya-pengiriman">-</h6></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align: left"> Total</td>
									<td><h6 id="total">-</h6>
									</td>
								</tr>

						

						</table>	
					</div>

					<!-- <div class="size15 trans-0-4"> -->
						<!-- Button -->
						<div class="form-group">
							<?= Html::submitButton('Proses', ['class' => 'lex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4']) ?>
						</div>
					<!-- </div> -->
				</div>
			</div>
			<?php ActiveForm::end(); ?>

		</div>
		
	</section>
</div>
