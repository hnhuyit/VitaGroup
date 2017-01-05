<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Milestone */

$this->title = 'Create Milestone';
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'milestone'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="milestone-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
