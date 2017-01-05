<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
// get models Deposit
use backend\models\Deposit;
/* @var $this yii\web\View */
/* @var $model backend\models\Deposit */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Deposits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deposit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
          <?= Html::a(\Yii::t('app', 'update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(\Yii::t('app', 'delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' =>  \Yii::t('app', 'delete_notification'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            [
                'label' => \Yii::t('app', 'subPropertiesName'),
                'value' => Html::a($model->subProperties->name, ['sub-properties/view', 'id' => $model->subProperties->id]),
                'format' => 'html'
            ], 
            [
                'label' => \Yii::t('app', 'status'),
                'value' => (($model->status == 0) ? "Thiếu": "Đủ"),
            ],
            [
                'attribute' => 'updated_at', 
                'label' => \Yii::t('app', 'updatedAt'),
                'format' => 'datetime'
            ],
            [
                'attribute' => 'created_at',
                'label' => \Yii::t('app', 'createdAt'),
                'format' => 'datetime'
            ],
        ],
    ]) ?>

</div>
