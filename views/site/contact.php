<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Где нас найти?';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><center><?= Html::encode($this->title) ?><center></h1>
    <center><img src="../pic/map.png" alt="image" width="550" height="300"></center>
    <br>
    <form class="row g-3">
    <span class="border border-3 border-secondary">
        <p><b>Адрес:</b> пр. Просвещения, 46, Санкт-Петербург</p>
        <p><b>Номер телефона:</b> +79643767775</p>
        <p><b>Почта:</b> shopMusic@mail.com</p>
    </span>
    </form>
</div>
