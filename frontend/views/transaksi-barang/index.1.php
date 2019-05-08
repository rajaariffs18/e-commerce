<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TransaksiBarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tb Transaksi Barangs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-transaksi-barang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tb Transaksi Barang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'id_transaksi',
            'id_barang',
            'qty',
            //'catatan',
            //'total_harga',
            //'status_transaksi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
