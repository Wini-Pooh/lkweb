<?php
// Конфигурация сайта

define('SITE_NAME', 'asdsad');
define('SITE_DOMAIN', '');
define('SITE_CREATED', '2025-08-29 20:18:49');
define('TEMPLATE_NAME', 'Классический черно-белый');

// Блоки сайта
$site_blocks = [
    [
        'id' => 1,
        'name' => 'Простая навигация',
        'type' => 'navigation',
        'category' => 'Навигация',
        'file' => 'includes/block_1_prostaia-navigaciia.php'
    ],
    [
        'id' => 6,
        'name' => 'Минималистичный герой',
        'type' => 'hero',
        'category' => 'Главные секции',
        'file' => 'includes/block_6_minimalisticnyi-geroi.php'
    ],
    [
        'id' => 11,
        'name' => 'О компании - классический',
        'type' => 'about',
        'category' => 'О компании',
        'file' => 'includes/block_11_o-kompanii-klassiceskii.php'
    ],
];
