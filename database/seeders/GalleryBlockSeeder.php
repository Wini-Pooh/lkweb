<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class GalleryBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Классическая галерея',
                'type' => 'gallery',
                'category' => 'Галереи',
                'description' => 'Простая галерея изображений с сеткой',
                'html_content' => '
<section class="gallery-classic py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Наши работы</h2>
                <p class="lead text-muted">Портфолио выполненных проектов</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 1">
                    <div class="gallery-overlay">
                        <h5>Веб-сайт для компании</h5>
                        <p>Корпоративный сайт с современным дизайном</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 2">
                    <div class="gallery-overlay">
                        <h5>Интернет-магазин</h5>
                        <p>E-commerce решение с полным функционалом</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 3">
                    <div class="gallery-overlay">
                        <h5>Мобильное приложение</h5>
                        <p>iOS и Android приложение для бизнеса</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 4">
                    <div class="gallery-overlay">
                        <h5>CRM система</h5>
                        <p>Система управления клиентами</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 5">
                    <div class="gallery-overlay">
                        <h5>Landing Page</h5>
                        <p>Посадочная страница для продукта</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gallery-item">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 6">
                    <div class="gallery-overlay">
                        <h5>Веб-портал</h5>
                        <p>Информационный портал с админкой</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.gallery-classic {
    background-color: #f8f9fa;
}

.gallery-classic h2 {
    color: #212529;
    font-weight: bold;
}

.gallery-classic .lead {
    color: #6c757d;
}

.gallery-item {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #e9ecef;
    background-color: #fff;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    border-color: #dee2e6;
}

.gallery-item img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: all 0.3s ease;
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
    color: white;
    padding: 20px;
    transform: translateY(100%);
    transition: all 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    transform: translateY(0);
}

.gallery-overlay h5 {
    margin-bottom: 8px;
    font-weight: bold;
}

.gallery-overlay p {
    margin-bottom: 0;
    font-size: 14px;
}',
                'js_content' => '',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Галерея с фильтрами',
                'type' => 'gallery',
                'category' => 'Галереи',
                'description' => 'Галерея с категориями и фильтрацией',
                'html_content' => '
<section class="gallery-filtered py-5 bg-white">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Портфолио</h2>
                <p class="lead text-muted">Наши лучшие проекты в разных категориях</p>
            </div>
        </div>
        
        <!-- Фильтры -->
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                <div class="btn-group filter-buttons" role="group">
                    <button type="button" class="btn btn-outline-dark active" data-filter="*">Все</button>
                    <button type="button" class="btn btn-outline-dark" data-filter=".web">Веб-сайты</button>
                    <button type="button" class="btn btn-outline-dark" data-filter=".mobile">Мобильные</button>
                    <button type="button" class="btn btn-outline-dark" data-filter=".design">Дизайн</button>
                </div>
            </div>
        </div>
        
        <!-- Галерея -->
        <div class="row g-4 gallery-grid">
            <div class="col-md-4 gallery-item-filter web">
                <div class="portfolio-card">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Веб-сайт">
                    <div class="portfolio-info">
                        <h5>Корпоративный сайт</h5>
                        <span class="badge bg-primary">Веб-разработка</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 gallery-item-filter mobile">
                <div class="portfolio-card">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Мобильное приложение">
                    <div class="portfolio-info">
                        <h5>Мобильное приложение</h5>
                        <span class="badge bg-success">Mobile</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 gallery-item-filter design">
                <div class="portfolio-card">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="UI/UX дизайн">
                    <div class="portfolio-info">
                        <h5>UI/UX дизайн</h5>
                        <span class="badge bg-warning">Дизайн</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 gallery-item-filter web">
                <div class="portfolio-card">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Интернет-магазин">
                    <div class="portfolio-info">
                        <h5>Интернет-магазин</h5>
                        <span class="badge bg-primary">E-commerce</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 gallery-item-filter mobile">
                <div class="portfolio-card">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="React Native App">
                    <div class="portfolio-info">
                        <h5>React Native App</h5>
                        <span class="badge bg-success">Mobile</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 gallery-item-filter design">
                <div class="portfolio-card">
                    <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Брендинг">
                    <div class="portfolio-info">
                        <h5>Брендинг</h5>
                        <span class="badge bg-warning">Дизайн</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.gallery-filtered {
    background-color: #fff;
}

.gallery-filtered h2 {
    color: #212529;
    font-weight: bold;
}

.gallery-filtered .lead {
    color: #6c757d;
}

.filter-buttons .btn {
    border-radius: 25px;
    margin: 0 5px;
    padding: 8px 20px;
    transition: all 0.3s ease;
}

.filter-buttons .btn.active {
    background-color: #212529;
    color: white;
    border-color: #212529;
}

.portfolio-card {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.portfolio-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.portfolio-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: all 0.3s ease;
}

.portfolio-card:hover img {
    transform: scale(1.05);
}

.portfolio-info {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
    color: white;
    padding: 30px 20px 20px;
}

.portfolio-info h5 {
    margin-bottom: 10px;
    font-weight: bold;
}

.portfolio-info .badge {
    font-size: 12px;
    padding: 5px 10px;
}

.gallery-item-filter {
    transition: all 0.3s ease;
}

.gallery-item-filter.hidden {
    opacity: 0;
    transform: scale(0.8);
    pointer-events: none;
}',
                'js_content' => '
document.addEventListener("DOMContentLoaded", function() {
    const filterButtons = document.querySelectorAll(".filter-buttons .btn");
    const galleryItems = document.querySelectorAll(".gallery-item-filter");
    
    filterButtons.forEach(button => {
        button.addEventListener("click", function() {
            // Убираем активный класс со всех кнопок
            filterButtons.forEach(btn => btn.classList.remove("active"));
            // Добавляем активный класс к нажатой кнопке
            this.classList.add("active");
            
            const filter = this.getAttribute("data-filter");
            
            galleryItems.forEach(item => {
                if (filter === "*" || item.classList.contains(filter.substring(1))) {
                    item.classList.remove("hidden");
                } else {
                    item.classList.add("hidden");
                }
            });
        });
    });
});',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Галерея-слайдер',
                'type' => 'gallery',
                'category' => 'Галереи',
                'description' => 'Галерея в виде карусели с навигацией',
                'html_content' => '
<section class="gallery-slider py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Галерея работ</h2>
                <p class="lead text-muted">Просмотрите наши последние проекты</p>
            </div>
        </div>
        
        <div id="portfolioCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#portfolioCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#portfolioCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#portfolioCarousel" data-bs-slide-to="2"></button>
            </div>
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="slider-item">
                                <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 1">
                                <div class="slider-caption">
                                    <h5>Веб-платформа</h5>
                                    <p>Современная платформа для онлайн-обучения</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="slider-item">
                                <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 2">
                                <div class="slider-caption">
                                    <h5>Мобильное приложение</h5>
                                    <p>Приложение для заказа еды с доставкой</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="slider-item">
                                <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 3">
                                <div class="slider-caption">
                                    <h5>CRM система</h5>
                                    <p>Система управления взаимоотношениями с клиентами</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="slider-item">
                                <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 4">
                                <div class="slider-caption">
                                    <h5>E-commerce решение</h5>
                                    <p>Интернет-магазин с полным функционалом</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="slider-item">
                                <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 5">
                                <div class="slider-caption">
                                    <h5>Корпоративный портал</h5>
                                    <p>Внутренний портал для сотрудников компании</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="slider-item">
                                <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 6">
                                <div class="slider-caption">
                                    <h5>Landing Page</h5>
                                    <p>Высококонверсионная посадочная страница</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="slider-item">
                                <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 7">
                                <div class="slider-caption">
                                    <h5>Веб-сервис</h5>
                                    <p>SaaS платформа для управления проектами</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="slider-item">
                                <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 8">
                                <div class="slider-caption">
                                    <h5>PWA приложение</h5>
                                    <p>Прогрессивное веб-приложение</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="slider-item">
                                <img src="https://via.placeholder.com/400x300" class="img-fluid" alt="Проект 9">
                                <div class="slider-caption">
                                    <h5>API сервис</h5>
                                    <p>RESTful API для интеграции систем</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#portfolioCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#portfolioCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>',
                'css_content' => '
.gallery-slider {
    background-color: #f8f9fa;
}

.gallery-slider h2 {
    color: #212529;
    font-weight: bold;
}

.gallery-slider .lead {
    color: #6c757d;
}

.slider-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.slider-item:hover {
    transform: translateY(-5px);
}

.slider-item img {
    width: 100%;
    height: 280px;
    object-fit: cover;
    transition: all 0.3s ease;
}

.slider-item:hover img {
    transform: scale(1.05);
}

.slider-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
    color: white;
    padding: 25px 20px 20px;
}

.slider-caption h5 {
    margin-bottom: 8px;
    font-weight: bold;
    font-size: 18px;
}

.slider-caption p {
    margin-bottom: 0;
    font-size: 14px;
    opacity: 0.9;
}

.carousel-control-prev,
.carousel-control-next {
    width: 5%;
    color: #212529;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(33, 37, 41, 0.8);
    border-radius: 50%;
    padding: 20px;
}

.carousel-indicators {
    margin-bottom: -50px;
}

.carousel-indicators button {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #212529;
    background-color: transparent;
}

.carousel-indicators button.active {
    background-color: #212529;
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
