<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TransaksiDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tb Transaksi Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-transaksi-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tb Transaksi Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_transaksi',
            'nama_depan',
            'nama_belakang',
            'kode_pos',
            'no_telp',
            //'metode_pembayaran',
            //'estimasi_pengiriman',
            //'ongkos_kirim',
            //'kd_atm',
            //'provinsi',
            //'kab_kota',
            //'alamat',
            //'total_pembayaran',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
