<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TbKonfimasiPembayaran;

/**
 * KonfirmasiPembayaranSearch represents the model behind the search form of `common\models\TbKonfimasiPembayaran`.
 */
class KonfirmasiPembayaranSearch extends TbKonfimasiPembayaran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'no_pesanan', 'jumlah_transfer', 'id_file'], 'integer'],
            [['nama_pengirim', 'nama_bank'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TbKonfimasiPembayaran::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'no_pesanan' => $this->no_pesanan,
            'jumlah_transfer' => $this->jumlah_transfer,
            'id_file' => $this->id_file,
        ]);

        $query->andFilterWhere(['like', 'nama_pengirim', $this->nama_pengirim])
            ->andFilterWhere(['like', 'nama_bank', $this->nama_bank]);

        return $dataProvider;
    }
}
