<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

    <p class='text-center'>Silahkan Masukkan Data Anda</p>
    <hr>

    <div class="row justify-content-center">
        <div class="col-lg-5 p-t-20">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'nama')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'username')->textInput() ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'tempat_lahir')->textInput() ?>

                <?= $form->field($model, 'tanggal_lahir')->input('date') ?>

                <?= $form->field($model, 'no_hp')->textInput() ?>
                
                <?= $form->field($model, 'alamat')->textarea() ?>
                

                <div class="form-group">
                    <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
