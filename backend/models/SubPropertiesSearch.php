<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubProperties;

/**
 * SubPropertiesSearch represents the model behind the search form about `backend\models\SubProperties`.
 */
class SubPropertiesSearch extends SubProperties
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name','user_id',  'properties_id', 'price', 'floor'], 'safe'],
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
        $query = SubProperties::find();

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

        $query->alias("sp")->joinWith('userSearch as us');
        $query->alias("sp")->joinWith('propertiesSearch as ps');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sp.created_at' => $this->created_at,
            'sp.updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'sp.name', $this->name])
            ->andFilterWhere(['like', 'us.username', $this->user_id])
            ->andFilterWhere(['like', 'ps.name', $this->properties_id])
            ->andFilterWhere(['like', 'sp.price', $this->price])
            ->andFilterWhere(['like', 'sp.floor', $this->floor]);

        return $dataProvider;
    }
}
