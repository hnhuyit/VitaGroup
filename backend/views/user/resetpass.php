<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Reset Password';
?>
<div class="user-update">

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
		</div>
		<div class="panel-body">
	<?= $this->render('_resetpass.php', [
		'model' => $model,
		]) ?>
	</div>
	</div>
	</div>
