<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_rekening".
 *
 * @property int $id
 * @property string $no_rek
 * @property string $atas_nama
 * @property string $nama_atm
 */
class RefRekening extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_rekening';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_rek', 'atas_nama', 'nama_atm'], 'required'],
            [['no_rek', 'atas_nama'], 'string', 'max' => 150],
            [['nama_atm'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_rek' => 'No Rek',
            'atas_nama' => 'Atas Nama',
            'nama_atm' => 'Nama Atm',
        ];
    }
}
