<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserRelative */

$this->title = 'Create User Relative';
$this->params['breadcrumbs'][] = ['label' => 'User Relatives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-relative-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
