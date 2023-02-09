<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
        if (Yii::$app->user->isGuest) {
        $items = [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'О нас', 'url' =>['/site/about']],
            ['label' => 'Где нас найти', 'url' =>['/site/contact']],
            ['label' => 'Регистрация', 'url' => ['/user/create']],
            ['label' => 'Вход', 'url' => ['/site/login']],
        ];}
            else {Yii::$app->user->identity->admin==1
                ? 
                ($items = [
                    ['label' => 'Главная', 'url' => ['/site/index']],
                    ['label' => 'Ппанель администратора', 'url' => ['/admin/index']],
                    ['label' => 'Профиль', 'url' => ['/user/view?id='.Yii::$app->user->identity->id]],
                    ])
                    :
                    ($items=[
                        ['label' => 'Главная', 'url' => ['/site/index']],
                        ['label' => 'О нас', 'url' =>['/site/about']],
                        ['label' => 'Где нас найти', 'url' =>['/site/contact']],
                        ['label' => 'Профиль', 'url' => ['/user/view?id='.Yii::$app->user->identity->id]],
                    ]);
                    array_push($items, '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->login . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>');
                    }
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-warning fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $items
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-warning">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start text-light">&copy; Music Home <?= date('Y') ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
