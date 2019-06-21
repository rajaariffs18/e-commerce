<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tb_transaksi_data".
 *
 * @property int $id_transaksi
 * @property int $nama_depan
 * @property int $nama_belakang
 * @property int $kode_pos
 * @property int $no_telp
 * @property int $metode_pembayaran
 * @property int $estimasi_pengiriman
 * @property int $ongkos_kirim
 * @property int $kd_atm
 * @property string $provinsi
 * @property string $kab_kota
 * @property string $alamat
 * @property int $total_pembayaran
 */
class TbTransaksiData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $layanan;

    public static function tableName()
    {
        return 'tb_transaksi_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'nama_depan', 'nama_belakang', 'kode_pos', 'no_telp', 'metode_pembayaran', 'estimasi_pengiriman', 'ongkos_kirim', 'kd_atm', 'provinsi', 'kab_kota', 'alamat', 'total_pembayaran'], 'required'],
            [['id_transaksi', 'nama_depan', 'nama_belakang', 'kode_pos', 'no_telp', 'metode_pembayaran', 'estimasi_pengiriman', 'ongkos_kirim', 'kd_atm', 'status', 'total_pembayaran'], 'safe'],
            [['provinsi', 'kab_kota'], 'string', 'max' => 255],
            [['alamat'], 'string', 'max' => 355],
            [['id_transaksi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi' => 'Id Transaksi',
            'nama_depan' => 'Nama Depan',
            'nama_belakang' => 'Nama Belakang',
            'kode_pos' => 'Kode Pos',
            'no_telp' => 'No Telp',
            'metode_pembayaran' => 'Metode Pembayaran',
            'estimasi_pengiriman' => 'Estimasi Pengiriman',
            'ongkos_kirim' => 'Ongkos Kirim',
            'kd_atm' => 'Kd Atm',
            'provinsi' => 'Provinsi',
            'kab_kota' => 'Kab Kota',
            'alamat' => 'Alamat',
            'total_pembayaran' => 'Total Pembayaran',
        ];
    }

    public function getRekening()
    {
        return $this->hasOne(RefRekening::className(), ['id' => 'kd_atm']);
    }

    public function getProduk()
    {
        return $this->hasOne(TbProduk::className(), ['id' => 'id_barang']);
    }
}
