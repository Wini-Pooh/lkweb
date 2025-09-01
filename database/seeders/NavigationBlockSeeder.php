<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class NavigationBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Простая навигация',
                'type' => 'navigation',
                'category' => 'Навигация',
                'description' => 'Простая черно-белая навигация',
                'html_content' => '
<nav class="navbar navbar-expand-lg navbar-light bg-white simple-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fas fa-cube me-2"></i>Компания
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</nav>',
                'css_content' => '
.simple-navbar {
    border-bottom: 2px solid #000;
    background-color: #fff !important; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.simple-navbar .navbar-brand {
    color: #000 !important;
    font-size: 1.5rem;
    font-weight: bold;
}

.simple-navbar .nav-link {
    color: #000 !important;
    font-weight: 500;
    padding: 0.75rem 1rem;
}

.simple-navbar .nav-link:hover {
    color: #666 !important;
    border-bottom: 2px solid #000;
}

.simple-navbar .navbar-toggler {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 8px 12px;
}

.simple-navbar .navbar-toggler:focus {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}',
                'js_content' => '',
                'sort_order' => 1,
                'is_active' => true,
            ],

            [
                'name' => 'Темная навигация',
                'type' => 'navigation',
                'category' => 'Навигация',
                'description' => 'Темная навигация с белым текстом',
                'html_content' => '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark dark-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fas fa-rocket me-2"></i>Бренд
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav2">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio">Портфолио</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Блог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</nav>',
                'css_content' => '
.dark-navbar {
    background-color: #000 !important;
    border-bottom: 2px solid #fff;
}

.dark-navbar .navbar-brand {
    color: #fff !important;
    font-size: 1.5rem;
    font-weight: bold;
}

.dark-navbar .nav-link {
    color: #fff !important;
    font-weight: 500;
    padding: 0.75rem 1rem;
}

.dark-navbar .nav-link:hover {
    color: #ccc !important;
    border-bottom: 2px solid #fff;
}

.dark-navbar .navbar-toggler {
    border: 2px solid #fff;
}

.dark-navbar .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 30 30\'%3e%3cpath stroke=\'rgba%28255, 255, 255, 1%29\' stroke-linecap=\'round\' stroke-miterlimit=\'10\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/%3e%3c/svg%3e");
}',
                'js_content' => '',
                'sort_order' => 2,
                'is_active' => true,
            ],

            [
                'name' => 'Навигация с кнопкой',
                'type' => 'navigation',
                'category' => 'Навигация',
                'description' => 'Навигация с кнопкой призыва к действию',
                'html_content' => '
<nav class="navbar navbar-expand-lg navbar-light bg-white cta-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fas fa-star me-2"></i>Студия
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav3">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav3">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio">Работы</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="#contact" class="btn btn-dark me-2">Связаться</a>
                <a href="#quote" class="btn btn-outline-dark">Заказать</a>
            </div>
        </div>
    </div>
</nav>',
                'css_content' => '
.cta-navbar {
    background-color: #fff !important; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid #000;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.cta-navbar .navbar-brand {
    color: #000 !important;
    font-size: 1.5rem;
    font-weight: bold;
}

.cta-navbar .nav-link {
    color: #000 !important;
    font-weight: 500;
    padding: 0.75rem 1rem;
}

.cta-navbar .nav-link:hover {
    color: #666 !important;
}

.cta-navbar .btn-dark {
    background-color: #000;
    border-color: #dee2e6;
    color: #fff;
    padding: 8px 20px;
    font-weight: 500;
}

.cta-navbar .btn-dark:hover {
    background-color: #333;
    border-color: #333;
}

.cta-navbar .btn-outline-dark {
    color: #000;
    border-color: #dee2e6;
    padding: 8px 20px;
    font-weight: 500;
}

.cta-navbar .btn-outline-dark:hover {
    background-color: #000;
    border-color: #dee2e6;
    color: #fff;
}',
                'js_content' => '',
                'sort_order' => 3,
                'is_active' => true,
            ],

            [
                'name' => 'Центрированная навигация',
                'type' => 'navigation',
                'category' => 'Навигация',
                'description' => 'Навигация с центрированным меню',
                'html_content' => '
<nav class="navbar navbar-expand-lg navbar-light bg-white centered-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="fas fa-building me-2"></i>Агентство
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav4">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav4">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">О компании</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#team">Команда</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</nav>',
                'css_content' => '
.centered-navbar {
    background-color: #fff !important; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid #ddd;
    padding: 1rem 0;
}

.centered-navbar .navbar-brand {
    color: #000 !important;
    font-size: 1.75rem;
    font-weight: bold;
}

.centered-navbar .nav-link {
    color: #000 !important;
    font-weight: 500;
    padding: 0.75rem 1.5rem;
    text-transform: uppercase;
    font-size: 0.9rem;
    letter-spacing: 1px;
}

.centered-navbar .nav-link:hover {
    color: #666 !important;
    text-decoration: underline;
}

.centered-navbar .navbar-toggler {
    border: 1px solid #000;
}',
                'js_content' => '',
                'sort_order' => 4,
                'is_active' => true,
            ]
        ];

        foreach ($blocks as $block) {
            Block::create($block);
        }
    }
}
