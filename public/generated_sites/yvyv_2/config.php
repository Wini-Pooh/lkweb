<?php
// Конфигурация сайта

define('SITE_NAME', 'ывыв');
define('SITE_DOMAIN', '');
define('SITE_CREATED', '2025-08-29 20:42:58');
define('TEMPLATE_NAME', 'Минималистичный серый');

// Блоки сайта
$site_blocks = [
    [
        'id' => 2,
        'name' => 'Темная навигация',
        'type' => 'navigation',
        'category' => 'Навигация',
        'file' => 'includes/block_2_temnaia-navigaciia.php'
    ],
    [
        'id' => 7,
        'name' => 'Разделенный герой',
        'type' => 'hero',
        'category' => 'Главные секции',
        'file' => 'includes/block_7_razdelennyi-geroi.php'
    ],
    [
        'id' => 12,
        'name' => 'О компании с командой',
        'type' => 'about',
        'category' => 'О компании',
        'file' => 'includes/block_12_o-kompanii-s-komandoi.php'
    ],
    [
        'id' => 20,
        'name' => 'Многоуровневый подвал',
        'type' => 'footer',
        'category' => 'Подвал',
        'file' => 'includes/block_20_mnogourovnevyi-podval.php'
    ],
];
