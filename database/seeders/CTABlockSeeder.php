<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class CTABlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Классический призыв к действию',
                'type' => 'cta',
                'category' => 'Призыв к действию',
                'description' => 'Простой призыв к действию',
                'html_content' => '
<section class="cta-classic bg-dark text-white py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4">Готовы начать проект?</h2>
                <p class="lead mb-4">Получите бесплатную консультацию и узнайте, как мы можем помочь вашему бизнесу</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="#contact" class="btn btn-light btn-lg">Связаться с нами</a>
                    <a href="#portfolio" class="btn btn-outline-light btn-lg">Посмотреть работы</a>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.cta-classic {
    background-color: #000 !important;
    color: #fff !important;
}

.cta-classic h2 {
    color: #fff;
    font-weight: bold;
}

.cta-classic .lead {
    color: #ccc;
}

.cta-classic .btn-light {
    background-color: #fff;
    border-color: #fff;
    color: #000;
    font-weight: 600;
    padding: 12px 30px;
    border: 2px solid #fff;
}

.cta-classic .btn-light:hover {
    background-color: transparent;
    color: #fff;
    border-color: #fff;
}

.cta-classic .btn-outline-light {
    color: #fff;
    border-color: #fff;
    font-weight: 600;
    padding: 12px 30px;
    border: 2px solid #fff;
}

.cta-classic .btn-outline-light:hover {
    background-color: #fff;
    color: #000;
    border-color: #fff;
}',
                'js_content' => '',
                'sort_order' => 1,
                'is_active' => true,
            ],

            [
                'name' => 'CTA с формой',
                'type' => 'cta',
                'category' => 'Призыв к действию',
                'description' => 'Призыв к действию с формой обратной связи',
                'html_content' => '
<section class="cta-form bg-light text-dark py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2 class="fw-bold mb-4">Получите персональное предложение</h2>
                <p class="lead mb-4">Заполните форму, и мы подготовим индивидуальное коммерческое предложение специально для вас</p>
                <ul class="list-unstyled">
                    <li class="cta-feature mb-2">
                        <i class="fas fa-check me-3"></i>Бесплатная консультация
                    </li>
                    <li class="cta-feature mb-2">
                        <i class="fas fa-check me-3"></i>Детальный план проекта
                    </li>
                    <li class="cta-feature mb-2">
                        <i class="fas fa-check me-3"></i>Фиксированная стоимость
                    </li>
                    <li class="cta-feature mb-2">
                        <i class="fas fa-check me-3"></i>Гарантия результата
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="cta-form-container bg-white p-4 border">
                    <h4 class="fw-bold mb-4">Получить предложение</h4>
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
                            <select class="form-select">
                                <option>Тип проекта</option>
                                <option>Корпоративный сайт</option>
                                <option>Интернет-магазин</option>
                                <option>Веб-приложение</option>
                                <option>Мобильное приложение</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" rows="3" placeholder="Краткое описание проекта"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Получить предложение</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.cta-form {
    background-color: #f8f8f8 !important;
    color: #000 !important;
}

.cta-form h2 {
    color: #000;
    font-weight: bold;
}

.cta-form .lead {
    color: #666;
}

.cta-form .cta-form-container {
    background-color: #fff !important; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #e9ecef !important;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    padding: 2rem; border-radius: 12px;
}

.cta-form .cta-form-container h4 {
    color: #000;
    font-weight: bold;
}

.cta-form .cta-form-container .form-control,
.cta-form .cta-form-container .form-select {
    border: 1px solid #e9ecef;
    border-radius: 0;
    padding: 12px 15px;
    color: #000;
}

.cta-form .cta-form-container .form-control:focus,
.cta-form .cta-form-container .form-select:focus {
    border-color: #dee2e6;
    box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.25);
}

.cta-form .cta-feature {
    color: #333;
    font-weight: 500;
}

.cta-form .cta-feature i {
    color: #000;
}

.cta-form .btn-dark {
    background-color: #000;
    border-color: #dee2e6;
    color: #fff;
    padding: 12px;
    font-weight: 600;
}

.cta-form .btn-dark:hover {
    background-color: #333;
}',
                'js_content' => '',
                'sort_order' => 2,
                'is_active' => true,
            ],

            [
                'name' => 'CTA со статистикой',
                'type' => 'cta',
                'category' => 'Призыв к действию',
                'description' => 'Призыв к действию с отображением статистики',
                'html_content' => '
<section class="cta-stats bg-white py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-4">Присоединяйтесь к нашим клиентам</h2>
            <p class="lead text-muted mb-5">Более 200 компаний уже доверили нам свои проекты</p>
            <div class="row">
                <div class="col-md-3 text-center mb-4">
                    <div class="stat-number fw-bold">200+</div>
                    <div class="stat-label">Проектов</div>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="stat-number fw-bold">50+</div>
                    <div class="stat-label">Клиентов</div>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="stat-number fw-bold">5+</div>
                    <div class="stat-label">Лет опыта</div>
                </div>
                <div class="col-md-3 text-center mb-4">
                    <div class="stat-number fw-bold">100%</div>
                    <div class="stat-label">Качество</div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-lg-6">
                    <a href="#contact" class="btn btn-dark btn-lg me-3">Обсудить проект</a>
                    <a href="#portfolio" class="btn btn-outline-dark btn-lg">Посмотреть работы</a>
                </div>
            </div>
        </div>
        <div class="client-logos mt-5">
            <div class="row justify-content-center">
                <div class="col-md-2 col-6 text-center mb-3">
                    <div class="client-logo">
                        <i class="fas fa-building" style="font-size: 40px; color: #666;"></i>
                    </div>
                </div>
                <div class="col-md-2 col-6 text-center mb-3">
                    <div class="client-logo">
                        <i class="fas fa-industry" style="font-size: 40px; color: #666;"></i>
                    </div>
                </div>
                <div class="col-md-2 col-6 text-center mb-3">
                    <div class="client-logo">
                        <i class="fas fa-store" style="font-size: 40px; color: #666;"></i>
                    </div>
                </div>
                <div class="col-md-2 col-6 text-center mb-3">
                    <div class="client-logo">
                        <i class="fas fa-hospital" style="font-size: 40px; color: #666;"></i>
                    </div>
                </div>
                <div class="col-md-2 col-6 text-center mb-3">
                    <div class="client-logo">
                        <i class="fas fa-university" style="font-size: 40px; color: #666;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.cta-stats {
    background-color: #fff !important; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-top: 2px solid #000;
    border-bottom: 2px solid #000;
}

.cta-stats h2 {
    color: #000;
    font-weight: bold;
}

.cta-stats .lead {
    color: #666;
}

.cta-stats .stat-number {
    font-size: 3rem;
    color: #000;
    font-weight: bold;
}

.cta-stats .stat-label {
    color: #666;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.cta-stats .btn-dark {
    background-color: #000;
    border-color: #dee2e6;
    color: #fff;
    padding: 12px 30px;
    font-weight: 600;
}

.cta-stats .btn-dark:hover {
    background-color: #333;
}

.cta-stats .btn-outline-dark {
    color: #000;
    border-color: #dee2e6;
    padding: 12px 30px;
    font-weight: 600;
}

.cta-stats .btn-outline-dark:hover {
    background-color: #000;
    color: #fff;
}

.cta-stats .client-logo {
    padding: 20px;
    transition: all 0.3s ease;
    opacity: 0.7;
}

.cta-stats .client-logo:hover {
    transform: translateY(-5px);
    opacity: 1;
}',
                'js_content' => '',
                'sort_order' => 3,
                'is_active' => true,
            ]
        ];

        foreach ($blocks as $block) {
            Block::create($block);
        }
    }
}
