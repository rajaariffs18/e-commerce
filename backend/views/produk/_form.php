<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\TbProduk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-produk-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

      <?= $form->field($model, 'kd_kategori')->dropDownList($TbKategori, [
        'prompt'=> '-- Pilih Kategori --'
    ]) ?>

    <?= $form->field($model, 'nama_barang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stok')->textInput() ?>

    <?= $form->field($model, 'harga_barang')->textInput() ?>

    <?php
        if($action == "ubah"){
            $no = 1;
            foreach($model->getKdSurat()->all() as $data){ ?>
            <!-- <hr> -->   
                <h4>Daftar Lampiran :</h4>
                
                <div class="col-md-3">
                    <div class="img-view"> <img style="width:100%; margin-top:9px; margin-bottom:9px" src="<?= Yii::getAlias('@web').'/uploads/'.$data->nama.$data->type ?>" alt=""></div>
                    <a href="<?=Url::to(['surat-usulan/hapus-lampiran', 'id' => $model->id_surat, 'im' => $data->id])?>" class="btn btn-danger btn-block">Hapus</a>
                </div>
            
        <?php   $no++; }
        }
    ?>

    <?php
        echo FileInput::widget([
            'model' => $model,
            'attribute' => 'imageFiles[]',
            'options' => ['multiple' => true],
            'pluginOptions' => [
                'showPreview' => true,
                'showCaption' => true,
                'showRemove' => true,
                'showUpload' => false
            ],
        ]);
    ?>

  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
