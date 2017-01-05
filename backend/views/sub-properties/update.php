<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubProperties */

$this->title = \Yii::t('app', 'update') . ' Sub Properties: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'subProperties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = \Yii::t('app', 'update');
?>
<div class="sub-properties-update">

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
