<?php
// Блок: Прайс-таблица
// Тип: pricing
// Категория: Прайс
?>

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
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#web-development" aria-selected="false" role="tab" tabindex="-1">
                            Веб-разработка
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#design-services" aria-selected="false" role="tab" tabindex="-1">
                            Дизайн
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#marketing-services" aria-selected="false" role="tab" tabindex="-1">
                            Маркетинг
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#support-services" aria-selected="true" role="tab">
                            Поддержка
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Таблицы цен -->
        <div class="tab-content" id="pricingTabsContent">
            <!-- Веб-разработка -->
            <div class="tab-pane fade" id="web-development" role="tabpanel">
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
            <div class="tab-pane fade active show" id="support-services" role="tabpanel">
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
</section>