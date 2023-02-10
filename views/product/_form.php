<?php

use yii\helpers\Html;
use yii\boostrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-form">

    <?php $form = \yii\bootstrap5\ActiveForm::begin(); 
    $li=[]; $categories=\app\models\Category::find()->all();
    foreach ($categories as $category)
   { 
   $li[$category->id]=$category->name; 
   }
   
    ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList($li)?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-info text-light']) ?>
    </div>

    <?php \yii\bootstrap5\ActiveForm::end(); ?>

</div>
