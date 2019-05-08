<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tb_konfimasi_pembayaran".
 *
 * @property int $id
 * @property string $nama_pengirim
 * @property int $no_pesanan
 * @property string $nama_bank
 * @property int $jumlah_transfer
 * @property int $id_file
 */
class TbKonfimasiPembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $imageFile;
    public $id_file;

    public static function tableName()
    {
        return 'tb_konfimasi_pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pengirim', 'no_pesanan', 'nama_bank', 'jumlah_transfer'], 'required'],
            [['no_pesanan', 'jumlah_transfer', 'id_file'], 'integer'],
            [['nama_pengirim', 'nama_bank'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pengirim' => 'Nama Pengirim',
            'no_pesanan' => 'No Pesanan',
            'nama_bank' => 'Nama Bank',
            'jumlah_transfer' => 'Jumlah Transfer',
            'id_file' => 'Id File',
        ];
    }

    public function upload()
    {
        if ($this->validate(false)) { 
                $suratMedia = new TbKonfirmasiMedia();
                $path = realpath(Yii::$app->basePath).'/web/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
                $suratMedia->id_konfirmasi = $this->id;
                $suratMedia->filename = $path;
                $suratMedia->size = $this->imageFile->size;
                $suratMedia->name = $this->imageFile->baseName;
                $suratMedia->type = '.'.$this->imageFile->extension;
                $this->imageFile->saveAs(realpath(Yii::$app->basePath).'/web/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
                $suratMedia->save(false);
            return true;
        } else {
            return false;
        }
    }

    public function getKonfirmasiMedia()
    {
        // $model = TbKategoriMedia::find()->where(['id_produk' => $this->id])->max('id');
        return $this->hasOne(TbKonfirmasiMedia::className(), ['id_konfirmasi' => 'id']);
    }
}
