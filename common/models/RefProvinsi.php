<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_provinsi".
 *
 * @property int $Kd_Prov
 * @property string $Nm_Prov
 *
 * @property RefKabupaten[] $refKabupatens
 */
class RefProvinsi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_provinsi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Kd_Prov'], 'required'],
            [['Kd_Prov'], 'integer'],
            [['Nm_Prov'], 'string', 'max' => 200],
            [['Kd_Prov'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Kd_Prov' => 'Kd  Prov',
            'Nm_Prov' => 'Nm  Prov',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefKabupatens()
    {
        return $this->hasMany(RefKabupaten::className(), ['Kd_Prov' => 'kd_prov']);
    }
}
