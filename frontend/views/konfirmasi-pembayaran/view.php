<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TbKonfimasiPembayaran */

// $this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Konfimasi Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tb-konfimasi-pembayaran-view">

    <div class="container">

         <h3>Berhasil mengkonfirmasi pembayaran</h3> <br>

   

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'nama_pengirim',
                'no_pesanan',
                'nama_bank',
                'jumlah_transfer',
                // 'id_file',
            ],
        ]) ?>

    </div>

   

</div>
