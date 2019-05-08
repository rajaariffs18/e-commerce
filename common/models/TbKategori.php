<?php

namespace common\models;

use Yii;
use common\models\TbKategoriMedia;

/**
 * This is the model class for table "tb_kategori".
 *
 * @property int $id
 * @property string $kategori
 * @property int $status
 */
class TbKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $imageFile;

    public static function tableName()
    {
        return 'tb_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori', 'status'], 'required'],
            [['status'], 'integer'],
            // [['id_file'], 'integer'],
            [['kategori'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            
        ];
    }

    public function upload()
    {
        if ($this->validate(false)) { 
                $suratMedia = new TbKategoriMedia();
                $path = realpath(Yii::$app->basePath).'/web/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
                $suratMedia->id_produk = $this->id;
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kategori' => 'Kategori',
            'status' => 'Status',
        ];
    }

    public function getKategoriMedia()
    {
        // $model = TbKategoriMedia::find()->where(['id_produk' => $this->id])->max('id');
        return $this->hasOne(TbKategoriMedia::className(), ['id_produk' => 'id']);
    }
}
