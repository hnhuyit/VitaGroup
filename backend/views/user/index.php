<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>

    <div class="panel-body">
      <p class="pull-right">
       <?= Html::a('Create User', ['create'], ['class' => ' btn btn-primary']) ?>
       <?= Html::a('Send Mail', ['sendmail'], ['class' => 'btn btn btn-warning']) ?>
       <?= Html::a('Delete', 'javascript:void(0)', ['class' => ' delselect btn btn-danger']) ?>
     </p>
     


   <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [/*
    [
    'class' => 'yii\grid\CheckboxColumn',
    ],*/
    ['class' => 'yii\grid\SerialColumn'],
    'username',
    ['class' => 'yii\grid\DataColumn',
    'attribute' => 'type',
    'label'=>'Type',
    'format' => 'text',
    'value' => function ($data) {
     return User::UserType($data['type']);
   },
   
   ],
   [

   'attribute' => 'status',
   'label'=>'Status',
   'format'=>'html',
   'content' => function($data){
     return "<span class='label ".User::userStatusClass($data['status'])."'>".User::UserStatus($data['status'])."</span>";
   },
   ],
   ['class' => 'yii\grid\ActionColumn',
   'visible'=> true,
   'template' => '{view} {update} {charge} {sendmail} {delete} ',
   'buttons'=>[
   'charge' => function ($url, $model) {
    return  Html::a('<span class="glyphicon glyphicon-credit-card"></span>', $url, 
      [ 'title' => Yii::t('app', 'charge'), 'class'=>'btn btn-xs btn-info', ]);
  },
  'sendmail'=>function($url, $data){
        //return Html::a('<span class="glyphicon glyphicon-remove"></span>', 'javascript:void(0)', 
            //[ 'title' => Yii::t('app', 'Delete'),'data-id'=>$data['id'], 'class'=>'deluser', ]);
    return Html::a('Send Mail','javascript:void(0)',
      ['class'=>'btn btn-xs btn-info','data-id'=>$data['id'] ]
      ); 
  },
  'delete'=>function($url, $data){
        //return Html::a('<span class="glyphicon glyphicon-remove"></span>', 'javascript:void(0)', 
            //[ 'title' => Yii::t('app', 'Delete'),'data-id'=>$data['id'], 'class'=>'deluser', ]);
    return Html::a(' Delete',$url,
      ['class'=>'btn btn-xs btn-danger', 
      'data-confirm' =>'Are you sure you want to delete this item?',
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
