<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-3">
                    <img src="template/images/icons/icon-header-01.png" alt="">
                </div>
                <div class="col-md-9">
                    <h4>Akun Saya</h4>
                </div>
            </div>
            <hr>
       <!--  <ul>

            <li><a href="<?= Url::to(['index'])?>">Panel Akun Kontrol</a></li>            
            <li><a href="#">Informasi Akun</a></li>
            <li><a href="#">Pesanan Saya</a></li>
        
        </ul> -->
        </div>
        <div class="col-md-8 bo9">
            <br>
            <h3>Detail Transaks No. <?= $TbTransaksiData->id_transaksi ?></h3><hr>
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

                <br><br>
                <!-- <br><br> -->
                <b> Status Transaksi : </b>
                <?php
                    if($TbTransaksiData->status == 1){
                        echo 'Sudah Konfirmasi Pembayaran';
                    }else if($TbTransaksiData->status == 2){
                        echo 'Di Proses';
                    }else if($TbTransaksiData->status == 3){
                        echo 'Sudah Dikirim';
                    }else if($TbTransaksiData->status == 4){
                        echo 'Sudah Diterima';
                    }else{
                        echo 'Belum Konfirmasi Pembayaran';
                    }
                ?>
                
                <br>
                <br>
                <b>Foto Bukti Pembayaran : </b>
                <br>
                <br>

                <?php
                if($TbKonfimasiPembayaran){
                    if($TbKonfimasiPembayaran->konfirmasiMedia){ ?>
                        <img  width = 100% src="<?='../../backend/web/uploads/'.$TbKonfimasiPembayaran->konfirmasiMedia->name.$TbKonfimasiPembayaran->konfirmasiMedia->type?>" alt="IMG-BENNER">
                   <?php  } }
                ?>
                
                <br><br>

                <?php $form = ActiveForm::begin(); ?>

                    
                    <?php
                        echo $form->field($TbTransaksiData, 'status')->dropDownList(
                                [4 => 'Sudah Di Terima'],['prompt' => '-Pilih Status-']
                        ); 
                    ?>

                    <div class="form-group">
                        <?= Html::submitButton('Ubah Status', ['class' => 'btn btn-success']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

                
            </div>
    </div>

</div>
