<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class FaqBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Классический FAQ',
                'type' => 'faq',
                'category' => 'FAQ',
                'description' => 'Аккордеон с часто задаваемыми вопросами',
                'html_content' => '
<section class="faq-classic py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Часто задаваемые вопросы</h2>
                <p class="lead text-muted">Ответы на самые популярные вопросы</p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                Сколько времени занимает разработка сайта?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Время разработки зависит от сложности проекта. Простой лендинг можно создать за 1-2 недели, корпоративный сайт - за 3-4 недели, а сложное веб-приложение может потребовать 2-3 месяца.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                Какая стоимость разработки?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Стоимость формируется индивидуально на основе технических требований. Простой сайт от 30 000 руб., корпоративный сайт от 80 000 руб., интернет-магазин от 150 000 руб.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                Предоставляете ли вы техническую поддержку?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Да, мы предоставляем техническую поддержку и сопровождение сайтов. В базовый пакет входит 3 месяца бесплатной поддержки, далее возможно заключение договора на регулярное обслуживание.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                Можно ли вносить изменения в процессе разработки?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Конечно! Мы используем гибкую методологию разработки, которая позволяет вносить изменения на любом этапе. Незначительные правки включены в стоимость, крупные изменения обсуждаются отдельно.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                                Какие технологии вы используете?
                            </button>
                        </h2>
                        <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Мы работаем с современными технологиями: PHP (Laravel), JavaScript (React, Vue.js), Python (Django), Node.js. Для мобильных приложений используем React Native и Flutter.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6">
                                Будет ли сайт адаптивным?
                            </button>
                        </h2>
                        <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Абсолютно все наши сайты адаптивны и корректно отображаются на всех устройствах: компьютерах, планшетах и смартфонах. Мы тестируем совместимость с популярными браузерами.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12 text-center">
                <p class="lead">Не нашли ответ на свой вопрос?</p>
                <a href="#contact" class="btn btn-primary">Связаться с нами</a>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.faq-classic {
    background-color: #f8f9fa;
}

.faq-classic h2 {
    color: #212529;
    font-weight: bold;
}

.faq-classic .lead {
    color: #6c757d;
}

.accordion-item {
    border: none;
    margin-bottom: 15px;
    border-radius: 10px !important;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.accordion-button {
    background: white;
    border: none;
    padding: 20px 25px;
    font-weight: 600;
    color: #212529;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 10px !important;
}

.accordion-button:not(.collapsed) {
    background: #007bff;
    color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.accordion-button:focus {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: none;
}

.accordion-button::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' fill=\'%23212529\'%3e%3cpath fill-rule=\'evenodd\' d=\'M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z\'/%3e%3c/svg%3e");
}

.accordion-button:not(.collapsed)::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' fill=\'%23fff\'%3e%3cpath fill-rule=\'evenodd\' d=\'M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z\'/%3e%3c/svg%3e");
}

.accordion-body {
    padding: 25px;
    background: white;
    color: #6c757d;
    line-height: 1.6;
}',
                'js_content' => '',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'FAQ с поиском',
                'type' => 'faq',
                'category' => 'FAQ',
                'description' => 'FAQ с функцией поиска по вопросам',
                'html_content' => '
<section class="faq-search py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">База знаний</h2>
                <p class="lead text-muted">Найдите ответы на ваши вопросы</p>
            </div>
        </div>
        
        <!-- Поиск -->
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto">
                <div class="search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" id="faqSearch" placeholder="Поиск по вопросам...">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Категории -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="d-flex justify-content-center flex-wrap gap-2">
                    <button class="btn btn-outline-primary category-filter active" data-category="all">Все</button>
                    <button class="btn btn-outline-primary category-filter" data-category="general">Общие</button>
                    <button class="btn btn-outline-primary category-filter" data-category="pricing">Цены</button>
                    <button class="btn btn-outline-primary category-filter" data-category="technical">Технические</button>
                    <button class="btn btn-outline-primary category-filter" data-category="support">Поддержка</button>
                </div>
            </div>
        </div>
        
        <!-- FAQ Items -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div id="faqResults">
                    <div class="faq-item" data-category="general">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#answer1">
                            <h5>Как начать работу с вашей компанией?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="answer1" class="collapse faq-answer">
                            <p>Для начала работы свяжитесь с нами любым удобным способом. Мы проведем бесплатную консультацию, обсудим ваши требования и предложим оптимальное решение.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item" data-category="pricing">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#answer2">
                            <h5>Какая минимальная стоимость проекта?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="answer2" class="collapse faq-answer">
                            <p>Минимальная стоимость зависит от типа проекта. Простая визитка от 15 000 руб., лендинг от 30 000 руб., корпоративный сайт от 80 000 руб.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item" data-category="technical">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#answer3">
                            <h5>Используете ли вы готовые шаблоны?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="answer3" class="collapse faq-answer">
                            <p>Мы создаем уникальный дизайн для каждого проекта. Готовые шаблоны используются только как база для быстрого прототипирования, но финальный продукт всегда уникален.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item" data-category="support">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#answer4">
                            <h5>Как работает техническая поддержка?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="answer4" class="collapse faq-answer">
                            <p>Техподдержка доступна в рабочие дни с 9:00 до 18:00. Критичные проблемы решаем в течение 2 часов, остальные - в течение рабочего дня.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item" data-category="general">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#answer5">
                            <h5>Предоставляете ли вы гарантию на работы?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="answer5" class="collapse faq-answer">
                            <p>Да, мы предоставляем гарантию на все выполненные работы сроком 6 месяцев. Гарантия покрывает исправление ошибок и недочетов в функционале.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item" data-category="technical">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#answer6">
                            <h5>Можете ли вы доработать существующий сайт?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="answer6" class="collapse faq-answer">
                            <p>Конечно! Мы можем доработать сайт любой сложности, добавить новый функционал, улучшить дизайн или оптимизировать производительность.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item" data-category="pricing">
                        <div class="faq-question" data-bs-toggle="collapse" data-bs-target="#answer7">
                            <h5>Возможна ли оплата в рассрочку?</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div id="answer7" class="collapse faq-answer">
                            <p>Да, для крупных проектов мы предоставляем возможность оплаты в рассрочку. Обычно это 50% предоплата и 50% по завершении работ.</p>
                        </div>
                    </div>
                </div>
                
                <div id="noResults" class="text-center mt-4" style="display: none;">
                    <i class="fas fa-search fa-3x text-muted mb-3"></i>
                    <h4>Ничего не найдено</h4>
                    <p class="text-muted">Попробуйте изменить поисковый запрос</p>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.faq-search {
    background: #fff;
}

.faq-search h2 {
    color: #212529;
    font-weight: bold;
}

.faq-search .lead {
    color: #6c757d;
}

.search-box .form-control {
    padding: 15px 20px;
    font-size: 16px;
    border-radius: 25px 0 0 25px;
    border: 2px solid #e9ecef;
}

.search-box .btn {
    padding: 15px 25px;
    border-radius: 0 25px 25px 0;
    border: 2px solid #007bff;
}

.category-filter {
    border-radius: 25px;
    padding: 8px 20px;
    margin: 5px;
    transition: all 0.3s ease;
}

.category-filter.active {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

.faq-item {
    background: #f8f9fa;
    border-radius: 10px;
    margin-bottom: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.faq-item:hover {
    transform: translateY(-2px);
}

.faq-question {
    padding: 20px 25px;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: white;
    transition: background-color 0.3s ease;
}

.faq-question:hover {
    background: #f8f9fa;
}

.faq-question h5 {
    margin: 0;
    font-weight: 600;
    color: #212529;
}

.faq-question i {
    color: #007bff;
    transition: all 0.3s ease;
}

.faq-question[aria-expanded="true"] i {
    transform: rotate(180deg);
}

.faq-answer {
    padding: 0 25px;
    background: white;
}

.faq-answer p {
    padding: 20px 0;
    margin: 0;
    color: #6c757d;
    line-height: 1.6;
    border-top: 1px solid #e9ecef;
}

.faq-item.hidden {
    display: none;
}

.faq-item {
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
}

.faq-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}',
                'js_content' => '
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("faqSearch");
    const categoryFilters = document.querySelectorAll(".category-filter");
    const faqItems = document.querySelectorAll(".faq-item");
    const noResults = document.getElementById("noResults");
    
    let currentCategory = "all";
    
    // Поиск
    searchInput.addEventListener("input", function() {
        filterFAQ();
    });
    
    // Фильтр по категориям
    categoryFilters.forEach(filter => {
        filter.addEventListener("click", function() {
            // Убираем активный класс со всех кнопок
            categoryFilters.forEach(btn => btn.classList.remove("active"));
            // Добавляем активный класс к нажатой кнопке
            this.classList.add("active");
            
            currentCategory = this.getAttribute("data-category");
            filterFAQ();
        });
    });
    
    function filterFAQ() {
        const searchTerm = searchInput.value.toLowerCase();
        let visibleCount = 0;
        
        faqItems.forEach(item => {
            const itemCategory = item.getAttribute("data-category");
            const questionText = item.querySelector("h5").textContent.toLowerCase();
            const answerText = item.querySelector(".faq-answer p").textContent.toLowerCase();
            
            const categoryMatch = currentCategory === "all" || itemCategory === currentCategory;
            const searchMatch = searchTerm === "" || 
                               questionText.includes(searchTerm) || 
                               answerText.includes(searchTerm);
            
            if (categoryMatch && searchMatch) {
                item.classList.remove("hidden");
                visibleCount++;
            } else {
                item.classList.add("hidden");
            }
        });
        
        // Показываем сообщение "ничего не найдено"
        if (visibleCount === 0) {
            noResults.style.display = "block";
        } else {
            noResults.style.display = "none";
        }
    }
});',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'FAQ с рейтингом',
                'type' => 'faq',
                'category' => 'FAQ',
                'description' => 'FAQ с возможностью оценки полезности ответов',
                'html_content' => '
<section class="faq-rating py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Центр помощи</h2>
                <p class="lead text-muted">Ответы на популярные вопросы с оценками пользователей</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="faq-list">
                    <div class="faq-card">
                        <div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faqAnswer1">
                            <div class="question-content">
                                <h5>Как происходит процесс разработки сайта?</h5>
                                <span class="popular-badge">Популярный вопрос</span>
                            </div>
                            <div class="question-meta">
                                <span class="rating-display">
                                    <i class="fas fa-star"></i> 4.8
                                </span>
                                <i class="fas fa-chevron-down toggle-icon"></i>
                            </div>
                        </div>
                        <div id="faqAnswer1" class="collapse faq-content">
                            <div class="answer-text">
                                <p>Процесс разработки включает несколько этапов:</p>
                                <ol>
                                    <li>Анализ требований и составление технического задания</li>
                                    <li>Создание дизайн-макетов и прототипов</li>
                                    <li>Верстка и программирование функционала</li>
                                    <li>Тестирование и отладка</li>
                                    <li>Запуск и передача проекта заказчику</li>
                                </ol>
                                <p>На каждом этапе мы согласовываем результат с клиентом.</p>
                            </div>
                            <div class="answer-rating">
                                <span>Была ли эта информация полезной?</span>
                                <div class="rating-buttons">
                                    <button class="btn btn-sm btn-outline-success" onclick="rateAnswer(this, true)">
                                        <i class="fas fa-thumbs-up"></i> Да (127)
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="rateAnswer(this, false)">
                                        <i class="fas fa-thumbs-down"></i> Нет (8)
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-card">
                        <div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faqAnswer2">
                            <div class="question-content">
                                <h5>Какие документы нужны для заключения договора?</h5>
                            </div>
                            <div class="question-meta">
                                <span class="rating-display">
                                    <i class="fas fa-star"></i> 4.6
                                </span>
                                <i class="fas fa-chevron-down toggle-icon"></i>
                            </div>
                        </div>
                        <div id="faqAnswer2" class="collapse faq-content">
                            <div class="answer-text">
                                <p>Для заключения договора потребуются:</p>
                                <ul>
                                    <li>Копия паспорта (для физических лиц)</li>
                                    <li>Реквизиты организации и копия устава (для юридических лиц)</li>
                                    <li>Техническое задание на разработку</li>
                                </ul>
                                <p>Мы можем начать работу сразу после подписания договора и получения предоплаты.</p>
                            </div>
                            <div class="answer-rating">
                                <span>Была ли эта информация полезной?</span>
                                <div class="rating-buttons">
                                    <button class="btn btn-sm btn-outline-success" onclick="rateAnswer(this, true)">
                                        <i class="fas fa-thumbs-up"></i> Да (89)
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="rateAnswer(this, false)">
                                        <i class="fas fa-thumbs-down"></i> Нет (12)
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-card">
                        <div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faqAnswer3">
                            <div class="question-content">
                                <h5>Делаете ли вы SEO-оптимизацию?</h5>
                                <span class="trending-badge">Актуальный</span>
                            </div>
                            <div class="question-meta">
                                <span class="rating-display">
                                    <i class="fas fa-star"></i> 4.9
                                </span>
                                <i class="fas fa-chevron-down toggle-icon"></i>
                            </div>
                        </div>
                        <div id="faqAnswer3" class="collapse faq-content">
                            <div class="answer-text">
                                <p>Да, мы предоставляем комплексные SEO-услуги:</p>
                                <ul>
                                    <li>Техническая оптимизация сайта</li>
                                    <li>Оптимизация контента и мета-тегов</li>
                                    <li>Настройка аналитики и вебмастеров</li>
                                    <li>Составление семантического ядра</li>
                                    <li>Регулярный аудит и улучшения</li>
                                </ul>
                                <p>SEO-оптимизация может быть включена в пакет разработки или заказана отдельно.</p>
                            </div>
                            <div class="answer-rating">
                                <span>Была ли эта информация полезной?</span>
                                <div class="rating-buttons">
                                    <button class="btn btn-sm btn-outline-success" onclick="rateAnswer(this, true)">
                                        <i class="fas fa-thumbs-up"></i> Да (156)
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="rateAnswer(this, false)">
                                        <i class="fas fa-thumbs-down"></i> Нет (3)
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="faq-card">
                        <div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faqAnswer4">
                            <div class="question-content">
                                <h5>Можно ли изменить дизайн после утверждения?</h5>
                            </div>
                            <div class="question-meta">
                                <span class="rating-display">
                                    <i class="fas fa-star"></i> 4.3
                                </span>
                                <i class="fas fa-chevron-down toggle-icon"></i>
                            </div>
                        </div>
                        <div id="faqAnswer4" class="collapse faq-content">
                            <div class="answer-text">
                                <p>Изменения в дизайн возможны на любом этапе, но стоимость зависит от объема правок:</p>
                                <ul>
                                    <li>Незначительные правки (цвета, шрифты) - бесплатно</li>
                                    <li>Средние изменения (блоки, компоненты) - 20-30% от стоимости дизайна</li>
                                    <li>Кардинальные изменения - пересчет стоимости</li>
                                </ul>
                                <p>Рекомендуем четко формулировать требования на этапе брифинга.</p>
                            </div>
                            <div class="answer-rating">
                                <span>Была ли эта информация полезной?</span>
                                <div class="rating-buttons">
                                    <button class="btn btn-sm btn-outline-success" onclick="rateAnswer(this, true)">
                                        <i class="fas fa-thumbs-up"></i> Да (73)
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="rateAnswer(this, false)">
                                        <i class="fas fa-thumbs-down"></i> Нет (18)
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-5">
                    <p class="text-muted">Не нашли ответ на свой вопрос?</p>
                    <a href="#contact" class="btn btn-primary">Задать вопрос</a>
                    <a href="#" class="btn btn-outline-secondary ms-2">Все вопросы</a>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.faq-rating {
    background-color: #f8f9fa;
}

.faq-rating h2 {
    color: #212529;
    font-weight: bold;
}

.faq-rating .lead {
    color: #6c757d;
}

.faq-card {
    background: white;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
}

.faq-card:hover {
    transform: translateY(-2px);
}

.faq-header {
    padding: 25px;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    transition: background-color 0.3s ease;
}

.faq-header:hover {
    background-color: #f8f9fa;
}

.question-content {
    flex: 1;
}

.question-content h5 {
    margin: 0 0 10px 0;
    font-weight: 600;
    color: #212529;
    line-height: 1.4;
}

.popular-badge {
    background: #ffc107;
    color: #212529;
    font-size: 12px;
    padding: 4px 10px;
    border-radius: 15px;
    font-weight: 600;
}

.trending-badge {
    background: #28a745;
    color: white;
    font-size: 12px;
    padding: 4px 10px;
    border-radius: 15px;
    font-weight: 600;
}

.question-meta {
    display: flex;
    align-items: center;
    gap: 15px;
}

.rating-display {
    color: #ffc107;
    font-weight: 600;
    font-size: 14px;
}

.rating-display i {
    margin-right: 3px;
}

.toggle-icon {
    color: #007bff;
    transition: all 0.3s ease;
}

.faq-header[aria-expanded="true"] .toggle-icon {
    transform: rotate(180deg);
}

.faq-content {
    border-top: 1px solid #e9ecef;
}

.answer-text {
    padding: 25px;
    color: #6c757d;
    line-height: 1.6;
}

.answer-text ol,
.answer-text ul {
    margin: 15px 0;
    padding-left: 20px;
}

.answer-text li {
    margin-bottom: 8px;
}

.answer-rating {
    background: #f8f9fa;
    padding: 20px 25px;
    border-top: 1px solid #e9ecef;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.answer-rating span {
    font-weight: 600;
    color: #495057;
}

.rating-buttons {
    display: flex;
    gap: 10px;
}

.rating-buttons .btn {
    border-radius: 20px;
    padding: 6px 15px;
    font-size: 14px;
    transition: all 0.3s ease;
}

.rating-buttons .btn:hover {
    transform: translateY(-1px);
}',
                'js_content' => '
function rateAnswer(button, isPositive) {
    // Получаем текущее значение
    const currentText = button.textContent.trim();
    const currentCount = parseInt(currentText.match(/\d+/)[0]);
    
    // Увеличиваем счетчик
    const newCount = currentCount + 1;
    
    // Обновляем текст кнопки
    if (isPositive) {
        button.innerHTML = `<i class="fas fa-thumbs-up"></i> Да (${newCount})`;
        button.classList.remove("btn-outline-success");
        button.classList.add("btn-success");
    } else {
        button.innerHTML = `<i class="fas fa-thumbs-down"></i> Нет (${newCount})`;
        button.classList.remove("btn-outline-danger");
        button.classList.add("btn-danger");
    }
    
    // Отключаем кнопку
    button.disabled = true;
    
    // Показываем уведомление
    setTimeout(() => {
        const message = isPositive ? "Спасибо за положительную оценку!" : "Спасибо за обратную связь!";
        // Здесь можно добавить toast уведомление
    }, 200);
}

document.addEventListener("DOMContentLoaded", function() {
    // Добавляем плавную анимацию для аккордеона
    const collapseElements = document.querySelectorAll(".collapse");
    
    collapseElements.forEach(element => {
        element.addEventListener("show.bs.collapse", function() {
            this.style.transition = "height 0.3s ease";
        });
        
        element.addEventListener("hide.bs.collapse", function() {
            this.style.transition = "height 0.3s ease";
        });
    });
});',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($blocks as $blockData) {
            Block::create($blockData);
        }
    }
}
