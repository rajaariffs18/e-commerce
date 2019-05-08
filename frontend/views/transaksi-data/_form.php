<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TbTransaksiData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-transaksi-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_transaksi')->textInput() ?>

    <?= $form->field($model, 'nama_depan')->textInput() ?>

    <?= $form->field($model, 'nama_belakang')->textInput() ?>

    <?= $form->field($model, 'kode_pos')->textInput() ?>

    <?= $form->field($model, 'no_telp')->textInput() ?>

    <?= $form->field($model, 'metode_pembayaran')->textInput() ?>

    <?= $form->field($model, 'estimasi_pengiriman')->textInput() ?>

    <?= $form->field($model, 'ongkos_kirim')->textInput() ?>

    <?= $form->field($model, 'kd_atm')->textInput() ?>

    <?= $form->field($model, 'provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kab_kota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_pembayaran')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>