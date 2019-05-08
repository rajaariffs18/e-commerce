<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TbKonfimasiPembayaran */

$this->title = 'Update Tb Konfimasi Pembayaran: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Konfimasi Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-konfimasi-pembayaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
