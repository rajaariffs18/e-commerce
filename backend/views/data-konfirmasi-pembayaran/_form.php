<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TbKonfimasiPembayaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-konfimasi-pembayaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pengirim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_pesanan')->textInput() ?>

    <?= $form->field($model, 'nama_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_transfer')->textInput() ?>

    <?= $form->field($model, 'id_file')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
