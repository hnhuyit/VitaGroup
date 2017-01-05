<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\SubProperties;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\bookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('app', 'subProperties');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

    </div>
    <div class="panel-body">
        <p class="pull-right">
            <?= Html::a(\Yii::t('app', 'create'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
         <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'name',
             [
                'attribute' =>'status',
                'content'=>function($model){
                    if($model->status == 0){
                return '<span class="label label-success">Trống</span>';
                    }else if($model->status == 1) {
                        return '<span class="label label-warning">Đã Booking</span>';
                    }
                    else if($model->status == 2) {
                        return '<span class="label label-danger">Đã Deposit</span>';
                    }
                    else{
                        return '<span class="label label-primary">Đã Mua</span>';
                    }
                },
                'headerOptions'=>[
                'style' =>'width:150px;text-align:center'
                ],
                'contentOptions'=>[
                'style' =>'width:150px;text-align:center'
                ]
            ],
            // 'user_id',
            
            [ 
                'attribute' => 'user_id',
                'format' => 'html',
                'value' => function ($model){
                    return Html::a($model->userSearch->username, ['user/view', 'id' => $model->userSearch->id]);

                } // subProperties là function ở Deposit (getSubProperties), trả về row có id = sub_properties_id
            ],
            // 'properties_id',
            [ 
                'attribute' => 'properties_id',
                'format' => 'html',
                'value' => function ($model){
                    return Html::a($model->propertiesSearch->name, ['user/view', 'id' => $model->propertiesSearch->id]);

                } // subProperties là function ở Deposit (getSubProperties), trả về row có id = sub_properties_id
            ],
            'price' ,
            'floor',
            // 'created_at',
            // 'updated_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view'=> function($url,$model){
                    return Html::a(\Yii::t('app', 'view'),$url,['class'=>'btn btn-xs btn-primary']);
                },
                    'update'=> function($url,$model){
                    return Html::a('<span class ="glyphicon glyphicon-pencil"></span> ' . \Yii::t('app', 'update'),$url,['class'=>'btn btn-xs btn-success']);
                },
                    'delete'=> function($url,$model){
                    return Html::a('<span class ="glyphicon glyphicon-remove"></span> ' . \Yii::t('app', 'delete'),$url,
                        [
                            'class'=>'btn btn-xs btn-danger',
                            'data-confirm' =>'Bạn có chắc muốn xóa',
                            'data-method' =>'post', 
                        ]
                        );
                    },
                ]   
            ],
        ],
    ]); ?>
    </div>
</div>
</div>
