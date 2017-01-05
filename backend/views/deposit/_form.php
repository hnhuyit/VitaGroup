<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Deposit;
use yii\helpers\ArrayHelper;
use backend\models\SubProperties;

/* @var $this yii\web\View */
/* @var $model backend\models\Deposit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deposit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_properties_id')->dropDownList(
        // dùng để lấy giá trị tên của sup_properties cho vào DownList
        ArrayHelper::map(SubProperties::find()->all(),'id','name'),
        [
            'prompt'=> \Yii::t('app', 'chooseSubPropertiesName'),
        ]
    ) ?>

    <?= $form->field($model, 'status')->dropDownList(
            [
                0=>\Yii::t('app', 'miss'),
                1=>\Yii::t('app', 'full'),
            ],
            [
                'prompt'=>\Yii::t('app', 'chooseStatus'),
            ]
            ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? \Yii::t('app', 'create') :  \Yii::t('app', 'update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
