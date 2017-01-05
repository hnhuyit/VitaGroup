<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
$this->title = $model->first_name.' '.$model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <p>
                <?= Html::a('Send Mail', 'javascript:void(0)', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                    ],
                    ]) ?>
                </p>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [

                    [
                    'label'=>'Full Name',
                    'value'=>$model->first_name.' '.$model->last_name,
                    ],

                    'username',
                    [
                    'label'=>'Type',
                    'value'=>$type,
                    ],
                    'email:email',
                    [
                    'label'=>'Status',
                    'attribute' => 'status',
                    'format'=>'html',
                    'value'=> call_user_func(function($data,$status){
                        return "<span class='label ".User::userStatusClass($data->status)."'>".$status."</span>";
                    }, $model,$status),          
                    ],
                    'phone',
                    'tax_code',
                    'identity_number',
                    'address',
                    'created_at:datetime'
                    ],
                    ]) ?>
                </div>
            </div>
        </div>
