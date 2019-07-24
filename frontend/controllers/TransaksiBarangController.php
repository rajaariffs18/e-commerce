<?php

namespace frontend\controllers;

use Yii;
use common\models\TbTransaksiBarang;
use common\models\TbTransaksiData;
use common\models\TbProduk;
use common\models\RefRekening;
use common\models\RefProvinsi;
use frontend\models\TransaksiBarangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;


/**
 * TransaksiBarangController implements the CRUD actions for TbTransaksiBarang model.
 */
class TransaksiBarangController extends Controller
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

    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }

    /**
     * Lists all TbTransaksiBarang models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new TransaksiBarangSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return substr(crc32(8), 4); die();

        $user_id = Yii::$app->user->id;
        $model = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 1])->all();

        $jumlahBelanja = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 1])->sum('total_harga');
        // return $jumlahBelanja;
        // $model = TbTransaksiBarang::find()->all();

        return $this->render('index', [
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
            'model' => $model,
            'jumlahBelanja' => $jumlahBelanja,
        ]);
    }

    public function actionUbahData($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $request = Yii::$app->request;
        $user_id = Yii::$app->user->id;

        $model = TbProduk::find()->where(['id' => $id])->one();
        $TbTransaksiBarang = TbTransaksiBarang::find()->where(['id_barang' => $id, 'id_user' => $user_id, 'status_transaksi' => 1])->one();

        if($request->isPost){
            $qty = $request->post('num-product');
            $catatan = $request->post('catatan');
            $user_id = Yii::$app->user->id;

            $TbTransaksiBarang->id_user = $user_id;
            $TbTransaksiBarang->id_barang = $id;
            $TbTransaksiBarang->qty = $qty;
            $TbTransaksiBarang->catatan = $catatan;
            $TbTransaksiBarang->status_transaksi = 1;
            $TbTransaksiBarangProduk = TbProduk::find()->where(['id' => $id])->one();

            $TbTransaksiBarang->total_harga = $model->harga_barang * $qty;

            if ($TbTransaksiBarang->save(false)) {
                return $this->redirect(['index']);
            }
        }else{

            return $this->render('ubah-data', ['model' => $model, 'TbTransaksiBarang' => $TbTransaksiBarang]);
        }


    }

    public function actionHapusData($id)
    {
        $TbTransaksiBarang = TbTransaksiBarang::findOne(['id' => $id]);
        $TbTransaksiBarang->delete();
        return $this->redirect(['index']);

    }


    public function actionDetailTransaksi($p)
    {
        // $searchModel = new TransaksiBarangSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $user_id = Yii::$app->user->id;
        $model = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 3, 'id_transaksi' => $p])->all();
        $TbTransaksiData = TbTransaksiData::find()->where(['id_user' => $user_id,  'id_transaksi' => $p])->one();
        $jumlahBelanja = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 3, 'id_transaksi' => $p])->sum('total_harga');
        // return $jumlahBelanja;
        // $model = TbTransaksiBarang::find()->all();

        return $this->render('detail_transaksi.php', [
            // 'searchModel' => $searchModel,
            // 'dataProvider' => $dataProvider,
            'model' => $model,
            'TbTransaksiData' => $TbTransaksiData,
            'jumlahBelanja' => $jumlahBelanja,
        ]);
    }


    public function actionCheckout($p)
    {
        // $searchModel = new TransaksiBarangSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $request = Yii::$app->request;
        $user_id = Yii::$app->user->id;
        $model = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 2, 'id_transaksi' => $p])->all();
        $modelData = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 2, 'id_transaksi' => $p])->one();
        $modelTransaksiDataCek = TbTransaksiData::find()->where(['id_user' => $user_id, 'id_transaksi' => $p])->exists();
        if($modelTransaksiDataCek){
            $modelTransaksiData = TbTransaksiData::find()->where(['id_user' => $user_id, 'id_transaksi' => $p])->one();
        }else{
            $modelTransaksiData = new TbTransaksiData();
            $modelTransaksiData->id_user = $user_id;
            $modelTransaksiData->id_transaksi = $p;
        }
        // $modelData->id_user = $user_id;

        $jumlahBelanja = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 2, 'id_transaksi' => $p])->sum('total_harga');
        $RefRekening = RefRekening::find()->all();
        $RefProvinsi = ArrayHelper::map(RefProvinsi::find()->all(),'Kd_Prov','Nm_Prov');
        $RefKabupaten = [];
        $kurir = [];

        // var_dump($modelData); die();

        if ($modelData->load(Yii::$app->request->post()) && $modelTransaksiData->load(Yii::$app->request->post()) && $modelData->validate(false) && $modelTransaksiData->validate(false)) {
            $atm = $request->post('atm');

            // foreach($modelData as $data){
                // $modelData->status_transaksi = 3;

                $TbTransaksiBarang = TbTransaksiBarang::find()->where([
                    'id_user' => $user_id, 'status_transaksi' => 2, 'id_transaksi' => $p
                ])->all();

                foreach($TbTransaksiBarang as $data){
                    $tbProduk = TbProduk::find()->where([
                        'id' => $data->id_barang
                    ])->one();

                    $tbProduk->stok = $tbProduk->stok - $data->qty;

                    $tbProduk->save(false);
                }

                TbTransaksiBarang::updateAll([
                    'status_transaksi' => 3
                ], ['id_user' => $user_id, 'status_transaksi' => 2, 'id_transaksi' => $p]);

                $modelData->save(false);
            // }

            $modelTransaksiData->kd_atm = $atm;
            $modelTransaksiData->save(false);
            return $this->redirect(['detail-transaksi', 'p' =>  $p]);
        }else{
                return $this->render('checkout', [
                // 'searchModel' => $searchModel,
                // 'dataProvider' => $dataProvider,
                'model' => $model,
                'modelData' => $modelData,
                'modelTransaksiData' => $modelTransaksiData,
                'RefRekening' => $RefRekening,
                'kurir' => $kurir,
                'RefKabupaten' => $RefKabupaten,
                'RefProvinsi' => $RefProvinsi,
                'jumlahBelanja' => $jumlahBelanja,
            ]);
        }

        
    }

    /**
     * Displays a single TbTransaksiBarang model.
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
     * Creates a new TbTransaksiBarang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TbTransaksiBarang();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionProsesCheckout()
    {
        $user_id = Yii::$app->user->id;

        $model = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 1])->all();

        foreach($model as $data){
            $id_transaksi = $data->id_transaksi;
            $data->status_transaksi = 2;
            $data->save(false);
        }

        return $this->redirect(['checkout', 'p' => $id_transaksi]);
    }

    public function actionAddCart($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        $model = new TbTransaksiBarang();
        $request = Yii::$app->request;

        $qty = $request->post('num-product');
        $catatan = $request->post('catatan');
        $user_id = Yii::$app->user->id;

        $model->id_user = $user_id;
        $model->id_barang = $id;
        $model->qty = $qty;
        $model->catatan = $catatan;
        $model->status_transaksi = 1;
        $modelProduk = TbProduk::find()->where(['id' => $id])->one();

        $model->total_harga = $modelProduk->harga_barang * $qty;

        $cekData = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 1])->exists();

        if(!$cekData){
            $countData = TbTransaksiBarang::find()->where(['id_user' => $user_id])->orderBy(['id_transaksi'=>SORT_DESC])->one();

            if($countData){
                $nomor = $countData->id_transaksi + 1;
            }else{
                $nomor = 1;
            }

            $model->id_transaksi = substr(crc32($nomor), 4);
        }else{
            $data = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 1])->one();

            $model->id_transaksi = $data->id_transaksi;
        }



        if ($model->save(false)) {
            return $this->redirect(['index']);
        }
    }

    public function actionUpdateCart()
    {
        $model = new TbTransaksiBarang();
        $request = Yii::$app->request;

        $count = count(Yii::$app->request->post('data', []));

        echo $count; die();

        $qty = $request->post('num-product');
        $catatan = $request->post('catatan');
        $user_id = Yii::$app->user->id;

        $model->id_user = $user_id;
        $model->id_barang = $id;
        $model->qty = $qty;
        $model->catatan = $catatan;
        $model->status_transaksi = 1;
        $modelProduk = TbProduk::find()->where(['id' => $id])->one();

        $model->total_harga = $modelProduk->harga_barang * $qty;

        $countData = TbTransaksiBarang::find()->where(['id_user' => $user_id])->max('id_transaksi');

        if($countData > 1){
            $model->id_transaksi = $countData+1;
        }else{
            $model->id_transaksi = 1;
        }

        if ($model->save(false)) {
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing TbTransaksiBarang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TbTransaksiBarang model.
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
     * Finds the TbTransaksiBarang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TbTransaksiBarang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TbTransaksiBarang::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
