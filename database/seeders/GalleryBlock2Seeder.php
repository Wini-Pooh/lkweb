<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Block;

class GalleryBlock2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Галерея с лайтбоксом',
                'category' => 'Галереи',
                'html' => '<div class="gallery-lightbox">
    <div class="container">
        <h2 class="gallery-title">Наши работы</h2>
        <div class="gallery-grid">
            <div class="gallery-item" data-lightbox="gallery">
                <img src="https://via.placeholder.com/300x200" alt="Работа 1">
                <div class="overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gallery-item" data-lightbox="gallery">
                <img src="https://via.placeholder.com/300x200" alt="Работа 2">
                <div class="overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gallery-item" data-lightbox="gallery">
                <img src="https://via.placeholder.com/300x200" alt="Работа 3">
                <div class="overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gallery-item" data-lightbox="gallery">
                <img src="https://via.placeholder.com/300x200" alt="Работа 4">
                <div class="overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gallery-item" data-lightbox="gallery">
                <img src="https://via.placeholder.com/300x200" alt="Работа 5">
                <div class="overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
            <div class="gallery-item" data-lightbox="gallery">
                <img src="https://via.placeholder.com/300x200" alt="Работа 6">
                <div class="overlay">
                    <i class="fas fa-search-plus"></i>
                </div>
            </div>
        </div>
    </div>
</div>',
                'css' => '.gallery-lightbox {
    padding: 80px 0;
    background: #f8f9fa;
}

.gallery-title {
    text-align: center;
    margin-bottom: 50px;
    font-size: 2.5rem;
    color: #333;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-5px);
}

.gallery-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-item:hover .overlay {
    opacity: 1;
}

.overlay i {
    color: white;
    font-size: 2rem;
}',
                'js' => 'document.addEventListener("DOMContentLoaded", function() {
    const galleryItems = document.querySelectorAll(".gallery-item");
    
    galleryItems.forEach(item => {
        item.addEventListener("click", function() {
            const img = this.querySelector("img");
            const lightbox = document.createElement("div");
            lightbox.className = "lightbox-overlay";
            lightbox.innerHTML = `
                <div class="lightbox-content">
                    <img src="${img.src}" alt="${img.alt}">
                    <span class="lightbox-close">&times;</span>
                </div>
            `;
            
            document.body.appendChild(lightbox);
            
            const close = lightbox.querySelector(".lightbox-close");
            close.addEventListener("click", function() {
                document.body.removeChild(lightbox);
            });
            
            lightbox.addEventListener("click", function(e) {
                if (e.target === lightbox) {
                    document.body.removeChild(lightbox);
                }
            });
        });
    });
});

// CSS для лайтбокса
const lightboxCSS = `
.lightbox-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.lightbox-content {
    position: relative;
    max-width: 90%;
    max-height: 90%;
}

.lightbox-content img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.lightbox-close {
    position: absolute;
    top: -40px;
    right: 0;
    color: white;
    font-size: 2rem;
    cursor: pointer;
    background: none;
    border: none;
}
`;

const style = document.createElement("style");
style.textContent = lightboxCSS;
document.head.appendChild(style);'
            ],
            [
                'name' => 'Галерея с фильтрами',
                'category' => 'Галереи',
                'html' => '<div class="filterable-gallery">
    <div class="container">
        <h2 class="gallery-title">Портфолио</h2>
        <div class="filter-buttons">
            <button class="filter-btn active" data-filter="all">Все работы</button>
            <button class="filter-btn" data-filter="web">Веб-дизайн</button>
            <button class="filter-btn" data-filter="mobile">Мобильные приложения</button>
            <button class="filter-btn" data-filter="branding">Брендинг</button>
            <button class="filter-btn" data-filter="print">Печатная продукция</button>
        </div>
        <div class="gallery-container">
            <div class="gallery-item" data-category="web">
                <img src="https://via.placeholder.com/300x200" alt="Веб-проект 1">
                <div class="item-info">
                    <h3>Корпоративный сайт</h3>
                    <p>Веб-дизайн</p>
                </div>
            </div>
            <div class="gallery-item" data-category="mobile">
                <img src="https://via.placeholder.com/300x200" alt="Мобильное приложение 1">
                <div class="item-info">
                    <h3>Мобильное приложение</h3>
                    <p>iOS/Android</p>
                </div>
            </div>
            <div class="gallery-item" data-category="branding">
                <img src="https://via.placeholder.com/300x200" alt="Брендинг 1">
                <div class="item-info">
                    <h3>Фирменный стиль</h3>
                    <p>Брендинг</p>
                </div>
            </div>
            <div class="gallery-item" data-category="print">
                <img src="https://via.placeholder.com/300x200" alt="Печать 1">
                <div class="item-info">
                    <h3>Рекламный буклет</h3>
                    <p>Печатная продукция</p>
                </div>
            </div>
            <div class="gallery-item" data-category="web">
                <img src="https://via.placeholder.com/300x200" alt="Веб-проект 2">
                <div class="item-info">
                    <h3>Интернет-магазин</h3>
                    <p>E-commerce</p>
                </div>
            </div>
            <div class="gallery-item" data-category="mobile">
                <img src="https://via.placeholder.com/300x200" alt="Мобильное приложение 2">
                <div class="item-info">
                    <h3>Игровое приложение</h3>
                    <p>Mobile Gaming</p>
                </div>
            </div>
        </div>
    </div>
</div>',
                'css' => '.filterable-gallery {
    padding: 80px 0;
    background: #fff;
}

.gallery-title {
    text-align: center;
    margin-bottom: 40px;
    font-size: 2.5rem;
    color: #333;
}

.filter-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 10px 20px;
    border: 2px solid #007bff;
    background: transparent;
    color: #007bff;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
}

.filter-btn:hover,
.filter-btn.active {
    background: #007bff;
    color: white;
}

.gallery-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

.gallery-item {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    opacity: 1;
    transform: scale(1);
}

.gallery-item.hidden {
    opacity: 0;
    transform: scale(0.8);
    pointer-events: none;
}

.gallery-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.gallery-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.item-info {
    padding: 20px;
}

.item-info h3 {
    margin: 0 0 10px 0;
    color: #333;
    font-size: 1.2rem;
}

.item-info p {
    margin: 0;
    color: #666;
    font-size: 0.9rem;
}',
                'js' => 'document.addEventListener("DOMContentLoaded", function() {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const galleryItems = document.querySelectorAll(".gallery-item");
    
    filterButtons.forEach(button => {
        button.addEventListener("click", function() {
            // Убираем активный класс со всех кнопок
            filterButtons.forEach(btn => btn.classList.remove("active"));
            // Добавляем активный класс к нажатой кнопке
            this.classList.add("active");
            
            const filter = this.getAttribute("data-filter");
            
            galleryItems.forEach(item => {
                const category = item.getAttribute("data-category");
                
                if (filter === "all" || category === filter) {
                    item.classList.remove("hidden");
                } else {
                    item.classList.add("hidden");
                }
            });
        });
    });
});'
            ],
            [
                'name' => 'Слайдер галерея',
                'category' => 'Галереи',
                'html' => '<div class="slider-gallery">
    <div class="container">
        <h2 class="gallery-title">Наши проекты</h2>
        <div class="slider-container">
            <div class="slider-wrapper">
                <div class="slide active">
                    <img src="https://via.placeholder.com/800x400" alt="Проект 1">
                    <div class="slide-content">
                        <h3>Современный офис</h3>
                        <p>Дизайн интерьера офисного пространства</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="https://via.placeholder.com/800x400" alt="Проект 2">
                    <div class="slide-content">
                        <h3>Жилой комплекс</h3>
                        <p>Архитектурное проектирование</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="https://via.placeholder.com/800x400" alt="Проект 3">
                    <div class="slide-content">
                        <h3>Торговый центр</h3>
                        <p>Коммерческая недвижимость</p>
                    </div>
                </div>
                <div class="slide">
                    <img src="https://via.placeholder.com/800x400" alt="Проект 4">
                    <div class="slide-content">
                        <h3>Ресторан</h3>
                        <p>Дизайн общественных пространств</p>
                    </div>
                </div>
            </div>
            <button class="slider-btn prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="slider-btn next" onclick="changeSlide(1)">&#10095;</button>
            <div class="slider-dots">
                <span class="dot active" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
            </div>
        </div>
    </div>
</div>',
                'css' => '.slider-gallery {
    padding: 80px 0;
    background: #f8f9fa;
}

.gallery-title {
    text-align: center;
    margin-bottom: 50px;
    font-size: 2.5rem;
    color: #333;
}

.slider-container {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.slider-wrapper {
    position: relative;
    height: 400px;
}

.slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}

.slide.active {
    opacity: 1;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.slide-content {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
    color: white;
    padding: 40px 30px 30px;
}

.slide-content h3 {
    margin: 0 0 10px 0;
    font-size: 1.5rem;
}

.slide-content p {
    margin: 0;
    opacity: 0.9;
}

.slider-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.8);
    border: none;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    font-size: 1.5rem;
    cursor: pointer;
    transition: background 0.3s ease;
    z-index: 10;
}

.slider-btn:hover {
    background: white;
}

.slider-btn.prev {
    left: 20px;
}

.slider-btn.next {
    right: 20px;
}

.slider-dots {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
}

.dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    transition: background 0.3s ease;
}

.dot.active {
    background: white;
}',
                'js' => 'let currentSlideIndex = 0;
const slides = document.querySelectorAll(".slide");
const dots = document.querySelectorAll(".dot");

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle("active", i === index);
    });
    
    dots.forEach((dot, i) => {
        dot.classList.toggle("active", i === index);
    });
}

function changeSlide(direction) {
    currentSlideIndex += direction;
    
    if (currentSlideIndex >= slides.length) {
        currentSlideIndex = 0;
    } else if (currentSlideIndex < 0) {
        currentSlideIndex = slides.length - 1;
    }
    
    showSlide(currentSlideIndex);
}

function currentSlide(index) {
    currentSlideIndex = index - 1;
    showSlide(currentSlideIndex);
}

// Автопрокрутка
setInterval(() => {
    changeSlide(1);
}, 5000);'
            ],
            [
                'name' => 'Мозаичная галерея',
                'category' => 'Галереи',
                'html' => '<div class="mosaic-gallery">
    <div class="container">
        <h2 class="gallery-title">Креативная галерея</h2>
        <div class="mosaic-grid">
            <div class="mosaic-item large">
                <img src="https://via.placeholder.com/600x400" alt="Основной проект">
                <div class="mosaic-overlay">
                    <h3>Главный проект</h3>
                    <p>Особенный дизайн</p>
                </div>
            </div>
            <div class="mosaic-item">
                <img src="https://via.placeholder.com/300x200" alt="Проект 1">
                <div class="mosaic-overlay">
                    <h3>Проект 1</h3>
                </div>
            </div>
            <div class="mosaic-item">
                <img src="https://via.placeholder.com/300x200" alt="Проект 2">
                <div class="mosaic-overlay">
                    <h3>Проект 2</h3>
                </div>
            </div>
            <div class="mosaic-item tall">
                <img src="https://via.placeholder.com/300x400" alt="Вертикальный проект">
                <div class="mosaic-overlay">
                    <h3>Вертикальный</h3>
                    <p>Уникальная композиция</p>
                </div>
            </div>
            <div class="mosaic-item">
                <img src="https://via.placeholder.com/300x200" alt="Проект 3">
                <div class="mosaic-overlay">
                    <h3>Проект 3</h3>
                </div>
            </div>
            <div class="mosaic-item">
                <img src="https://via.placeholder.com/300x200" alt="Проект 4">
                <div class="mosaic-overlay">
                    <h3>Проект 4</h3>
                </div>
            </div>
            <div class="mosaic-item wide">
                <img src="https://via.placeholder.com/600x200" alt="Широкий проект">
                <div class="mosaic-overlay">
                    <h3>Панорамный проект</h3>
                    <p>Широкоформатное решение</p>
                </div>
            </div>
        </div>
    </div>
</div>',
                'css' => '.mosaic-gallery {
    padding: 80px 0;
    background: #fff;
}

.gallery-title {
    text-align: center;
    margin-bottom: 50px;
    font-size: 2.5rem;
    color: #333;
}

.mosaic-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    grid-auto-rows: 200px;
    gap: 15px;
    max-width: 1200px;
    margin: 0 auto;
}

.mosaic-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.mosaic-item:hover {
    transform: scale(1.05);
    z-index: 10;
}

.mosaic-item.large {
    grid-column: span 2;
    grid-row: span 2;
}

.mosaic-item.tall {
    grid-row: span 2;
}

.mosaic-item.wide {
    grid-column: span 2;
}

.mosaic-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.mosaic-item:hover img {
    transform: scale(1.1);
}

.mosaic-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0, 123, 255, 0.8), rgba(0, 200, 255, 0.8));
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    text-align: center;
    padding: 20px;
}

.mosaic-item:hover .mosaic-overlay {
    opacity: 1;
}

.mosaic-overlay h3 {
    margin: 0 0 10px 0;
    font-size: 1.5rem;
    font-weight: bold;
}

.mosaic-overlay p {
    margin: 0;
    opacity: 0.9;
    font-size: 1rem;
}

@media (max-width: 768px) {
    .mosaic-grid {
        grid-template-columns: 1fr;
    }
    
    .mosaic-item.large,
    .mosaic-item.wide {
        grid-column: span 1;
    }
    
    .mosaic-item.large,
    .mosaic-item.tall {
        grid-row: span 1;
    }
}',
                'js' => 'document.addEventListener("DOMContentLoaded", function() {
    const mosaicItems = document.querySelectorAll(".mosaic-item");
    
    mosaicItems.forEach(item => {
        item.addEventListener("click", function() {
            const img = this.querySelector("img");
            const title = this.querySelector("h3").textContent;
            
            // Создаем модальное окно для просмотра
            const modal = document.createElement("div");
            modal.className = "mosaic-modal";
            modal.innerHTML = `
                <div class="modal-content">
                    <span class="modal-close">&times;</span>
                    <img src="${img.src}" alt="${title}">
                    <h3>${title}</h3>
                </div>
            `;
            
            document.body.appendChild(modal);
            
            // Обработчики закрытия модального окна
            const closeBtn = modal.querySelector(".modal-close");
            closeBtn.addEventListener("click", () => {
                document.body.removeChild(modal);
            });
            
            modal.addEventListener("click", (e) => {
                if (e.target === modal) {
                    document.body.removeChild(modal);
                }
            });
        });
    });
});

// CSS для модального окна
const modalCSS = `
.mosaic-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

.modal-content {
    position: relative;
    max-width: 90%;
    max-height: 90%;
    text-align: center;
}

.modal-content img {
    max-width: 100%;
    max-height: 80vh;
    object-fit: contain;
    border-radius: 10px;
}

.modal-content h3 {
    color: white;
    margin-top: 20px;
    font-size: 1.5rem;
}

.modal-close {
    position: absolute;
    top: -40px;
    right: 0;
    color: white;
    font-size: 2rem;
    cursor: pointer;
    background: none;
    border: none;
}
`;

const style = document.createElement("style");
style.textContent = modalCSS;
document.head.appendChild(style);'
            ],
            [
                'name' => 'Галерея с анимацией',
                'category' => 'Галереи',
                'html' => '<div class="animated-gallery">
    <div class="container">
        <h2 class="gallery-title">Анимированная галерея</h2>
        <div class="gallery-wrapper">
            <div class="gallery-item" data-animation="fadeInUp">
                <div class="image-container">
                    <img src="https://via.placeholder.com/350x250" alt="Анимация 1">
                    <div class="image-overlay">
                        <div class="overlay-content">
                            <h3>Креативное решение</h3>
                            <p>Инновационный подход к дизайну</p>
                            <button class="view-btn">Подробнее</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-animation="fadeInUp" data-delay="100">
                <div class="image-container">
                    <img src="https://via.placeholder.com/350x250" alt="Анимация 2">
                    <div class="image-overlay">
                        <div class="overlay-content">
                            <h3>Современный стиль</h3>
                            <p>Минималистичный и элегантный</p>
                            <button class="view-btn">Подробнее</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-animation="fadeInUp" data-delay="200">
                <div class="image-container">
                    <img src="https://via.placeholder.com/350x250" alt="Анимация 3">
                    <div class="image-overlay">
                        <div class="overlay-content">
                            <h3>Уникальная концепция</h3>
                            <p>Персонализированное решение</p>
                            <button class="view-btn">Подробнее</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-animation="fadeInUp" data-delay="300">
                <div class="image-container">
                    <img src="https://via.placeholder.com/350x250" alt="Анимация 4">
                    <div class="image-overlay">
                        <div class="overlay-content">
                            <h3>Профессиональное качество</h3>
                            <p>Высокие стандарты исполнения</p>
                            <button class="view-btn">Подробнее</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-animation="fadeInUp" data-delay="400">
                <div class="image-container">
                    <img src="https://via.placeholder.com/350x250" alt="Анимация 5">
                    <div class="image-overlay">
                        <div class="overlay-content">
                            <h3>Творческий процесс</h3>
                            <p>От идеи до реализации</p>
                            <button class="view-btn">Подробнее</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gallery-item" data-animation="fadeInUp" data-delay="500">
                <div class="image-container">
                    <img src="https://via.placeholder.com/350x250" alt="Анимация 6">
                    <div class="image-overlay">
                        <div class="overlay-content">
                            <h3>Впечатляющий результат</h3>
                            <p>Превосходим ожидания клиентов</p>
                            <button class="view-btn">Подробнее</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>',
                'css' => '.animated-gallery {
    padding: 80px 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.gallery-title {
    text-align: center;
    margin-bottom: 60px;
    font-size: 2.5rem;
    color: white;
}

.gallery-wrapper {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

.gallery-item {
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.6s ease;
}

.gallery-item.animated {
    opacity: 1;
    transform: translateY(0);
}

.image-container {
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease;
}

.image-container:hover {
    transform: translateY(-10px) scale(1.02);
}

.image-container img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.image-container:hover img {
    transform: scale(1.1);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.4s ease;
}

.image-container:hover .image-overlay {
    opacity: 1;
}

.overlay-content {
    text-align: center;
    padding: 20px;
    transform: translateY(20px);
    transition: transform 0.4s ease;
}

.image-container:hover .overlay-content {
    transform: translateY(0);
}

.overlay-content h3 {
    margin: 0 0 15px 0;
    font-size: 1.4rem;
    font-weight: bold;
}

.overlay-content p {
    margin: 0 0 20px 0;
    opacity: 0.9;
    line-height: 1.4;
}

.view-btn {
    background: white;
    color: #667eea;
    border: none;
    padding: 10px 25px;
    border-radius: 25px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s ease;
}

.view-btn:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

@media (max-width: 768px) {
    .gallery-wrapper {
        grid-template-columns: 1fr;
        gap: 20px;
    }
}',
                'js' => 'document.addEventListener("DOMContentLoaded", function() {
    const galleryItems = document.querySelectorAll(".gallery-item");
    
    // Intersection Observer для анимации при скролле
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const delay = entry.target.getAttribute("data-delay") || 0;
                setTimeout(() => {
                    entry.target.classList.add("animated");
                }, delay);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    });
    
    galleryItems.forEach(item => {
        observer.observe(item);
    });
    
    // Обработчики кнопок "Подробнее"
    const viewButtons = document.querySelectorAll(".view-btn");
    viewButtons.forEach(button => {
        button.addEventListener("click", function(e) {
            e.stopPropagation();
            const item = this.closest(".gallery-item");
            const img = item.querySelector("img");
            const title = item.querySelector("h3").textContent;
            const description = item.querySelector("p").textContent;
            
            // Создаем детальное модальное окно
            const modal = document.createElement("div");
            modal.className = "detail-modal";
            modal.innerHTML = `
                <div class="modal-content">
                    <span class="modal-close">&times;</span>
                    <div class="modal-image">
                        <img src="${img.src}" alt="${title}">
                    </div>
                    <div class="modal-info">
                        <h2>${title}</h2>
                        <p>${description}</p>
                        <div class="modal-tags">
                            <span class="tag">Дизайн</span>
                            <span class="tag">Креатив</span>
                            <span class="tag">Инновации</span>
                        </div>
                    </div>
                </div>
            `;
            
            document.body.appendChild(modal);
            
            // Анимация появления
            setTimeout(() => modal.classList.add("show"), 10);
            
            // Закрытие модального окна
            const closeBtn = modal.querySelector(".modal-close");
            closeBtn.addEventListener("click", () => {
                modal.classList.remove("show");
                setTimeout(() => document.body.removeChild(modal), 300);
            });
            
            modal.addEventListener("click", (e) => {
                if (e.target === modal) {
                    modal.classList.remove("show");
                    setTimeout(() => document.body.removeChild(modal), 300);
                }
            });
        });
    });
});

// CSS для детального модального окна
const detailModalCSS = `
.detail-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.detail-modal.show {
    opacity: 1;
    visibility: visible;
}

.modal-content {
    background: white;
    border-radius: 15px;
    max-width: 80%;
    max-height: 80%;
    display: flex;
    overflow: hidden;
    position: relative;
    transform: scale(0.7);
    transition: transform 0.3s ease;
}

.detail-modal.show .modal-content {
    transform: scale(1);
}

.modal-image {
    flex: 1;
    max-width: 50%;
}

.modal-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.modal-info {
    flex: 1;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.modal-info h2 {
    margin: 0 0 20px 0;
    color: #333;
    font-size: 2rem;
}

.modal-info p {
    margin: 0 0 30px 0;
    color: #666;
    line-height: 1.6;
    font-size: 1.1rem;
}

.modal-tags {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.tag {
    background: #667eea;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.9rem;
}

.modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    font-size: 1.5rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
}

@media (max-width: 768px) {
    .modal-content {
        flex-direction: column;
        max-width: 95%;
        max-height: 95%;
    }
    
    .modal-image {
        max-width: 100%;
        flex: none;
        height: 300px;
    }
    
    .modal-info {
        padding: 20px;
    }
}
`;

const detailStyle = document.createElement("style");
detailStyle.textContent = detailModalCSS;
document.head.appendChild(detailStyle);'
            ]
        ];

        foreach ($blocks as $block) {
            Block::create($block);
        }
    }
}
