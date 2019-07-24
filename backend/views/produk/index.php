<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-produk-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Produk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            
            [
                'header' => 'Kategori',
                'value' => function($model){
                    return ($model->kategori) ? $model->kategori->kategori : '-';
                    // return $model->kd_kategori;
                }
            ],
            'nama_barang',
            'deskripsi:ntext',
            'stok',
            [
                'header' => 'Harga Barang',
                'value' => function($model){
                    return number_format($model->harga_barang,2,",",".");
                }
            ],
            //'tanggal_upload',
            //'kd_kategori',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
