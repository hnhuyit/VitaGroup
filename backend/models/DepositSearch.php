<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Deposit;

/**
 * DepositSearch represents the model behind the search form about `backend\models\Deposit`.
 */
class DepositSearch extends Deposit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            // tại đây ta chuyển đổi kiểu của SubProperties Id từ interger sang safe
            [['name', 'sub_properties_id', 'price', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Deposit::find();

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
/**
         * subProperties là function ở Deposit (getSubProperties)
         * Bảng sub_properties có những trường trùng với bảng deposit như name, status, price, created_at, updated_at nên cần tạo alias cho mỗi bảng 
         * ở đây, bảng deposit thêm alias là d và subProperties là sp
         */
        $query->alias("d")->joinWith('subProperties as sp');
        // grid filtering conditions
        // 
        /**
         * các trường id, created_at, update_at thuộc bảng deposit nên thêm alias d phía trước
         */
        $query->andFilterWhere([
            'd.id' => $this->id, 
            'd.created_at' => $this->created_at,
            'd.updated_at' => $this->updated_at,
        ]);
        /**
         * các trường name, price, status thuộc bảng deposit nên thêm alias d phía trước, trong đó có 1 trường name khác thuộc bảng sub_properties nên thêm alias là sp
         */

        $query->andFilterWhere(['like', 'd.name', $this->name])
            ->andFilterWhere(['like', 'd.price', $this->price])
            ->andFilterWhere(['like', 'd.status', $this->status])
            ->andFilterWhere(['like', 'sp.name', $this->sub_properties_id]); //tìm kiếm name dựa vào trường sub_properties_id

        return $dataProvider;
    }
}
