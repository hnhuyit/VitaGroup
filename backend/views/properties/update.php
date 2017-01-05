<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Properties */

$this->title = \Yii::t('app', 'update') . ' Properties: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'properties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = \Yii::t('app', 'update');
?>
<div class="book-update">
   
    <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

    </div>
    <div class="panel-body">
        <p class="pull-right">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
</div>
</div>