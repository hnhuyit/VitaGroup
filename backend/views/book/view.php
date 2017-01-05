<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Book;

$language = \Yii::$app->params['language'];
$this->title = $model->subProperties->name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'booking'), 'url' => ['index']];
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
            [
                'attribute' => 'book_time',
            ],
            [
                'attribute' => 'book_time_expiration',
                'format' =>'datetime',
            ],
            [
                'label' => \Yii::t('app','subProperties'),
                'value' => Html::a($model->subProperties->name, ['sub-properties/view', 'id' => $model->subProperties->id]),
                'format' => 'html'
            ], 
            [
                'attribute' => 'updated_at',
                'label' => \Yii::t('app','updatedAt'),
                'format' => 'datetime'
            ],
            [
                'attribute' => 'created_at',
                'label' => \Yii::t('app','createdAt'),
                'format' => 'datetime'
            ],
        ],
    ]) ?>
    </div>
</div>
</div>
