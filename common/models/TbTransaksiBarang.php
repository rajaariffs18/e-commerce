<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tb_transaksi_barang".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_transaksi
 * @property int $id_barang
 * @property int $qty
 * @property string $catatan
 * @property int $total_harga
 * @property int $status_transaksi
 */
class TbTransaksiBarang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $numproduct;
    public $pembelian;
    
    public static function tableName()
    {
        return 'tb_transaksi_barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_transaksi', 'id_barang', 'qty', 'catatan', 'total_harga', 'status_transaksi'], 'required'],
            [['id_user', 'id_transaksi', 'id_barang', 'qty', 'total_harga', 'status_transaksi'], 'integer'],
            [['kd_prov', 'kd_city', 'alamat', 'harga_final'], 'safe'],
            [['catatan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_transaksi' => 'Id Transaksi',
            'id_barang' => 'Id Barang',
            'qty' => 'Qty',
            'catatan' => 'Catatan',
            'kd_city' => 'Kota',
            'total_harga' => 'Total Harga',
            'status_transaksi' => 'Status Transaksi',
        ];
    }

    public function getProduk()
    {
        return $this->hasOne(TbProduk::className(), ['id' => 'id_barang']);
    }
    public function getProdukMedia()
    {
        return $this->hasOne(TbProdukMedia::className(), ['id_produk' => 'id_barang']);
    }

    public function getTotalTransaksi()
    {
        $user_id = Yii::$app->user->id;        
        $model = TbTransaksiBarang::find()->where(['id_user' => $user_id, 'status_transaksi' => 1])->sum('harga_total');
        return $model;
    }
}
