<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\KonfirmasiPembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tb Konfimasi Pembayarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-konfimasi-pembayaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tb Konfimasi Pembayaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama_pengirim',
            'no_pesanan',
            'nama_bank',
            'jumlah_transfer',
            //'id_file',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
