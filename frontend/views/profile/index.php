<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
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
        <ul>

            <li><a href="<?= Url::to(['index'])?>">Panel Akun Kontrol</a></li>
            <li><a href="#">Informasi Akun</a></li>
            <li><a href="#">Pesanan Saya</a></li>
        
        </ul>
        </div>
        <div class="col-md-9">
            <h4>Hai <?= Yii::$app->user->identity->username ?></h4>
            <hr>

            <h4>Pesanan Saya</h4>
            <hr>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No. Transaksi</th>
                    <th>Kirim Ke</th>
                    <th>Total Pembelian</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($model as $data) { ?>
                    <tr>
                        <td><?= $data->id_transaksi ?></td>
                        <td><?= $data->nama_depan ?> <?= $data->nama_belakang ?></td>
                        <td><?=  $data->total_pembayaran ?></td>
                        <td><?php 
                        
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
                            
                        </td>
                        <td> <a href="<?= Url::to(['detail-order', 't' => $data->id_transaksi])?>">Detail Order</a> </td>
                    </tr>
                <?php } ?>
                
                </tbody>
            </table>
            <hr>

            <!-- <h4>Informasi Akun</h4>
            <hr> -->
        </div>
    </div>

</div>
