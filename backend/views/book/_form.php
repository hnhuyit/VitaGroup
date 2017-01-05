<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Book;
use yii\helpers\ArrayHelper;
use backend\models\SubProperties;
/* @var $this yii\web\View */
/* @var $model backend\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_time')->textInput() ?>

    <?= $form->field($model, 'book_time_expiration')->textInput() ?>
    
    <?= $form->field($model, 'sub_properties_id')->dropDownList(
        // dùng để lấy giá trị tên của sup_properties cho vào DownList
		ArrayHelper::map(SubProperties::find()->all(),'id','name'),
        [
            'prompt'=> ' '
        ]
	) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? \Yii::t('app', 'create') :  \Yii::t('app', 'update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
