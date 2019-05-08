<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TbTransaksiBarang;

/**
 * TransaksiBarangSearch represents the model behind the search form of `common\models\TbTransaksiBarang`.
 */
class TransaksiBarangSearch extends TbTransaksiBarang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_transaksi', 'id_barang', 'qty', 'total_harga', 'status_transaksi'], 'integer'],
            [['catatan'], 'safe'],
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
        $query = TbTransaksiBarang::find();

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
            'id_user' => $this->id_user,
            'id_transaksi' => $this->id_transaksi,
            'id_barang' => $this->id_barang,
            'qty' => $this->qty,
            'total_harga' => $this->total_harga,
            'status_transaksi' => $this->status_transaksi,
        ]);

        $query->andFilterWhere(['like', 'catatan', $this->catatan]);

        return $dataProvider;
    }
}
