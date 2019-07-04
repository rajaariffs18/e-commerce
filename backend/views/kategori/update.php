<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TbKategori */

$this->title = 'Ubah Kategori: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tb Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tb-kategori-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
