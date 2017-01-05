<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\SubProperties;

/* @var $this yii\web\View */
/* @var $model backend\models\SubProperties */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'subProperties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-properties-view">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

        </div>
        <div class="panel-body">
        <p class="pull-right">
            <?= Html::a(\Yii::t('app', 'update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(\Yii::t('app', 'delete'), ['delete', 'id' => $model->id], [
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
            'id',
            'name',
            [
                'attribute' => 'status',
                'value' => (
                    ($model->status == 0) ? "Trống Có Thể Đặt": (
                        ($model->status == 1)? "Đã Booking" : (
                            ($model->status == 2)? "Đã Deposit":"Đã Mua")
                    )
                ),
            ],

            [
                'attribute' => 'user_id',
                'value' => Html::a($model->userSearch->username , ['user/view', 'id' => $model->userSearch->id]),
                'format' => 'html'
            ],


            [
                'attribute' => 'properties_id',
                'value' => Html::a($model->propertiesSearch->name, ['properties/view', 'id' => $model->propertiesSearch->id]),
                'format' => 'html'
            ],
            
            'price',
            'floor',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
</div>
</div>