<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TbKonfimasiPembayaran */

$this->title = 'Konfimasi Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Tb Konfimasi Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="tb-konfimasi-pembayaran-create">

            <h2><?= Html::encode($this->title) ?></h2>

            <hr>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
</div>

