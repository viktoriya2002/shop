<?php

use yii\helpers\Html;
use yii\boostrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">

    <?php $form = \yii\bootstrap5\ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Новый' => 'Новый', 'Принят' => 'Принят', 'Отклонен' => 'Отклонен', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'count')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-info text-light']) ?>
    </div>

    <?php \yii\bootstrap5\ActiveForm::end(); ?>

</div>
