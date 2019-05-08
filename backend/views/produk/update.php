<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TbProduk */

$this->title = 'Update Tb Produk: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Produks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-produk-update">

    <?= $this->render('_form', [
        'model' => $model,
        'TbKategori' => $TbKategori,
        'action' => $action,
        ]) ?>

</div>
