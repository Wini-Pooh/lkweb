<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class TestimonialBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Классические отзывы',
                'type' => 'testimonials',
                'category' => 'Отзывы',
                'description' => 'Простые отзывы клиентов с фотографиями',
                'html_content' => '
<section class="testimonials-classic py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Отзывы клиентов</h2>
                <p class="lead text-muted">Что говорят о нас наши клиенты</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"Отличная работа! Команда выполнила проект в срок и превзошла наши ожидания. Качество кода на высшем уровне."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://via.placeholder.com/60x60" alt="Анна Петрова" class="author-photo">
                        <div class="author-info">
                            <h6 class="author-name">Анна Петрова</h6>
                            <span class="author-position">CEO, ТехКомпания</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"Профессиональный подход и внимание к деталям. Наш сайт стал работать быстрее и выглядит современно."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://via.placeholder.com/60x60" alt="Михаил Сидоров" class="author-photo">
                        <div class="author-info">
                            <h6 class="author-name">Михаил Сидоров</h6>
                            <span class="author-position">Директор, СтройФирма</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="stars mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="testimonial-text">"Рекомендую всем! Быстро, качественно и по разумной цене. Будем обращаться снова."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://via.placeholder.com/60x60" alt="Елена Иванова" class="author-photo">
                        <div class="author-info">
                            <h6 class="author-name">Елена Иванова</h6>
                            <span class="author-position">Владелец, Кафе "Уют"</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.testimonials-classic {
    background-color: #f8f9fa;
}

.testimonials-classic h2 {
    color: #212529;
    font-weight: bold;
}

.testimonials-classic .lead {
    color: #6c757d;
}

.testimonial-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.testimonial-card:hover {
    transform: translateY(-5px);
}

.testimonial-content {
    margin-bottom: 25px;
}

.stars {
    display: flex;
    gap: 3px;
}

.testimonial-text {
    font-style: italic;
    color: #555;
    line-height: 1.6;
    margin-bottom: 0;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 15px;
}

.author-photo {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
}

.author-info {
    flex: 1;
}

.author-name {
    margin-bottom: 5px;
    font-weight: bold;
    color: #212529;
}

.author-position {
    color: #6c757d;
    font-size: 14px;
}',
                'js_content' => '',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Отзывы-слайдер',
                'type' => 'testimonials',
                'category' => 'Отзывы',
                'description' => 'Карусель отзывов с автопрокруткой',
                'html_content' => '
<section class="testimonials-slider py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Отзывы наших клиентов</h2>
                <p class="lead text-muted">Более 100 довольных клиентов по всей России</p>
            </div>
        </div>
        
        <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="testimonial-slide text-center">
                                <div class="quote-icon mb-4">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <blockquote class="testimonial-quote">
                                    "Команда превзошла все наши ожидания. Проект был выполнен досрочно, качество работы на высшем уровне. Особенно впечатлило внимание к деталям и готовность идти навстречу всем пожеланиям."
                                </blockquote>
                                <div class="testimonial-rating mb-4">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="author-info">
                                    <img src="https://via.placeholder.com/80x80" alt="Александр Волков" class="author-avatar">
                                    <h5 class="author-name">Александр Волков</h5>
                                    <p class="author-title">Генеральный директор, ИнноваТех</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="testimonial-slide text-center">
                                <div class="quote-icon mb-4">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <blockquote class="testimonial-quote">
                                    "Работать с этой командой - одно удовольствие. Профессионализм, оперативность и креативный подход к решению задач. Результат превзошел все ожидания."
                                </blockquote>
                                <div class="testimonial-rating mb-4">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="author-info">
                                    <img src="https://via.placeholder.com/80x80" alt="Мария Козлова" class="author-avatar">
                                    <h5 class="author-name">Мария Козлова</h5>
                                    <p class="author-title">Маркетинг-директор, Ритейл Плюс</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="testimonial-slide text-center">
                                <div class="quote-icon mb-4">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <blockquote class="testimonial-quote">
                                    "Отличное соотношение цены и качества. Получили современный, быстрый и удобный сайт. Техническая поддержка работает оперативно. Рекомендуем!"
                                </blockquote>
                                <div class="testimonial-rating mb-4">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="author-info">
                                    <img src="https://via.placeholder.com/80x80" alt="Дмитрий Орлов" class="author-avatar">
                                    <h5 class="author-name">Дмитрий Орлов</h5>
                                    <p class="author-title">Основатель, СпортМастер</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#testimonialsCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#testimonialsCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#testimonialsCarousel" data-bs-slide-to="2"></button>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.testimonials-slider {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.testimonials-slider h2 {
    color: white;
    font-weight: bold;
}

.testimonials-slider .lead {
    color: rgba(255, 255, 255, 0.8);
}

.testimonial-slide {
    padding: 40px 0;
}

.quote-icon {
    font-size: 48px;
    color: rgba(255, 255, 255, 0.3);
}

.testimonial-quote {
    font-size: 24px;
    line-height: 1.6;
    font-style: italic;
    margin-bottom: 30px;
    color: white;
}

.testimonial-rating {
    font-size: 20px;
    color: #ffc107;
}

.author-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 20px;
    border: 4px solid rgba(255, 255, 255, 0.2);
}

.author-name {
    color: white;
    font-weight: bold;
    margin-bottom: 5px;
}

.author-title {
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 0;
}

.carousel-indicators {
    margin-bottom: -40px;
}

.carousel-indicators button {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid rgba(255, 255, 255, 0.5);
    background-color: transparent;
}

.carousel-indicators button.active {
    background-color: white;
}',
                'js_content' => '',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Отзывы с видео',
                'type' => 'testimonials',
                'category' => 'Отзывы',
                'description' => 'Видео-отзывы клиентов',
                'html_content' => '
<section class="testimonials-video py-5 bg-white">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Видео-отзывы</h2>
                <p class="lead text-muted">Наши клиенты рассказывают о сотрудничестве</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="video-testimonial">
                    <div class="video-wrapper">
                        <img src="https://via.placeholder.com/500x300" alt="Видео-отзыв" class="video-preview">
                        <div class="video-play-btn">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="video-info">
                        <h5>Отзыв от компании "ТехСервис"</h5>
                        <p class="text-muted">Алексей Морозов рассказывает о разработке корпоративного сайта</p>
                        <div class="video-stats">
                            <span class="duration"><i class="fas fa-clock"></i> 2:15</span>
                            <span class="views"><i class="fas fa-eye"></i> 1,247 просмотров</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="video-testimonial">
                    <div class="video-wrapper">
                        <img src="https://via.placeholder.com/500x300" alt="Видео-отзыв" class="video-preview">
                        <div class="video-play-btn">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="video-info">
                        <h5>Отзыв от интернет-магазина "ModaStyle"</h5>
                        <p class="text-muted">Анна Соколова о создании e-commerce платформы</p>
                        <div class="video-stats">
                            <span class="duration"><i class="fas fa-clock"></i> 3:42</span>
                            <span class="views"><i class="fas fa-eye"></i> 892 просмотра</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="video-testimonial">
                    <div class="video-wrapper">
                        <img src="https://via.placeholder.com/500x300" alt="Видео-отзыв" class="video-preview">
                        <div class="video-play-btn">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="video-info">
                        <h5>Отзыв от стартапа "FoodDelivery"</h5>
                        <p class="text-muted">Михаил Петров о разработке мобильного приложения</p>
                        <div class="video-stats">
                            <span class="duration"><i class="fas fa-clock"></i> 1:58</span>
                            <span class="views"><i class="fas fa-eye"></i> 2,103 просмотра</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="video-testimonial">
                    <div class="video-wrapper">
                        <img src="https://via.placeholder.com/500x300" alt="Видео-отзыв" class="video-preview">
                        <div class="video-play-btn">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="video-info">
                        <h5>Отзыв от медицинского центра "Здоровье+"</h5>
                        <p class="text-muted">Елена Кузнецова о создании системы записи к врачам</p>
                        <div class="video-stats">
                            <span class="duration"><i class="fas fa-clock"></i> 2:37</span>
                            <span class="views"><i class="fas fa-eye"></i> 1,566 просмотров</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="#" class="btn btn-outline-dark btn-lg">Смотреть все отзывы</a>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.testimonials-video {
    background-color: #fff;
}

.testimonials-video h2 {
    color: #212529;
    font-weight: bold;
}

.testimonials-video .lead {
    color: #6c757d;
}

.video-testimonial {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.video-testimonial:hover {
    transform: translateY(-5px);
}

.video-wrapper {
    position: relative;
    overflow: hidden;
}

.video-preview {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: all 0.3s ease;
}

.video-testimonial:hover .video-preview {
    transform: scale(1.05);
}

.video-play-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 70px;
    height: 70px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.video-play-btn:hover {
    background: white;
    transform: translate(-50%, -50%) scale(1.1);
}

.video-play-btn i {
    font-size: 24px;
    color: #212529;
    margin-left: 3px;
}

.video-info {
    padding: 25px;
}

.video-info h5 {
    margin-bottom: 10px;
    font-weight: bold;
    color: #212529;
}

.video-info p {
    margin-bottom: 15px;
    line-height: 1.5;
}

.video-stats {
    display: flex;
    gap: 20px;
    font-size: 14px;
    color: #6c757d;
}

.video-stats i {
    margin-right: 5px;
}',
                'js_content' => '
document.addEventListener("DOMContentLoaded", function() {
    const playButtons = document.querySelectorAll(".video-play-btn");
    
    playButtons.forEach(button => {
        button.addEventListener("click", function() {
            // Здесь можно добавить логику для открытия видео
            // Например, модальное окно с видео плеером
            alert("Открытие видео-отзыва...");
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
