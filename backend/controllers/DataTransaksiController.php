<?php

namespace backend\controllers;

use Yii;
use common\models\TbTransaksiData;
use common\models\TbKonfimasiPembayaran;
use common\models\TbTransaksiBarang;
use backend\models\DataTransaksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DataTransaksiController implements the CRUD actions for TbTransaksiData model.
 */
class DataTransaksiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TbTransaksiData models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DataTransaksiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbTransaksiData model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDetail($id)
    {

        $model = TbTransaksiBarang::find()->where(['id_transaksi' => $id, 'status_transaksi' => 3])->all();
        $TbTransaksiData = TbTransaksiData::find()->where(['id_transaksi' => $id])->one();
        $TbKonfimasiPembayaran = TbKonfimasiPembayaran::find()->where(['no_pesanan' => $id])->one();
        $jumlahBelanja = TbTransaksiBarang::find()->where(['id_transaksi' => $id, 'status_transaksi' => 3])->sum('total_harga');

        if ($TbTransaksiData->load(Yii::$app->request->post()) && $TbTransaksiData->save(false)) {
            return $this->redirect(['detail', 'id' => $id]);
        }

        return $this->render('detail', [
            'model' => $model,
            'TbTransaksiData' => $TbTransaksiData,
            'jumlahBelanja' => $jumlahBelanja,
            'TbKonfimasiPembayaran' => $TbKonfimasiPembayaran,
        ]);
    }

    /**
     * Creates a new TbTransaksiData model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TbTransaksiData();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_transaksi]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TbTransaksiData model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_transaksi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TbTransaksiData model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TbTransaksiData model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TbTransaksiData the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TbTransaksiData::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
