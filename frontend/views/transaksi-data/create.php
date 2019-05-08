<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TbTransaksiData */

$this->title = 'Create Tb Transaksi Data';
$this->params['breadcrumbs'][] = ['label' => 'Tb Transaksi Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-transaksi-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
