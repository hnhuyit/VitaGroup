<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true,$model->isNewRecord ? '' : 'readonly'=>'readonly']) ?>
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $model->isNewRecord ? $form->field($model, 'password_hash')->textInput(['maxlength' => true,'type'=>'password']):'' ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'identity_number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tax_code')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->dropDownList(
        ['0'=>'Inactive','1' => 'Active', '2' => 'OFF'], 
        ['prompt' => '---Select---']
        )?>
    <?= $form->field($model, 'type')->dropDownList(
        ['0'=>'User','1' => 'Manager', '2' => 'Invesstor','3'=>'Administrator'], 
        ['prompt' => '---Select---']
        )?>
        
        <div class="form-group">
           <div class="col-sm-offset-2 col-sm-10">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
