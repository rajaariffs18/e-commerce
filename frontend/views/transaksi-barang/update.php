<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TbTransaksiBarang */

$this->title = 'Update Tb Transaksi Barang: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Transaksi Barangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-transaksi-barang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
