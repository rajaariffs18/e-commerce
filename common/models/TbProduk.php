<?php

namespace common\models;

use Yii;
use common\models\TbProdukMedia;


/**
 * This is the model class for table "tb_produk".
 *
 * @property int $id
 * @property string $nama_barang
 * @property string $deskripsi
 * @property int $stok
 * @property int $harga_barang
 * @property int $tanggal_upload
 * @property int $kd_kategori
 */
class TbProduk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFiles;

    public static function tableName()
    {
        return 'tb_produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_barang', 'deskripsi', 'stok', 'harga_barang', 'tanggal_upload'], 'required'],
            [['deskripsi'], 'string'],
            [['stok', 'harga_barang', 'tanggal_upload', 'kd_kategori'], 'integer'],
            [['nama_barang'], 'string', 'max' => 350],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 7],

        ];
    }

    public function upload()
    {
        if ($this->validate(false)) { 
            foreach ($this->imageFiles as $file) {
                $suratMedia = new TbProdukMedia();
                $path = realpath(Yii::$app->basePath).'/web/uploads/' . $file->baseName . '.' . $file->extension;
                $suratMedia->id_produk = $this->id;
                $suratMedia->filename = $path;
                $suratMedia->size = $file->size;
                $suratMedia->name = $file->baseName;
                $suratMedia->type = '.'.$file->extension;
                $file->saveAs(realpath(Yii::$app->basePath).'/web/uploads/' . $file->baseName . '.' . $file->extension);
                $suratMedia->save(false);
            }
            return true;
        } else {
            return false;
        }
    }

    public function getProdukMedia()
    {
        $model = TbProdukMedia::find()->where(['id_produk' => $this->id])->max('id');
        return $this->hasOne(TbProdukMedia::className(), ['id_produk' => 'id'])->where(['id' => $model]);
    }

    public function getProdukMediaAll()
    {
        return $this->hasMany(TbProdukMedia::className(), ['id_produk' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_barang' => 'Nama Barang',
            'deskripsi' => 'Deskripsi',
            'stok' => 'Stok',
            'harga_barang' => 'Harga Barang',
            'tanggal_upload' => 'Tanggal Upload',
            'kd_kategori' => 'Kd Kategori',
        ];
    }
}
