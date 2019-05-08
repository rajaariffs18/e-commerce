<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DataTransaksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-transaksi-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_transaksi') ?>

    <?= $form->field($model, 'nama_depan') ?>

    <?= $form->field($model, 'nama_belakang') ?>

    <?= $form->field($model, 'kode_pos') ?>

    <?php // echo $form->field($model, 'no_telp') ?>

    <?php // echo $form->field($model, 'metode_pembayaran') ?>

    <?php // echo $form->field($model, 'estimasi_pengiriman') ?>

    <?php // echo $form->field($model, 'ongkos_kirim') ?>

    <?php // echo $form->field($model, 'kd_atm') ?>

    <?php // echo $form->field($model, 'provinsi') ?>

    <?php // echo $form->field($model, 'kab_kota') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'total_pembayaran') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
