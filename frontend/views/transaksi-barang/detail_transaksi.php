<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TransaksiBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Transaksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-transaksi-barang-index">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 bo9">
            <br>
                <h3>Detail Transaksi</h3><hr>
                    <h5 class="m-text15 p-b-4">
						Alamat Pengiriman
					</h5>
					<hr>
                    <p><?= $TbTransaksiData->alamat ?>, <br> <?= $TbTransaksiData->kab_kota ?>, <?= $TbTransaksiData->provinsi ?> <br>Kode Pos <?= $TbTransaksiData->kode_pos ?> <br> No. Telp. <?= $TbTransaksiData->no_telp ?></p>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="m-text15 p-b-4">
                                Total Pembayaran 
                            </h5>
                            <hr>
                            <p> <?='Rp '.number_format( $TbTransaksiData->total_pembayaran ,0,",",".")  ?></p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="m-text15 p-b-4">
                                Metode Pembayaran
                            </h5>
                            <hr>
                            <p>Transfer Melalui  <?= $TbTransaksiData->rekening->nama_atm ?> <br> No. Rek. <?= $TbTransaksiData->rekening->no_rek ?> </p>
                        </div>
                    </div>

                    <hr>
                    <h5 class="m-text15 p-b-4">
                        Daftar Belanja
                    </h5>
                    <hr>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($model as $data) { ?>
                            <tr>
                                <td><?= $data->produk->nama_barang ?></td>
                                <td><?= $data->qty ?></td>
                                <td><?=  'Rp '.number_format($data->total_harga,2,",",".") ?></td>
                            </tr>
                        <?php } ?>

                            <tr>
                                <td colspan="2">
                                    Subtotal
                                </td>
                                <td><?= 'Rp '.number_format($jumlahBelanja,2,",",".") ?></td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    Ongkos Pengiriman
                                </td>
                                <td><?= 'Rp '.number_format($TbTransaksiData->ongkos_kirim ,2,",",".") ?></td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    Total Pembayaran
                                </td>
                                <td><?= 'Rp '.number_format($TbTransaksiData->total_pembayaran ,2,",",".") ?></td>
                            </tr>
                        
                       
                        </tbody>
                    </table>
                    
            </div>
        </div>
    </div>
</div>
<br>
