<?php

namespace backend\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "milestone".
 *
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property integer $properties_id
 * @property integer $status
 * @property string $period
 * @property integer $created_at
 * @property integer $updated_at
 */
class Milestone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'milestone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'status', 'period', 'created_at', 'updated_at'], 'required'],
            [['properties_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'price', 'period'], 'string', 'max' => 45],
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
            'properties_id' => \Yii::t('app', 'propertiesId'),
            'status' => \Yii::t('app', 'status'),
            'period' => \Yii::t('app', 'period'),
            'created_at' => \Yii::t('app', 'createdAt'),
            'updated_at' => \Yii::t('app', 'updatedAt'),
        ];
    }
    // dùng để liên kết với bảng properties
    public function getProperties(){
        return $this->hasOne(Properties::className(), ['id' => 'properties_id']);
    }
}