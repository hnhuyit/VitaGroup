<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\bookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = \Yii::t('app', 'properties');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="properties-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">
        <p class="pull-right">
            <?= Html::a(\Yii::t('app', 'create') . ' Properties', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
          <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // get the checkbox

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
            [
                // show the status  
                // 0 là còn trống , 1 là đã bán
                'attribute' =>'status',
                'content'=>function($model){
                    if($model->status == 0){
                return '<span class="label label-success">Còn Trống</span>';
                    }else {
                        return '<span class="label label-danger">Đã Bán</span>';
                    }
                },
                'headerOptions'=>[
                'style' =>'width:150px;text-align:center'
                ],
                'contentOptions'=>[
                'style' =>'width:150px;text-align:center'
                ]
            ],
            
            'created_at:datetime',
            'updated_at:datetime',

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
