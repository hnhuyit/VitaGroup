<?php

namespace backend\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "sub_properties".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property integer $user_id
 * @property integer $properties_id
 * @property string $price
 * @property string $floor
 * @property integer $created_at
 * @property integer $updated_at
 */
class SubProperties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sub_properties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'floor', 'created_at', 'updated_at'], 'required'],
            [['status', 'user_id', 'properties_id', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['price', 'floor'], 'string', 'max' => 45],
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
            'name' =>  \Yii::t('app', 'name'),
            'status' => \Yii::t('app', 'status'),
            'user_id' => \Yii::t('app', 'userId'),
            'properties_id' => \Yii::t('app', 'propertiesId'),
            'price' => \Yii::t('app', 'price'),
            'floor' => \Yii::t('app', 'floor'),
            'created_at' => \Yii::t('app', 'createdAt'),
            'updated_at' => \Yii::t('app', 'updatedAt'),
        ];
    }

    public function getUserSearch()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function getPropertiesSearch()
    {
        return $this->hasOne(Properties::className(), ['id' => 'properties_id']);
    }

}
