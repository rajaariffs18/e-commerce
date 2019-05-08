<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ref_kecamatan".
 *
 * @property int $Kd_Prov
 * @property int $Kd_Kab
 * @property int $Kd_Kec
 * @property string $Nm_Kec
 *
 * @property RefKabupaten $kdProv
 */
class RefKecamatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_kecamatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Kd_Prov', 'Kd_Kab', 'Kd_Kec'], 'required'],
            [['Kd_Prov', 'Kd_Kab', 'Kd_Kec'], 'integer'],
            [['Nm_Kec'], 'string', 'max' => 255],
            [['Kd_Prov', 'Kd_Kab', 'Kd_Kec'], 'unique', 'targetAttribute' => ['Kd_Prov', 'Kd_Kab', 'Kd_Kec']],
            [['Kd_Prov', 'Kd_Kab'], 'exist', 'skipOnError' => true, 'targetClass' => RefKabupaten::className(), 'targetAttribute' => ['Kd_Prov' => 'kd_prov', 'Kd_Kab' => 'kd_kab']],
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
            'Kd_Kec' => 'Kd  Kec',
            'Nm_Kec' => 'Nm  Kec',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdProv()
    {
        return $this->hasOne(RefKabupaten::className(), ['kd_prov' => 'Kd_Prov', 'kd_kab' => 'Kd_Kab']);
    }
}
