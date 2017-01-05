<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Properties */

$language = \Yii::$app->params['language'];
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="properties-view">
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
                'value' => (($model->status == 0) ? "Còn Trống": "Đã Bán"),
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
</div>
</div>

