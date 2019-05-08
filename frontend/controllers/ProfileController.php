<?php

namespace frontend\controllers;

use Yii;
use common\models\TbKonfimasiPembayaran;
use common\models\TbTransaksiBarang;
use common\models\TbTransaksiData;

class ProfileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;
        $model = TbTransaksiData::find()->where(['id_user' => $user_id])->all();
        $TbTransaksiData = TbTransaksiData::find()->where(['id_user' => $user_id])->one();
        $jumlahBelanja = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 3])->sum('total_harga');
        return $this->render('index', ['model' => $model,
            'TbTransaksiData' => $TbTransaksiData,
            'jumlahBelanja' => $jumlahBelanja
        ]);
    }

    public function actionDetailOrder($t)
    {
        $user_id = Yii::$app->user->id;
        $model = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 3, 'id_transaksi' => $t])->all();
        $TbTransaksiData = TbTransaksiData::find()->where(['id_user' => $user_id,  'id_transaksi' => $t])->one();
        $jumlahBelanja = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 3, 'id_transaksi' => $t])->sum('total_harga');
        $TbKonfimasiPembayaran = TbKonfimasiPembayaran::find()->where(['id_user' => $user_id, 'no_pesanan' => $t])->one();

        if ($TbTransaksiData->load(Yii::$app->request->post()) && $TbTransaksiData->save(false)) {
            return $this->redirect(['detail-order', 't' => $t]);
        }

        return $this->render('detail_order', [
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
            't' => $t,
            'model' => $model,
            'TbTransaksiData' => $TbTransaksiData,
            'TbKonfimasiPembayaran' => $TbKonfimasiPembayaran,
            'jumlahBelanja' => $jumlahBelanja,
        ]);

    }

}
