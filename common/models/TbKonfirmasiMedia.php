<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tb_konfirmasi_media".
 *
 * @property int $id
 * @property int $id_konfirmasi
 * @property string $name
 * @property string $filename
 * @property int $size
 * @property string $type
 */
class TbKonfirmasiMedia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_konfirmasi_media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_konfirmasi', 'name', 'filename', 'size', 'type'], 'required'],
            [['id_konfirmasi', 'size'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['filename'], 'string', 'max' => 350],
            [['type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_konfirmasi' => 'Id Produk',
            'name' => 'Name',
            'filename' => 'Filename',
            'size' => 'Size',
            'type' => 'Type',
        ];
    }
}
