<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\KonfirmasiPembayaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-konfimasi-pembayaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_pengirim') ?>

    <?= $form->field($model, 'no_pesanan') ?>

    <?= $form->field($model, 'nama_bank') ?>

    <?= $form->field($model, 'jumlah_transfer') ?>

    <?php // echo $form->field($model, 'id_file') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
