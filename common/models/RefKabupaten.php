<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_kabupaten".
 *
 * @property int $Kd_Prov
 * @property int $Kd_Kab
 * @property string $Nm_Kab
 *
 * @property RefProvinsi $kdProv
 * @property RefKecamatan[] $refKecamatans
 */
class RefKabupaten extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kabupaten';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Kd_Prov', 'Kd_Kab'], 'required'],
            [['Kd_Prov', 'Kd_Kab'], 'integer'],
            [['Nm_Kab'], 'string', 'max' => 255],
            [['Kd_Prov', 'Kd_Kab'], 'unique', 'targetAttribute' => ['Kd_Prov', 'Kd_Kab']],
            [['Kd_Prov'], 'exist', 'skipOnError' => true, 'targetClass' => RefProvinsi::className(), 'targetAttribute' => ['Kd_Prov' => 'kd_prov']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Kd_Prov' => 'Kd  Prov',
            'Kd_Kab' => 'Kd  Kab',
            'Nm_Kab' => 'Nm  Kab',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdProv()
    {
        return $this->hasOne(RefProvinsi::className(), ['kd_prov' => 'Kd_Prov']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefKecamatans()
    {
        return $this->hasMany(RefKecamatan::className(), ['Kd_Prov' => 'kd_prov', 'Kd_Kab' => 'kd_kab']);
    }
}
