<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TbKategori */

$this->title = 'Tambah Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Tb Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tb-kategori-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
