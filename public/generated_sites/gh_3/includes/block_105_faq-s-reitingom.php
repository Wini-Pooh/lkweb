<?php
// Блок: FAQ с рейтингом
// Тип: faq
// Категория: FAQ
?>

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
                        <div class="faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faqAnswer1" aria-expanded="false">
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
                        <div id="faqAnswer1" class="faq-content collapse" style="">
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
                        <div class="faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faqAnswer2" aria-expanded="false">
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
                        <div id="faqAnswer2" class="faq-content collapse" style="">
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
                        <div class="faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faqAnswer3" aria-expanded="false">
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
                        <div id="faqAnswer3" class="faq-content collapse" style="">
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
                        <div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faqAnswer4" aria-expanded="true">
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
                        <div id="faqAnswer4" class="faq-content collapse show" style="">
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
</section>