<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Book;

$language = \Yii::$app->params['language'];

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'milestone'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="milestone-view">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

    </div>
    <div class="panel-body">
        <p class="pull-right">
            <?= Html::a(\Yii::t('app','edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(\Yii::t('app','delete'), ['delete', 'id' => $model->id], [
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
                'price',
                [
                    'label' => \Yii::t('app','propertiesId'),
                    'value' => Html::a($model->properties->name, ['properties/view', 'id' => $model->properties->id]),
                    'format' => 'html'
                ],
                [
                    'label' => \Yii::t('app','status'),
                    'value' => (($model->status == 0) ? "Chưa Đóng": "Đã Đóng"),
                ],
                'period',
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ]) ?>
    </div>
</div>
</div>
