<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Book;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\bookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$language = \Yii::$app->params['language'];
$this->title = \Yii::t('app', 'booking');
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
            // [
            // 'class' => 'yii\grid\CheckboxColumn'],
            [
                'attribute' =>'id',
                'label'=>'ID',
                'headerOptions'=>[
                    'style' =>'width:15px;text-align:center'
                ],
                'contentOptions'=>[
                '   style' =>'width:15px;text-align:center'
                ]
            ],
            [
                'attribute' =>'book_time',
                'headerOptions'=>[
                    'style' =>'width:100px;text-align:center'
                ],
                'contentOptions'=>[
                '   style' =>'width:100px;text-align:center'
                ]
            ],
                // The Book Time Expiration Value
            [
                'attribute' => 'book_time_expiration',
                'format' =>'datetime',
            ],
                // The Sub Properties Value
            [ 
                'attribute' => 'sub_properties_id',
                'format' => 'html',
                'value' => function ($model){
                    return Html::a($model->subProperties->name, ['sub-properties/view', 'id' => $model->subProperties->id]);

                } // subProperties là function ở Deposit (getSubProperties), trả về row có id = sub_properties_id
            ],

            [
                'attribute' =>'created_at',
                'content'=>function($model){
                return date('H:i:s d-m-y',$model->created_at);

                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons'=>[
                    'view'=> function($url,$model){
                    return Html::a(\Yii::t('app', 'view'),$url,['class'=>'btn btn-xs btn-primary']);
                },
                    'update'=> function($url,$model){
                    return Html::a('<span class ="glyphicon glyphicon-pencil"></span> '.\Yii::t('app', 'edit'),$url,['class'=>'btn btn-xs btn-success']);
                },
                    'delete'=>function($url, $data){
                        //return Html::a('<span class="glyphicon glyphicon-remove"></span>', 'javascript:void(0)', 
                            //[ 'title' => Yii::t('app', 'Delete'),'data-id'=>$data['id'], 'class'=>'deluser', ]);
                        return Html::a(\Yii::t('app', 'delete'),$url,
                      ['class'=>'btn btn-xs btn-danger', 
                      'data-confirm' =>\Yii::t('app', 'delete_notification'),
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
