<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $model backend\models\User */

//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;




?>
<div class="user-view">
 <h1><?= Html::encode($this->title) ?></h1>
 <?=
 GridView::widget([
  'dataProvider' => $dataProvider,
  'columns' =>[
  ['class' => 'yii\grid\SerialColumn'],
  [
  'class' => 'yii\grid\DataColumn',
  'value' => function ($data) {
   return Yii::$app->formatter->asCurrency($data['price'],'VNĐ');
 },
 'attribute' => 'Price',
 'format' => 'text',
 ],
 ['class' => 'yii\grid\DataColumn',
 'attribute' => 'Status',
 'format' => 'text',
 'value' => function ($data) {
   return $data['status']==1?"Pay":"Pending";
 },
 ],
 'manager_id',
 'deposit_id',
 'milestone_id',
 'sub_properties_id',
 ]	
 ]);
 ?>
</div>
