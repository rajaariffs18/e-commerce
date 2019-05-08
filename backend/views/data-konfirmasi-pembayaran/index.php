<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DataKonfirmasiPembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Konfimasi Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-konfimasi-pembayaran-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'id_user',
            'nama_pengirim',
            'no_pesanan',
            'nama_bank',
            'jumlah_transfer',
            //'id_file',

            // ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Detail',
                'template' => '{detail}',
                'buttons' => [
                    "detail" => function ($url, $model, $key) {
                        return Html::a('Detail', ['detail', 
                            'id' => $model->no_pesanan
                        ],
                        ['class'=>'btn btn-primary btn-block','data-pjax'=>'0']);
                    },
                'vAlign'=>'middle',
                ]
            ],
        ],
    ]); ?>
</div>
