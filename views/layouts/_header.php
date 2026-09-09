<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;

$items = [
    [
        'label' => 'Home',
        'url' => ['/site/index'],
    ],
    [
        'label' => 'Tags',
        'items' => [
            ['label' => 'All Tags', 'url' => ['/tag/index']],
            ['label' => 'Create Tag', 'url' => ['/tag/create']],
        ],
    ],
    [
        'label' => 'Types',
        'items' => [
            ['label' => 'All Types', 'url' => ['/type/index']],
            ['label' => 'Create Type', 'url' => ['/type/create']],
        ],
    ],
    [
        'label' => 'Memos',
        'items' => [
            ['label' => 'All Memos', 'url' => ['/memo/index']],
            ['label' => 'Create Memo', 'url' => ['/memo/create']],
        ],
    ],
    
    /* [
        'label' => 'About',
        'url' => ['/site/about'],
    ],
    [
        'label' => 'Contact',
        'url' => ['/site/contact'],
    ],
    [
        'label' => 'Login',
        'url' => ['/site/login'],
        'visible' => Yii::$app->user->isGuest,
    ],
    [
        'label' => 'Logout (' . Html::encode(Yii::$app->user->identity?->username ?? '') . ')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post',
            'class' => 'nav-link logout',
        ],
        'visible' => !Yii::$app->user->isGuest,
    ], */
];

?>
<?= Html::style("
    .custom-navbar {
        background-color: #f5f5dc !important;
        min-height: 82px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }
    .custom-navbar .navbar-brand,
    .custom-navbar .nav-link {
        color: #2d2200 !important;
    }
    .custom-navbar .navbar-brand {
        font-size: 1.5rem;
        padding-top: 0.9rem;
        padding-bottom: 0.9rem;
    }
    .custom-navbar .navbar-nav .nav-link {
        padding-top: 1.1rem;
        padding-bottom: 1.1rem;
        font-size: 1.05rem;
    }
    body {
        padding-top: 96px;
    }
"); ?>
<header id="header">
    <?php NavBar::begin(
        [
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-light custom-navbar fixed-top']
        ],
    ) ?>
    <?= Nav::widget(
        [
            'options' => ['class' => 'navbar-nav me-auto'],
            'encodeLabels' => false,
            'items' => $items,
        ],
    ) ?>
    <?= Html::button(
        '&#127769;',
        [
            'id' => 'theme-toggle',
            'class' => 'btn btn-link nav-link fs-5',
            'aria-label' => 'Switch to dark mode',
        ],
    ) ?>
    <?php NavBar::end() ?>
</header>
