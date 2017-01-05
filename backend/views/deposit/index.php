<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Deposit;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\bookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('app', 'deposit');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deposit-index">
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
            // get the checkbox
            // ['class' => 'yii\grid\CheckboxColumn'],

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
            'name',
            [
                'attribute' =>'price',
                'headerOptions'=>[
                    'style' =>'width:15px;text-align:center'
                ],
                'contentOptions'=>[
                '   style' =>'width:15px;text-align:center'
                ]
            ],
            [ 
                // lấy tên của SubProperties bằng lấy sub_properties rồi so sánh trong bảng sub_properties
                'attribute' => 'sub_properties_id',
                'format' => 'html',
                'value' => function ($model){
                    return Html::a($model->subProperties->name, ['sub-properties/view', 'id' => $model->subProperties->id]);
                }
            ],
            [
                'attribute' =>'status',
                'content'=>function($model){
                    if($model->status == 0){
                return '<span class="label label-danger">Thiếu</span>';
                    }else {
                        return '<span class="label label-success">Đủ</span>';
                    }
                },
                'headerOptions'=>[
                'style' =>'width:75px;text-align:center'
                ],
                'contentOptions'=>[
                'style' =>'width:75px;text-align:center'
                ]
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
