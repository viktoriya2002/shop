<?php $products=$dataProvider->getModels();
use app\models\Product;
echo "<div class='d-flex flex-row flex-wrap justify-content-start border border-3 border-secondary align-items-end'>";
    foreach ($products as $product){
   
    echo "<div class='card m-auto' style='width: 30%; min-width: 300px;'>
        <a href='/product/view?id={$product->id}'><img src='{$product->image}' class='card-img' style='max-height: 200px;' alt='image'></a>
        <div class='card-body'>
            <h5 class='card-title'>{$product->name}</h5>
            <p class='text-danger'>{$product->price} руб</p>";
            echo (Yii::$app->user->isGuest ? "<a href='/product/view?id={$product->id}' 
class='btn btn-primary'>Просмотр товара</a>": "<p onclick='add_product({$product->id}, 1)' class='btn btn-primary'>Добавить в корзину</p>");
            echo "</div></div>";
    }
    echo "</div>";
?>

<?php $product=Product::find()->orderBy(['time'=>SORT_DESC])->limit(5)->all();
$items=[];

foreach ($products as $product){
    $items[]="<div class='bg-warning m-2 p-2 d-flex flex-column justify-content-center'>
    <h1 class='text-primary text-center m-2'>{$product->name}</h1>
    <img class='m-auto w-50' src='{$product->image}' alt='image'/></div>";
}
echo yii\bootstrap5\Carousel::widget(['items'=>$items]);
?>
