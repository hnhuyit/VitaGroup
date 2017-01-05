<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubProperties */

$this->title = 'Create Sub Properties';
$this->params['breadcrumbs'][] = ['label' => 'Sub Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-properties-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
