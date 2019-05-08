<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataTransaksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Transaksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-transaksi-data-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_user',
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

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Detail',
                'template' => '{detail}',
                'buttons' => [
                    "detail" => function ($url, $model, $key) {
                        return Html::a('Detail', ['detail', 
                            'id' => $model->id_transaksi
                        ],
                        ['class'=>'btn btn-primary btn-block','data-pjax'=>'0']);
                    },
                'vAlign'=>'middle',
                ]
            ],
        ],
    ]); ?>
</div>
