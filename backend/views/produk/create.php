<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TbProduk */

$this->title = 'Tambah Produk';
$this->params['breadcrumbs'][] = ['label' => 'Tb Produks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-produk-create">

    <?= $this->render('_form', [
        'model' => $model,
        'TbKategori' => $TbKategori,
        'action' => $action,
        
    ]) ?>

</div>
