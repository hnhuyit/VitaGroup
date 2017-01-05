<?php

namespace backend\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "deposit".
 *
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property integer $sub_properties_id
 * @property string $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Deposit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deposit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'status', 'created_at', 'updated_at'], 'required'],
            [[ 'created_at', 'updated_at'], 'integer'],
            // chuyển đổi kiểu của subProperties
            [['sub_properties_id'],'safe'],
            [['name', 'status'], 'string', 'max' => 45],
            [['price'], 'string', 'max' => 32],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => \Yii::t('app', 'name'),
            'price' => \Yii::t('app', 'price'),
            'sub_properties_id' =>  \Yii::t('app', 'subPropertiesId'),
            'status' => \Yii::t('app', 'status'),
            'created_at' => \Yii::t('app', 'created_at'),
            'updated_at' =>  \Yii::t('app', 'updated_at'),
        ];
    }

    // dùng để liên kết với bảng sub_properties
    public function getSubProperties(){
        return $this->hasOne(SubProperties::className(), ['id' => 'sub_properties_id']);
    }
}
