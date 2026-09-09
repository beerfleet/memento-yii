<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'My Yii Application';
$this->params['meta_description'] = 'A high-performance PHP framework best for developing web applications. Fast, secure, and professional.';
$this->params['meta_keywords'] = 'yii, yii2, php, framework, web application, high-performance';

// Define the features based on the routes available in config/web.php
$features = [
    [
        'icon' => '🏷️',
        'title' => 'Tags',
        'description' => 'Manage and organize your content with custom tags. Create, manage, and browse through all available tags.',
        'link' => './tag/index',
    ],
    [
        'icon' => '📝',
        'title' => 'Memos',
        'description' => 'Create and manage your notes and memos with a clean interface.',
        'link' => './memo/index',
    ],
    [
        'icon' => '📂',
        'title' => 'Types',
        'description' => 'Define and manage the various types of content available in the system.',
        'link' => './type/index',
    ],
    [
        'icon' => '➕',
        'title' => 'New Tag',
        'description' => 'Quickly add a new tag to your collection and start organizing your content.',
        'link' => './tag/create',
    ],
    [
        'icon' => '➕',
        'title' => 'New Type',
        'description' => 'Create a new content type to categorize your data effectively.',
        'link' => './type/create',
    ],
    [
        'icon' => '➕',
        'title' => 'New Memo',
        'description' => 'Start a new memo or note instantly to capture your thoughts.',
        'link' => './memo/create',
    ],
];

?>
<div class="site-index">
    <!-- ... existing hero_banner code ... -->
    <div class="hero-banner text-white rounded-4 p-5 mb-4 position-relative overflow-hidden">
        <!-- ... existing banner content ... -->
    </div>

    <!-- Features grid -->
    <div class="row g-3">
        <?php foreach ($features as $feature): ?>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-3 extension-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="extension-icon" aria-hidden="true"><?= $feature['icon'] ?></span>
                            <h3 class="h6 fw-bold mb-0 ms-2"><?= $feature['title'] ?></h3>
                        </div>
                        <p class="text-body-secondary small mb-0">
                            <?= $feature['description'] ?>
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pt-0">
                        <a href="<?= Yii::$app->homeUrl . $feature['link'] ?>" class="stretched-link" rel="noopener">
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>