<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TbTransaksiData */

$this->title = 'Update Tb Transaksi Data: ' . $model->id_transaksi;
$this->params['breadcrumbs'][] = ['label' => 'Tb Transaksi Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_transaksi, 'url' => ['view', 'id' => $model->id_transaksi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-transaksi-data-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
