<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TbTransaksiData */

$this->title = $model->id_transaksi;
$this->params['breadcrumbs'][] = ['label' => 'Tb Transaksi Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tb-transaksi-data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_transaksi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_transaksi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_user',
            'id_transaksi',
            'nama_depan',
            'nama_belakang',
            'kode_pos',
            'no_telp',
            'metode_pembayaran',
            'estimasi_pengiriman',
            'ongkos_kirim',
            'kd_atm',
            'provinsi',
            'kab_kota',
            'alamat',
            'total_pembayaran',
        ],
    ]) ?>

</div>
