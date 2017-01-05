<?php

use yii\helpers\Html;
$this->title = 'Change Password User: ' . $model->first_name.' '.$model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
		</div>
		<div class="panel-body">
    <?= $this->render('_formchangpass.php', [
        'model' => $model,
    ]) ?>
	</div>
	</div>
</div>