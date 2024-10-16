<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\helpers\Html;

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
<html lang="<?= Yii::$app->language ?>" class="h-full">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="flex h-screen bg-gray-100">
<?php $this->beginBody() ?>

<!-- Sidebar -->
<aside class="w-64 bg-gray-900 text-white shadow-md">
    <div class="flex items-center justify-center h-16 bg-gray-800">
        <a href="<?= Yii::$app->homeUrl ?>" class="text-xl font-bold tracking-wide uppercase"><?= Html::encode(Yii::$app->name) ?></a>
    </div>
    <nav class="mt-6">
        <ul>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['/site/index']) ?>" class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 110-12 6 6 0 010 12z"/></svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['/site/bookings']) ?>" class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M7 4a1 1 0 00-1 1v1H5a2 2 0 00-2 2v9a1 1 0 001 1h12a1 1 0 001-1v-9a2 2 0 00-2-2h-1V5a1 1 0 00-1-1H7z"/></svg>
                    Bookings
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['/site/rooms']) ?>" class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5z"/></svg>
                    Rooms
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['/site/customers']) ?>" class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10 12a4 4 0 100-8 4 4 0 000 8zm0 2c-5 0-6 3-6 4v2h12v-2c0-1-1-4-6-4z"/></svg>
                    Customers
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['/site/reports']) ?>" class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M3 3v14h14V3H3zM15 17H5V5h10v12z"/></svg>
                    Reports
                </a>
            </li>
            <li>
                <a href="<?= Yii::$app->urlManager->createUrl(['/site/settings']) ?>" class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M4 10a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1z"/></svg>
                    Settings
                </a>
            </li>
            <?php if (Yii::$app->user->isGuest): ?>
                <li>
                    <a href="<?= Yii::$app->urlManager->createUrl(['/site/login']) ?>" class="flex items-center py-3 px-4 text-gray-300 hover:bg-gray-700 transition duration-200">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10 3a7 7 0 100 14 7 7 0 000-14zM2 10a8 8 0 1116 0A8 8 0 012 10z"/></svg>
                        Login
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <form action="<?= Yii::$app->urlManager->createUrl(['/site/logout']) ?>" method="post" class="inline">
                        <button type="submit" class="flex items-center w-full py-3 px-4 text-gray-300 hover:bg-gray-700 transition duration-200">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10 3a7 7 0 100 14 7 7 0 000-14zM2 10a8 8 0 1116 0A8 8 0 012 10z"/></svg>
                            Logout (<?= Html::encode(Yii::$app->user->identity->username) ?>)
                        </button>
                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</aside>

<!-- Main Content -->
<main class="flex-grow p-6 overflow-y-auto">
    <div class="container mx-auto">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-200">Add Booking</button>
            </div>

            <div>
                <?php if (!empty($this->params['breadcrumbs'])): ?>
                    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                <?php endif ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <!-- Example Cards Section -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded-lg p-4 transition-transform transform hover:scale-105">
                <h3 class="text-lg font-semibold text-gray-800">Total Bookings</h3>
                <p class="text-2xl font-bold text-blue-600">120</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 transition-transform transform hover:scale-105">
                <h3 class="text-lg font-semibold text-gray-800">Total Rooms</h3>
                <p class="text-2xl font-bold text-blue-600">50</p>
            </div>
            <div class="bg-white shadow-md rounded-lg p-4 transition-transform transform hover:scale-105">
                <h3 class="text-lg font-semibold text-gray-800">New Customers</h3>
                <p class="text-2xl font-bold text-blue-600">15</p>
            </div>
        </div>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
