<?php

/** @var yii\web\View $this */

use app\models\Product;
use yii\helpers\Html;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">

    <div class='about'>
    <center><img src="../logo/logo.png" alt="image" width="366" height="200"></center>
    <h1><center><?= Html::encode($this->title) ?></center></h1>

    <form class="row g-3">
        <span class="border border-3 border-secondary">
            <h4>Наш девиз:</h4>
            <div class="text-center"><p class="logo"><big>Новый взгляд на хорошую музыку</big></p></div>
        </span>
    </form>
</div>

<?php 

/*$products=Product::find()->orderBy(['date'=>SORT_DESC])->limit(5)->all();
$items=[];

foreach ($products as $product){
    $items[]="<div class='bg-success m-2 p-2 d-flex flex-column justify-content-center'>
    <h1 class='text-white text-center m-2'>{$product->name}</h1>
    <img class='m-auto' style='max-height: 400px;' src='{$product->image}' alt='image' /></div>";
}
echo yii\bootstrap5\Carousel::widget(['items'=>$items]);*/
?>

</div>
