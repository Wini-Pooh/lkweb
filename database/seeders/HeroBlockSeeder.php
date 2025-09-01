<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class HeroBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Классический герой',
                'type' => 'hero',
                'category' => 'Главные секции',
                'description' => 'Классическая героическая секция',
                'html_content' => '
<section class="hero-section bg-dark text-white py-5 classic-hero">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Создаем цифровые решения для вашего бизнеса</h1>
                <p class="lead mb-4">Мы специализируемся на разработке современных веб-сайтов и приложений, которые помогают компаниям достигать своих целей.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#services" class="btn btn-light btn-lg">Наши услуги</a>
                    <a href="#portfolio" class="btn btn-outline-light btn-lg">Портфолио</a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="hero-image-placeholder">
                    <i class="fas fa-laptop-code" style="font-size: 200px; color: #666;"></i>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.classic-hero {
    background-color: #000 !important;
    color: #fff !important;
    min-height: 75vh;
    display: flex;
    align-items: center;
}

.classic-hero h1 {
    color: #fff;
    font-weight: bold;
}

.classic-hero .lead {
    color: #ccc;
    font-size: 1.25rem;
}

.classic-hero .btn-light {
    background-color: #fff;
    border-color: #fff;
    color: #000;
    font-weight: 600;
    padding: 12px 30px;
    border: 2px solid #fff;
}

.classic-hero .btn-light:hover {
    background-color: transparent;
    color: #fff;
    border-color: #fff;
}

.classic-hero .btn-outline-light {
    color: #fff;
    border-color: #fff;
    font-weight: 600;
    padding: 12px 30px;
    border: 2px solid #fff;
}

.classic-hero .btn-outline-light:hover {
    background-color: #fff;
    color: #000;
    border-color: #fff;
}

.hero-image-placeholder {
    padding: 2rem; border-radius: 12px;
}',
                'js_content' => '',
                'sort_order' => 1,
                'is_active' => true,
            ],

            [
                'name' => 'Минималистичный герой',
                'type' => 'hero',
                'category' => 'Главные секции',
                'description' => 'Простой минималистичный дизайн',
                'html_content' => '
<section class="minimal-hero-section bg-white text-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="minimal-content">
                    <h1 class="display-3 fw-bold mb-4">Простота. Качество. Результат.</h1>
                    <p class="lead text-muted mb-5">Мы создаем элегантные решения для сложных задач. Наш подход основан на простоте и функциональности.</p>
                    <a href="#contact" class="btn btn-dark btn-lg px-5 py-3">Начать проект</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <div class="stat-item">
                    <h3 class="fw-bold">50+</h3>
                    <p class="text-muted">Проектов</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="stat-item">
                    <h3 class="fw-bold">5</h3>
                    <p class="text-muted">Лет опыта</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="stat-item">
                    <h3 class="fw-bold">100%</h3>
                    <p class="text-muted">Качество</p>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.minimal-hero-section {
    background-color: #fff !important; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    color: #000 !important;
    min-height: 80vh;
    display: flex;
    align-items: center;
}

.minimal-content h1 {
    color: #000;
    font-weight: bold;
    letter-spacing: -2px;
}

.minimal-hero-section .lead {
    color: #666;
    font-size: 1.25rem;
}

.minimal-hero-section .btn-dark {
    background-color: #000;
    border-color: #dee2e6;
    color: #fff;
    font-weight: 600;
    border: 1px solid #e9ecef;
}

.minimal-hero-section .btn-dark:hover {
    background-color: #fff;
    color: #000;
    border-color: #dee2e6;
}

.stat-item {
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 2rem 1rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.stat-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

.stat-item h3 {
    color: #000;
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}

.stat-item p {
    color: #666;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}',
                'js_content' => '',
                'sort_order' => 2,
                'is_active' => true,
            ],

            [
                'name' => 'Разделенный герой',
                'type' => 'hero',
                'category' => 'Главные секции',
                'description' => 'Герой с разделенным контентом',
                'html_content' => '
<section class="split-hero-section">
    <div class="container-fluid p-0">
        <div class="row g-0 min-vh-100">
            <div class="col-lg-6 bg-white d-flex align-items-center">
                <div class="p-5">
                    <h1 class="display-4 fw-bold mb-4">Инновации в каждом проекте</h1>
                    <p class="lead mb-4">Мы объединяем креативность и технологии для создания уникальных цифровых продуктов.</p>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="fas fa-check me-3"></i>Современный дизайн</li>
                        <li class="mb-2"><i class="fas fa-check me-3"></i>Быстрая разработка</li>
                        <li class="mb-2"><i class="fas fa-check me-3"></i>Техническая поддержка</li>
                    </ul>
                    <div class="d-flex gap-3">
                        <a href="#contact" class="btn btn-dark">Обсудить проект</a>
                        <a href="#portfolio" class="btn btn-outline-dark">Смотреть работы</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 bg-dark d-flex align-items-center justify-content-center">
                <div class="text-center text-white">
                    <i class="fas fa-code" style="font-size: 150px; color: #666;"></i>
                    <h3 class="mt-4">Код - это искусство</h3>
                    <p class="lead">Мы создаем красивый и функциональный код</p>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.split-hero-section {
    min-height: 100vh;
}

.split-hero-section h1 {
    color: #000;
    font-weight: bold;
}

.split-hero-section .lead {
    color: #666;
    font-size: 1.25rem;
}

.split-hero-section .list-unstyled li {
    color: #333;
    font-size: 1.1rem;
}

.split-hero-section .fas.fa-check {
    color: #000;
}

.split-hero-section .btn-dark {
    background-color: #000;
    border-color: #dee2e6;
    color: #fff;
    padding: 12px 30px;
    font-weight: 600;
}

.split-hero-section .btn-dark:hover {
    background-color: #333;
}

.split-hero-section .btn-outline-dark {
    color: #000;
    border-color: #dee2e6;
    padding: 12px 30px;
    font-weight: 600;
}

.split-hero-section .btn-outline-dark:hover {
    background-color: #000;
    color: #fff;
}',
                'js_content' => '',
                'sort_order' => 3,
                'is_active' => true,
            ],

            [
                'name' => 'Герой с формой',
                'type' => 'hero',
                'category' => 'Главные секции',
                'description' => 'Героическая секция с формой обратной связи',
                'html_content' => '
<section class="hero-form-section bg-light py-5">
    <div class="container">
        <div class="row align-items-center min-vh-75">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Получите бесплатную консультацию</h1>
                <p class="lead mb-4">Расскажите о своем проекте, и мы поможем найти лучшее решение для вашего бизнеса.</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="benefit-item mb-3">
                            <i class="fas fa-clock me-3"></i>
                            <span>Быстрый ответ в течение часа</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="benefit-item mb-3">
                            <i class="fas fa-shield-alt me-3"></i>
                            <span>Конфиденциальность данных</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="benefit-item mb-3">
                            <i class="fas fa-handshake me-3"></i>
                            <span>Персональный менеджер</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="benefit-item mb-3">
                            <i class="fas fa-trophy me-3"></i>
                            <span>Гарантия качества</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-form bg-white p-4 border">
                    <h3 class="mb-4">Оставьте заявку</h3>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Ваше имя" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control" placeholder="Телефон" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Описание проекта"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Отправить заявку</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.hero-form-section {
    background-color: #f8f8f8 !important;
    min-height: 75vh;
    display: flex;
    align-items: center;
}

.hero-form-section h1 {
    color: #000;
    font-weight: bold;
}

.hero-form-section .lead {
    color: #666;
    font-size: 1.25rem;
}

.benefit-item {
    color: #333;
    font-weight: 500;
}

.benefit-item i {
    color: #000;
}

.hero-form {
    background-color: #fff !important; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 2px solid #000 !important;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.hero-form h3 {
    color: #000;
    font-weight: bold;
}

.hero-form .form-control {
    border: 1px solid #e9ecef;
    border-radius: 0;
    padding: 12px 15px;
}

.hero-form .form-control:focus {
    border-color: #dee2e6;
    box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.25);
}

.hero-form .btn-dark {
    background-color: #000;
    border-color: #dee2e6;
    color: #fff;
    padding: 12px;
    font-weight: 600;
}

.hero-form .btn-dark:hover {
    background-color: #333;
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
