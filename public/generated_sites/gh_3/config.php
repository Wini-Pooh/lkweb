<?php
// Конфигурация сайта

define('SITE_NAME', 'gh');
define('SITE_DOMAIN', '');
define('SITE_CREATED', '2025-08-31 12:58:27');
define('TEMPLATE_NAME', 'Классический черно-белый');

// Блоки сайта
$site_blocks = [
    [
        'id' => 34,
        'name' => 'Темная навигация',
        'type' => 'navigation',
        'category' => 'Навигация',
        'file' => 'includes/block_34_temnaia-navigaciia.php'
    ],
    [
        'id' => 45,
        'name' => 'История компании',
        'type' => 'about',
        'category' => 'О компании',
        'file' => 'includes/block_45_istoriia-kompanii.php'
    ],
    [
        'id' => 98,
        'name' => 'Отзывы-слайдер',
        'type' => 'testimonials',
        'category' => 'Отзывы',
        'file' => 'includes/block_98_otzyvy-slaider.php'
    ],
    [
        'id' => 105,
        'name' => 'FAQ с рейтингом',
        'type' => 'faq',
        'category' => 'FAQ',
        'file' => 'includes/block_105_faq-s-reitingom.php'
    ],
    [
        'id' => 108,
        'name' => 'Прайс-таблица',
        'type' => 'pricing',
        'category' => 'Прайс',
        'file' => 'includes/block_108_prais-tablica.php'
    ],
    [
        'id' => 90,
        'name' => 'Многоуровневый подвал',
        'type' => 'footer',
        'category' => 'Подвал',
        'file' => 'includes/block_90_mnogourovnevyi-podval.php'
    ],
];
