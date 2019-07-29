<?php

namespace backend\controllers;

use Yii;
use common\models\TbProduk;
use common\models\TbKategori;
use backend\models\ProdukSearch;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * ProdukController implements the CRUD actions for TbProduk model.
 */
class ProdukController extends Controller
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
     * Lists all TbProduk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TbProduk model.
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

    /**
     * Creates a new TbProduk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TbProduk();

        $action = "tambah";

        $TbKategori = ArrayHelper::map(TbKategori::find()->all(), 'id', 'kategori');
        $model->tanggal_upload = time();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            // print_r($model->imageFiles);  die();
            if($model->upload()){
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'TbKategori' => $TbKategori,
            'action' => $action,
        ]);
    }

    /**
     * Updates an existing TbProduk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $action = "ubah";

        $TbKategori = ArrayHelper::map(TbKategori::find()->all(), 'id', 'kategori');


        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'action' => $action,
            'TbKategori' => $TbKategori,
        ]);
    }

    /**
     * Deletes an existing TbProduk model.
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
     * Finds the TbProduk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TbProduk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TbProduk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
