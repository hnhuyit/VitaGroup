<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Milestone;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\bookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('app', 'milestone');
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
          

             [
                'attribute' =>'id',
                'label'=>'ID',
                'headerOptions'=>[
                'style' =>'width:15px;text-align:center'
            ],
                'contentOptions'=>[
                'style' =>'width:15px;text-align:center'
            ]
            ],
            'name',
            'price',
            [ 
                'attribute' => 'properties_id',
                'format' => 'html',
                'value' => function ($model){
                    return Html::a($model->properties->name, ['properties/view', 'id' => $model->properties->id], ['class' => '_blank']);

                }
            ],
            [
                'attribute' =>'status',
                'content'=>function($model){
                    if($model->status == 0){
                return '<span class="label label-warning">Chưa Đóng</span>';
                    }else {
                        return '<span class="label label-success">Đã Đóng </span>';
                    }
                },
                'headerOptions'=>[
                'style' =>'width:150px;text-align:center'
                ],
                'contentOptions'=>[
                'style' =>'width:150px;text-align:center'
                ]
            ],
            [
                'attribute' =>'period',
                'headerOptions'=>[
                'style' =>'width:50px;text-align:center'
                ],
                'contentOptions'=>[
                'style' =>'width:50px;text-align:center'
                ]
            ],
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view'=> function($url,$model){
                    return Html::a(\Yii::t('app', 'view'),$url,['class'=>'btn btn-xs btn-primary']);
                },
                    'update'=> function($url,$model){
                    return Html::a('<span class ="glyphicon glyphicon-pencil"></span> '.\Yii::t('app', 'edit'),$url,['class'=>'btn btn-xs btn-success']);
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
