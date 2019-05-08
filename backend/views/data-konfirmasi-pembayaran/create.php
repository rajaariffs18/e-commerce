<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TbKonfimasiPembayaran */

$this->title = 'Create Tb Konfimasi Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Tb Konfimasi Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-konfimasi-pembayaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
