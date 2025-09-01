<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class WebDevelopmentServiceSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Веб-разработка услуги',
                'type' => 'services',
                'category' => 'Услуги',
                'description' => 'Блок с услугами веб-разработки',
                'html_content' => '
<section class="web-dev-services py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Услуги веб-разработки</h2>
            <p class="lead text-muted">Создаем современные веб-решения для вашего бизнеса</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-card bg-white p-4 h-100 text-center">
                    <div class="service-icon mb-3">
                        <i class="fas fa-laptop-code" style="font-size: 60px; color: #000;"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Корпоративные сайты</h5>
                    <p class="text-muted mb-4">Профессиональные сайты для бизнеса с современным дизайном и функциональностью</p>
                    <div class="price-tag">
                        <span class="h5 fw-bold">от 50 000 ₽</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-card bg-white p-4 h-100 text-center">
                    <div class="service-icon mb-3">
                        <i class="fas fa-shopping-cart" style="font-size: 60px; color: #000;"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Интернет-магазины</h5>
                    <p class="text-muted mb-4">Полнофункциональные интернет-магазины с системой управления товарами</p>
                    <div class="price-tag">
                        <span class="h5 fw-bold">от 80 000 ₽</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="service-card bg-white p-4 h-100 text-center">
                    <div class="service-icon mb-3">
                        <i class="fas fa-cogs" style="font-size: 60px; color: #000;"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Веб-приложения</h5>
                    <p class="text-muted mb-4">Сложные веб-приложения и системы управления под ваши задачи</p>
                    <div class="price-tag">
                        <span class="h5 fw-bold">от 120 000 ₽</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.web-dev-services {
    background-color: #f8f8f8 !important;
}

.web-dev-services h2 {
    color: #000;
    font-weight: bold;
}

.web-dev-services .lead {
    color: #666;
}

.web-dev-services .service-card {
    background-color: #fff !important;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    padding: 2rem;
}

.web-dev-services .service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

.web-dev-services .service-icon {
    padding: 1rem;
}

.web-dev-services .service-card h5 {
    color: #000;
    font-weight: bold;
}

.web-dev-services .service-card .text-muted {
    color: #666 !important;
    line-height: 1.6;
}

.web-dev-services .price-tag {
    border-top: 2px solid #000;
    padding-top: 15px;
    margin-top: 15px;
}

.web-dev-services .price-tag .h5 {
    color: #000;
    font-weight: bold;
}',
                'js_content' => '',
                'sort_order' => 1,
                'is_active' => true,
            ],

            [
                'name' => 'Процесс веб-разработки',
                'type' => 'process',
                'category' => 'Услуги',
                'description' => 'Этапы процесса веб-разработки',
                'html_content' => '
<section class="web-dev-process py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Как мы работаем</h2>
            <p class="lead text-muted">Наш проверенный процесс разработки</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="process-step text-center">
                    <div class="step-number bg-dark text-white mb-3">1</div>
                    <h5 class="fw-bold mb-3">Анализ</h5>
                    <p class="text-muted">Изучаем ваши потребности и цели проекта</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="process-step text-center">
                    <div class="step-number bg-dark text-white mb-3">2</div>
                    <h5 class="fw-bold mb-3">Дизайн</h5>
                    <p class="text-muted">Создаем уникальный дизайн и прототип</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="process-step text-center">
                    <div class="step-number bg-dark text-white mb-3">3</div>
                    <h5 class="fw-bold mb-3">Разработка</h5>
                    <p class="text-muted">Программируем функциональность и интеграции</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="process-step text-center">
                    <div class="step-number bg-dark text-white mb-3">4</div>
                    <h5 class="fw-bold mb-3">Запуск</h5>
                    <p class="text-muted">Тестируем, запускаем и обучаем</p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="process-benefits bg-light p-4">
                    <h4 class="fw-bold mb-3">Преимущества нашего подхода</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check me-3"></i>Фиксированные сроки</li>
                        <li class="mb-2"><i class="fas fa-check me-3"></i>Прозрачное ценообразование</li>
                        <li class="mb-2"><i class="fas fa-check me-3"></i>Постоянная связь с клиентом</li>
                        <li class="mb-2"><i class="fas fa-check me-3"></i>Гарантия на все работы</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-light p-4">
                    <h4 class="fw-bold mb-3">Технологии</h4>
                    <div class="row">
                        <div class="col-6">
                            <p class="mb-1"><strong>Frontend:</strong></p>
                            <p class="text-muted small">HTML, CSS, JavaScript, React, Vue.js</p>
                        </div>
                        <div class="col-6">
                            <p class="mb-1"><strong>Backend:</strong></p>
                            <p class="text-muted small">PHP, Laravel, Node.js, Python</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.web-dev-process {
    background-color: #fff;
}

.web-dev-process h2 {
    color: #000;
    font-weight: bold;
}

.web-dev-process .lead {
    color: #666;
}

.web-dev-process .process-step {
    position: relative;
}

.web-dev-process .step-number {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: bold;
    margin: 0 auto;
    background-color: #000 !important;
    color: #fff !important;
}

.web-dev-process .process-step h5 {
    color: #000;
    font-weight: bold;
}

.web-dev-process .process-step .text-muted {
    color: #666 !important;
}

.web-dev-process .process-benefits {
    background-color: #f8f8f8 !important;
    border: 2px solid #000;
}

.web-dev-process .process-benefits h4 {
    color: #000;
    font-weight: bold;
}

.web-dev-process .process-benefits .fas.fa-check {
    color: #000;
}

.web-dev-process .process-benefits li {
    color: #333;
}',
                'js_content' => '',
                'sort_order' => 2,
                'is_active' => true,
            ]
        ];

        foreach ($blocks as $block) {
            Block::create($block);
        }
    }
}
