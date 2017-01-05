<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Deposit */

$this->title = \Yii::t('app', 'create');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'deposit'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deposit-create">

   <div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>

    </div>
    <div class="panel-body">
        <p class="pull-right">
            <?= Html::a(\Yii::t('app', 'create'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
