<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\SubProperties;
use yii\helpers\ArrayHelper;
use backend\models\User;
use backend\models\Properties;
/* @var $this yii\web\View */
/* @var $model backend\models\SubProperties */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-properties-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(
            [
                0=>'Trống Có Thể Đặt',
                1=>'Đã Booking',
                2=>'Đã Deposit',
                3=>'Đã Mua',
            ],
            [
                'prompt'=>'Chọn Trạng Thái',
            ]
            ) ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        // dùng để lấy giá trị tên của User Name cho vào DownList
        ArrayHelper::map(User::find()->all(),'id','username'),
        [
            'prompt'=> 'Select Name User'
        ]
    ) ?>

    <?= $form->field($model, 'properties_id')->dropDownList(
        // dùng để lấy giá trị tên của Properties cho vào DownList
        ArrayHelper::map(Properties::find()->all(),'id','name'),
        [
            'prompt'=> 'Select Properties Name'
        ]
    ) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floor')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? \Yii::t('app', 'create') : \Yii::t('app', 'update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
