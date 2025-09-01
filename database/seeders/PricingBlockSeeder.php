<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class PricingBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Классический прайс',
                'type' => 'pricing',
                'category' => 'Прайс',
                'description' => 'Тарифные планы в виде карточек',
                'html_content' => '
<section class="pricing-classic py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Тарифные планы</h2>
                <p class="lead text-muted">Выберите подходящий пакет для вашего проекта</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Базовый</h4>
                        <p class="pricing-description">Для небольших проектов</p>
                        <div class="pricing-price">
                            <span class="price-amount">30 000</span>
                            <span class="price-currency">₽</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Дизайн 3-5 страниц</li>
                            <li><i class="fas fa-check"></i> Адаптивная верстка</li>
                            <li><i class="fas fa-check"></i> Базовая SEO-оптимизация</li>
                            <li><i class="fas fa-check"></i> Контактная форма</li>
                            <li><i class="fas fa-check"></i> 1 месяц поддержки</li>
                            <li><i class="fas fa-times text-muted"></i> CMS система</li>
                            <li><i class="fas fa-times text-muted"></i> Интеграции</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="btn btn-outline-primary">Выбрать план</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card popular">
                    <div class="popular-badge">Популярный</div>
                    <div class="pricing-header">
                        <h4>Стандартный</h4>
                        <p class="pricing-description">Для большинства компаний</p>
                        <div class="pricing-price">
                            <span class="price-amount">80 000</span>
                            <span class="price-currency">₽</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Дизайн до 10 страниц</li>
                            <li><i class="fas fa-check"></i> Адаптивная верстка</li>
                            <li><i class="fas fa-check"></i> Расширенная SEO-оптимизация</li>
                            <li><i class="fas fa-check"></i> Формы обратной связи</li>
                            <li><i class="fas fa-check"></i> 3 месяца поддержки</li>
                            <li><i class="fas fa-check"></i> CMS WordPress/Laravel</li>
                            <li><i class="fas fa-check"></i> Базовые интеграции</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="btn btn-primary">Выбрать план</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h4>Премиум</h4>
                        <p class="pricing-description">Для крупных проектов</p>
                        <div class="pricing-price">
                            <span class="price-amount">150 000</span>
                            <span class="price-currency">₽</span>
                        </div>
                    </div>
                    <div class="pricing-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Дизайн без ограничений</li>
                            <li><i class="fas fa-check"></i> Адаптивная верстка</li>
                            <li><i class="fas fa-check"></i> Профессиональная SEO</li>
                            <li><i class="fas fa-check"></i> Сложные формы и калькуляторы</li>
                            <li><i class="fas fa-check"></i> 6 месяцев поддержки</li>
                            <li><i class="fas fa-check"></i> Кастомная CMS</li>
                            <li><i class="fas fa-check"></i> Интеграции с любыми API</li>
                        </ul>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="btn btn-outline-primary">Выбрать план</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12 text-center">
                <p class="text-muted">Нужно что-то особенное? <a href="#contact" class="text-primary">Свяжитесь с нами</a> для индивидуального предложения</p>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.pricing-classic {
    background: #fff;
}

.pricing-classic h2 {
    color: #212529;
    font-weight: bold;
}

.pricing-classic .lead {
    color: #6c757d;
}

.pricing-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.pricing-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

.pricing-card.popular {
    border: 3px solid #007bff;
    transform: scale(1.05);
}

.pricing-card.popular:hover {
    transform: scale(1.05) translateY(-10px);
}

.popular-badge {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: #007bff;
    color: white;
    padding: 8px 25px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
}

.pricing-header {
    text-align: center;
    padding: 40px 30px 30px;
    border-bottom: 1px solid #e9ecef;
}

.pricing-header h4 {
    margin-bottom: 10px;
    font-weight: bold;
    color: #212529;
}

.pricing-description {
    color: #6c757d;
    margin-bottom: 25px;
}

.pricing-price {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 5px;
}

.price-amount {
    font-size: 48px;
    font-weight: bold;
    color: #007bff;
}

.price-currency {
    font-size: 24px;
    color: #6c757d;
}

.pricing-features {
    padding: 30px;
    flex: 1;
}

.pricing-features ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.pricing-features li {
    padding: 12px 0;
    display: flex;
    align-items: center;
    gap: 12px;
    border-bottom: 1px solid #f8f9fa;
}

.pricing-features li:last-child {
    border-bottom: none;
}

.pricing-features i.fa-check {
    color: #28a745;
    font-size: 16px;
}

.pricing-features i.fa-times {
    color: #6c757d;
    font-size: 16px;
}

.pricing-footer {
    padding: 30px;
    text-align: center;
}

.pricing-footer .btn {
    width: 100%;
    padding: 12px;
    font-weight: 600;
    border-radius: 25px;
    transition: all 0.3s ease;
}

.pricing-card.popular .pricing-footer .btn-primary {
    background: #007bff;
    border-color: #007bff;
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
}',
                'js_content' => '',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Прайс с переключателем',
                'type' => 'pricing',
                'category' => 'Прайс',
                'description' => 'Тарифы с переключением между месячной и годовой оплатой',
                'html_content' => '
<section class="pricing-toggle py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Гибкие тарифы</h2>
                <p class="lead text-muted">Выберите удобный способ оплаты</p>
                
                <div class="pricing-toggle-switch mt-4">
                    <div class="toggle-container">
                        <span class="toggle-label monthly active">Ежемесячно</span>
                        <div class="toggle-switch">
                            <input type="checkbox" id="pricingToggle">
                            <label for="pricingToggle" class="toggle-slider"></label>
                        </div>
                        <span class="toggle-label yearly">
                            Ежегодно
                            <span class="discount-badge">-20%</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="pricing-plan">
                    <div class="plan-header">
                        <h4>Starter</h4>
                        <p>Для начинающих</p>
                        <div class="plan-price">
                            <span class="monthly-price">
                                <span class="amount">5 000</span>
                                <span class="period">₽/мес</span>
                            </span>
                            <span class="yearly-price" style="display: none;">
                                <span class="amount">48 000</span>
                                <span class="period">₽/год</span>
                            </span>
                        </div>
                        <div class="yearly-savings" style="display: none;">
                            <small class="text-success">Экономия 12 000 ₽ в год</small>
                        </div>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li><i class="fas fa-check"></i> 5 проектов</li>
                            <li><i class="fas fa-check"></i> 10 GB хранилища</li>
                            <li><i class="fas fa-check"></i> Email поддержка</li>
                            <li><i class="fas fa-check"></i> Базовая аналитика</li>
                            <li><i class="fas fa-times text-muted"></i> Приоритетная поддержка</li>
                            <li><i class="fas fa-times text-muted"></i> Кастомные интеграции</li>
                        </ul>
                    </div>
                    <div class="plan-footer">
                        <a href="#" class="btn btn-outline-primary">Начать</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="pricing-plan featured">
                    <div class="featured-badge">Рекомендуется</div>
                    <div class="plan-header">
                        <h4>Professional</h4>
                        <p>Для бизнеса</p>
                        <div class="plan-price">
                            <span class="monthly-price">
                                <span class="amount">15 000</span>
                                <span class="period">₽/мес</span>
                            </span>
                            <span class="yearly-price" style="display: none;">
                                <span class="amount">144 000</span>
                                <span class="period">₽/год</span>
                            </span>
                        </div>
                        <div class="yearly-savings" style="display: none;">
                            <small class="text-success">Экономия 36 000 ₽ в год</small>
                        </div>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li><i class="fas fa-check"></i> 25 проектов</li>
                            <li><i class="fas fa-check"></i> 100 GB хранилища</li>
                            <li><i class="fas fa-check"></i> Приоритетная поддержка</li>
                            <li><i class="fas fa-check"></i> Расширенная аналитика</li>
                            <li><i class="fas fa-check"></i> API доступ</li>
                            <li><i class="fas fa-check"></i> Базовые интеграции</li>
                        </ul>
                    </div>
                    <div class="plan-footer">
                        <a href="#" class="btn btn-primary">Выбрать</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="pricing-plan">
                    <div class="plan-header">
                        <h4>Enterprise</h4>
                        <p>Для корпораций</p>
                        <div class="plan-price">
                            <span class="monthly-price">
                                <span class="amount">35 000</span>
                                <span class="period">₽/мес</span>
                            </span>
                            <span class="yearly-price" style="display: none;">
                                <span class="amount">336 000</span>
                                <span class="period">₽/год</span>
                            </span>
                        </div>
                        <div class="yearly-savings" style="display: none;">
                            <small class="text-success">Экономия 84 000 ₽ в год</small>
                        </div>
                    </div>
                    <div class="plan-features">
                        <ul>
                            <li><i class="fas fa-check"></i> Неограниченные проекты</li>
                            <li><i class="fas fa-check"></i> 1 TB хранилища</li>
                            <li><i class="fas fa-check"></i> Персональный менеджер</li>
                            <li><i class="fas fa-check"></i> Полная аналитика</li>
                            <li><i class="fas fa-check"></i> Белая маркировка</li>
                            <li><i class="fas fa-check"></i> Все интеграции</li>
                        </ul>
                    </div>
                    <div class="plan-footer">
                        <a href="#" class="btn btn-outline-primary">Связаться</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="pricing-guarantee">
                    <i class="fas fa-shield-alt text-success fa-2x mb-3"></i>
                    <h5>30-дневная гарантия возврата средств</h5>
                    <p class="text-muted">Попробуйте наш сервис без риска. Если не понравится - вернем деньги.</p>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.pricing-toggle {
    background-color: #f8f9fa;
}

.pricing-toggle h2 {
    color: #212529;
    font-weight: bold;
}

.pricing-toggle .lead {
    color: #6c757d;
}

.pricing-toggle-switch {
    display: flex;
    justify-content: center;
    margin: 30px 0;
}

.toggle-container {
    display: flex;
    align-items: center;
    gap: 20px;
    background: white;
    padding: 8px 15px;
    border-radius: 50px;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
}

.toggle-label {
    font-weight: 600;
    color: #6c757d;
    transition: color 0.3s ease;
}

.toggle-label.active {
    color: #007bff;
}

.discount-badge {
    background: #28a745;
    color: white;
    font-size: 12px;
    padding: 3px 8px;
    border-radius: 10px;
    margin-left: 8px;
}

.toggle-switch {
    position: relative;
}

.toggle-switch input[type="checkbox"] {
    display: none;
}

.toggle-slider {
    display: block;
    width: 50px;
    height: 26px;
    background: #e9ecef;
    border-radius: 13px;
    cursor: pointer;
    position: relative;
    transition: background 0.3s ease;
}

.toggle-slider::after {
    content: "";
    position: absolute;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: white;
    top: 2px;
    left: 2px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.toggle-switch input:checked + .toggle-slider {
    background: #007bff;
}

.toggle-switch input:checked + .toggle-slider::after {
    transform: translateX(24px);
}

.pricing-plan {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.pricing-plan:hover {
    transform: translateY(-5px);
}

.pricing-plan.featured {
    border: 3px solid #007bff;
    transform: scale(1.02);
}

.pricing-plan.featured:hover {
    transform: scale(1.02) translateY(-5px);
}

.featured-badge {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: #007bff;
    color: white;
    padding: 6px 20px;
    border-radius: 15px;
    font-size: 13px;
    font-weight: 600;
}

.plan-header {
    text-align: center;
    padding: 40px 30px 20px;
}

.plan-header h4 {
    margin-bottom: 8px;
    font-weight: bold;
    color: #212529;
}

.plan-header p {
    color: #6c757d;
    margin-bottom: 25px;
}

.plan-price {
    margin-bottom: 10px;
}

.plan-price .amount {
    font-size: 42px;
    font-weight: bold;
    color: #007bff;
}

.plan-price .period {
    font-size: 16px;
    color: #6c757d;
    margin-left: 5px;
}

.yearly-savings {
    height: 20px;
}

.plan-features {
    padding: 20px 30px;
    flex: 1;
}

.plan-features ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.plan-features li {
    padding: 10px 0;
    display: flex;
    align-items: center;
    gap: 12px;
}

.plan-features i.fa-check {
    color: #28a745;
}

.plan-features i.fa-times {
    color: #6c757d;
}

.plan-footer {
    padding: 30px;
    text-align: center;
}

.plan-footer .btn {
    width: 100%;
    padding: 12px;
    font-weight: 600;
    border-radius: 25px;
}

.pricing-guarantee {
    background: white;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.pricing-guarantee h5 {
    color: #212529;
    font-weight: bold;
    margin-bottom: 15px;
}',
                'js_content' => '
document.addEventListener("DOMContentLoaded", function() {
    const toggle = document.getElementById("pricingToggle");
    const monthlyLabels = document.querySelectorAll(".toggle-label.monthly");
    const yearlyLabels = document.querySelectorAll(".toggle-label.yearly");
    const monthlyPrices = document.querySelectorAll(".monthly-price");
    const yearlyPrices = document.querySelectorAll(".yearly-price");
    const yearlySavings = document.querySelectorAll(".yearly-savings");
    
    toggle.addEventListener("change", function() {
        const isYearly = this.checked;
        
        // Переключаем активные лейблы
        monthlyLabels.forEach(label => {
            label.classList.toggle("active", !isYearly);
        });
        
        yearlyLabels.forEach(label => {
            label.classList.toggle("active", isYearly);
        });
        
        // Переключаем видимость цен
        monthlyPrices.forEach(price => {
            price.style.display = isYearly ? "none" : "inline";
        });
        
        yearlyPrices.forEach(price => {
            price.style.display = isYearly ? "inline" : "none";
        });
        
        // Показываем/скрываем информацию об экономии
        yearlySavings.forEach(saving => {
            saving.style.display = isYearly ? "block" : "none";
        });
    });
});',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Прайс-таблица',
                'type' => 'pricing',
                'category' => 'Прайс',
                'description' => 'Детальная таблица с услугами и ценами',
                'html_content' => '
<section class="pricing-table py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Прайс-лист услуг</h2>
                <p class="lead text-muted">Подробная информация о стоимости наших услуг</p>
            </div>
        </div>
        
        <!-- Навигация по категориям -->
        <div class="row mb-4">
            <div class="col-12">
                <ul class="nav nav-pills justify-content-center" id="pricingTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#web-development">
                            Веб-разработка
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#design-services">
                            Дизайн
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#marketing-services">
                            Маркетинг
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#support-services">
                            Поддержка
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Таблицы цен -->
        <div class="tab-content" id="pricingTabsContent">
            <!-- Веб-разработка -->
            <div class="tab-pane fade show active" id="web-development" role="tabpanel">
                <div class="pricing-table-container">
                    <table class="table pricing-table-custom">
                        <thead>
                            <tr>
                                <th>Услуга</th>
                                <th>Описание</th>
                                <th>Срок</th>
                                <th>Цена</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Лендинг</strong></td>
                                <td>Одностраничный сайт с формой заявки</td>
                                <td>5-7 дней</td>
                                <td><span class="price">от 30 000 ₽</span></td>
                            </tr>
                            <tr>
                                <td><strong>Корпоративный сайт</strong></td>
                                <td>Многостраничный сайт с CMS</td>
                                <td>2-3 недели</td>
                                <td><span class="price">от 80 000 ₽</span></td>
                            </tr>
                            <tr>
                                <td><strong>Интернет-магазин</strong></td>
                                <td>E-commerce с каталогом и корзиной</td>
                                <td>3-4 недели</td>
                                <td><span class="price">от 150 000 ₽</span></td>
                            </tr>
                            <tr>
                                <td><strong>Веб-приложение</strong></td>
                                <td>Сложное приложение с уникальным функционалом</td>
                                <td>1-3 месяца</td>
                                <td><span class="price">от 300 000 ₽</span></td>
                            </tr>
                            <tr>
                                <td><strong>API разработка</strong></td>
                                <td>RESTful API для интеграций</td>
                                <td>1-2 недели</td>
                                <td><span class="price">от 50 000 ₽</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Дизайн -->
            <div class="tab-pane fade" id="design-services" role="tabpanel">
                <div class="pricing-table-container">
                    <table class="table pricing-table-custom">
                        <thead>
                            <tr>
                                <th>Услуга</th>
                                <th>Описание</th>
                                <th>Срок</th>
                                <th>Цена</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Логотип</strong></td>
                                <td>Разработка фирменного логотипа</td>
                                <td>3-5 дней</td>
                                <td><span class="price">от 15 000 ₽</span></td>
                            </tr>
                            <tr>
                                <td><strong>Фирменный стиль</strong></td>
                                <td>Полный брендбук с гайдлайнами</td>
                                <td>1-2 недели</td>
                                <td><span class="price">от 40 000 ₽</span></td>
                            </tr>
                            <tr>
                                <td><strong>UX/UI дизайн сайта</strong></td>
                                <td>Дизайн-макеты всех страниц</td>
                                <td>1-2 недели</td>
                                <td><span class="price">от 35 000 ₽</span></td>
                            </tr>
                            <tr>
                                <td><strong>Дизайн мобильного приложения</strong></td>
                                <td>UI/UX для iOS и Android</td>
                                <td>2-3 недели</td>
                                <td><span class="price">от 60 000 ₽</span></td>
                            </tr>
                            <tr>
                                <td><strong>Редизайн существующего сайта</strong></td>
                                <td>Обновление дизайна и UX</td>
                                <td>1-2 недели</td>
                                <td><span class="price">от 25 000 ₽</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Маркетинг -->
            <div class="tab-pane fade" id="marketing-services" role="tabpanel">
                <div class="pricing-table-container">
                    <table class="table pricing-table-custom">
                        <thead>
                            <tr>
                                <th>Услуга</th>
                                <th>Описание</th>
                                <th>Срок</th>
                                <th>Цена</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>SEO-оптимизация</strong></td>
                                <td>Внутренняя и внешняя оптимизация</td>
                                <td>Постоянно</td>
                                <td><span class="price">от 20 000 ₽/мес</span></td>
                            </tr>
                            <tr>
                                <td><strong>Контекстная реклама</strong></td>
                                <td>Настройка и ведение Google Ads, Яндекс.Директ</td>
                                <td>Постоянно</td>
                                <td><span class="price">от 15 000 ₽/мес</span></td>
                            </tr>
                            <tr>
                                <td><strong>SMM продвижение</strong></td>
                                <td>Ведение социальных сетей</td>
                                <td>Постоянно</td>
                                <td><span class="price">от 25 000 ₽/мес</span></td>
                            </tr>
                            <tr>
                                <td><strong>Email маркетинг</strong></td>
                                <td>Создание и рассылка email-кампаний</td>
                                <td>Постоянно</td>
                                <td><span class="price">от 10 000 ₽/мес</span></td>
                            </tr>
                            <tr>
                                <td><strong>Аналитика и отчеты</strong></td>
                                <td>Настройка аналитики и ежемесячные отчеты</td>
                                <td>Постоянно</td>
                                <td><span class="price">от 8 000 ₽/мес</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Поддержка -->
            <div class="tab-pane fade" id="support-services" role="tabpanel">
                <div class="pricing-table-container">
                    <table class="table pricing-table-custom">
                        <thead>
                            <tr>
                                <th>Услуга</th>
                                <th>Описание</th>
                                <th>Срок</th>
                                <th>Цена</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Базовая поддержка</strong></td>
                                <td>Мелкие правки, обновления контента</td>
                                <td>1 час</td>
                                <td><span class="price">2 000 ₽/час</span></td>
                            </tr>
                            <tr>
                                <td><strong>Техническое обслуживание</strong></td>
                                <td>Обновления, резервные копии, мониторинг</td>
                                <td>Месяц</td>
                                <td><span class="price">от 5 000 ₽/мес</span></td>
                            </tr>
                            <tr>
                                <td><strong>Экстренная поддержка</strong></td>
                                <td>Срочное исправление критических ошибок</td>
                                <td>В течение дня</td>
                                <td><span class="price">5 000 ₽/час</span></td>
                            </tr>
                            <tr>
                                <td><strong>Обучение CMS</strong></td>
                                <td>Персональное обучение работе с сайтом</td>
                                <td>2-3 часа</td>
                                <td><span class="price">8 000 ₽</span></td>
                            </tr>
                            <tr>
                                <td><strong>Консультации</strong></td>
                                <td>Техническое консультирование по проекту</td>
                                <td>1 час</td>
                                <td><span class="price">3 000 ₽/час</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12">
                <div class="pricing-note">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5><i class="fas fa-info-circle text-primary"></i> Важная информация</h5>
                            <ul class="list-unstyled mb-0">
                                <li>• Все цены указаны без НДС</li>
                                <li>• Стоимость может изменяться в зависимости от сложности проекта</li>
                                <li>• Предоплата составляет 50% от общей стоимости</li>
                                <li>• Бесплатная консультация и составление ТЗ</li>
                            </ul>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="#contact" class="btn btn-primary btn-lg">Получить расчет</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.pricing-table {
    background: #fff;
}

.pricing-table h2 {
    color: #212529;
    font-weight: bold;
}

.pricing-table .lead {
    color: #6c757d;
}

.nav-pills .nav-link {
    border-radius: 25px;
    padding: 12px 25px;
    margin: 0 5px;
    transition: all 0.3s ease;
    color: #6c757d;
    background: transparent;
    border: 2px solid #e9ecef;
}

.nav-pills .nav-link.active {
    background: #007bff;
    color: white;
    border-color: #007bff;
}

.nav-pills .nav-link:hover:not(.active) {
    background: #f8f9fa;
    color: #007bff;
}

.pricing-table-container {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.pricing-table-custom {
    margin-bottom: 0;
}

.pricing-table-custom thead th {
    background: #f8f9fa;
    color: #212529;
    font-weight: 700;
    padding: 20px 15px;
    border: none;
    font-size: 16px;
}

.pricing-table-custom tbody tr {
    transition: background-color 0.3s ease;
}

.pricing-table-custom tbody tr:hover {
    background-color: #f8f9fa;
}

.pricing-table-custom tbody td {
    padding: 20px 15px;
    vertical-align: middle;
    border-top: 1px solid #e9ecef;
    color: #495057;
}

.pricing-table-custom tbody td:first-child {
    font-weight: 600;
    color: #212529;
}

.pricing-table-custom .price {
    font-size: 18px;
    font-weight: bold;
    color: #007bff;
}

.pricing-note {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 30px;
    border-left: 5px solid #007bff;
}

.pricing-note h5 {
    color: #212529;
    font-weight: bold;
    margin-bottom: 15px;
}

.pricing-note h5 i {
    margin-right: 10px;
}

.pricing-note ul li {
    color: #6c757d;
    margin-bottom: 5px;
}

@media (max-width: 768px) {
    .pricing-table-custom {
        font-size: 14px;
    }
    
    .pricing-table-custom thead th,
    .pricing-table-custom tbody td {
        padding: 15px 10px;
    }
    
    .nav-pills .nav-link {
        padding: 8px 15px;
        margin: 2px;
        font-size: 14px;
    }
}',
                'js_content' => '',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($blocks as $blockData) {
            Block::create($blockData);
        }
    }
}
