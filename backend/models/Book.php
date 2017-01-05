<?php

namespace backend\models;

use Yii;
use yii\db\Query;
use backend\models\SubProperties;
/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property integer $book_time
 * @property integer $book_time_expiration
 * @property integer $sub_properties_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_time', 'book_time_expiration', 'created_at', 'updated_at'], 'required'],
            [['book_time', 'book_time_expiration', 'sub_properties_id', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_time' => \Yii::t('app', 'bookTime'),
            'book_time_expiration' => \Yii::t('app', 'bookTimeExpiration'),
            'sub_properties_id' => \Yii::t('app', 'subPropertiesId'),
            'created_at' =>\Yii::t('app', 'createdAt'),
            'updated_at' =>\Yii::t('app', 'updatedAt'),
        ];
    }
    // dùng để liên kết với bảng sub_properties
    public function getSubProperties(){
        return $this->hasOne(SubProperties::className(), ['id' => 'sub_properties_id']);
    }
}
