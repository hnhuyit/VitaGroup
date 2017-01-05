<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Properties;

/* @var $this yii\web\View */
/* @var $model backend\models\Milestone */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="milestone-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'properties_id')->dropDownList(
        // dùng để lấy giá trị tên của sup_properties cho vào DownList
        ArrayHelper::map(Properties::find()->all(),'id','name'),
        [
            'prompt'=> ' '
        ]
    ) ?>

    <?= $form->field($model, 'status')->dropDownList(
            [
                0=>'Chưa Đóng',
                1=>'Đã Đóng',
            ],
            [
                'prompt'=>'Chọn Trạng Thái',
            ]
            ) ?>

    <?= $form->field($model, 'period')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? \Yii::t('app', 'create') : \Yii::t('app', 'update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
