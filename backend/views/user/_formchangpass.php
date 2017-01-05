<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>
<div class="user-form">
    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true,'type'=>'password']) ?>
    <?= $form->field($model, 'passwordNew')->textInput(['maxlength' => true,'type'=>'password']) ?>
     <?= $form->field($model, 'rePasss')->textInput(['maxlength' => true,'type'=>'password']) ?>
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
