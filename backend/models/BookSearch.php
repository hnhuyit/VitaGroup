<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Book;
use yii\db\ActiveQuery;

/**
 * BookSearch represents the model behind the search form about `backend\models\Book`.
 */
class BookSearch extends Book
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'book_time', 'book_time_expiration', 'created_at', 'updated_at'], 'integer'],
            [['sub_properties_id'],'safe'],
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
        $query = Book::find();

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
         * subProperties là function ở Book (getSubProperties)
         * ở đây, bảng Book thêm alias là b và subProperties là sp
         */
        $query->alias("b")->joinWith('subProperties as sp');
        // grid filtering conditions
        // 
        /**
         * các trường id, created_at, update_at thuộc bảng Book nên thêm alias b phía trước
         */
        $query->andFilterWhere([
            'b.id' => $this->id, 
            // 'sub_properties_id' => $this->sub_properties_id -  Xóa, sub_properties_id dùng để kiếm sub_properties.name chứ k còn là id
            'b.created_at' => $this->created_at,
            'b.updated_at' => $this->updated_at,
        ]);
        /**
         * các trường name, price, status thuộc bảng Book nên thêm alias b phía trước, trong đó có 1 trường name khác thuộc bảng sub_properties nên thêm alias là sp
         */

        $query->andFilterWhere(['like', 'b.book_time', $this->book_time])
            ->andFilterWhere(['like', 'b.book_time_expiration', $this->book_time_expiration])
            ->andFilterWhere(['like', 'sp.name', $this->sub_properties_id]); //tìm kiếm name dựa vào trường sub_properties_id

        return $dataProvider;
    }
}
