<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\TbKategori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tb-kategori-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'kategori')->textInput(['maxlength' => true]) ?>

    <?php 
        echo $form->field($model, 'status')->dropDownList(
            [1 => 'Aktif', 2 => 'Tidak Aktif']
        ); 
    ?>

    <?php
        echo FileInput::widget([
            'model' => $model,
            'attribute' => 'imageFile',
            // 'options' => ['multiple' => true],
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
