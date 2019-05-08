<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TbTransaksiData;

/**
 * TransaksiDataSearch represents the model behind the search form of `common\models\TbTransaksiData`.
 */
class TransaksiDataSearch extends TbTransaksiData
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'nama_depan', 'nama_belakang', 'kode_pos', 'no_telp', 'metode_pembayaran', 'estimasi_pengiriman', 'ongkos_kirim', 'kd_atm', 'total_pembayaran'], 'integer'],
            [['provinsi', 'kab_kota', 'alamat'], 'safe'],
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
        $query = TbTransaksiData::find();

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
            'id_transaksi' => $this->id_transaksi,
            'nama_depan' => $this->nama_depan,
            'nama_belakang' => $this->nama_belakang,
            'kode_pos' => $this->kode_pos,
            'no_telp' => $this->no_telp,
            'metode_pembayaran' => $this->metode_pembayaran,
            'estimasi_pengiriman' => $this->estimasi_pengiriman,
            'ongkos_kirim' => $this->ongkos_kirim,
            'kd_atm' => $this->kd_atm,
            'total_pembayaran' => $this->total_pembayaran,
        ]);

        $query->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'kab_kota', $this->kab_kota])
            ->andFilterWhere(['like', 'alamat', $this->alamat]);

        return $dataProvider;
    }
}
