<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class FooterBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Классический подвал',
                'type' => 'footer',
                'category' => 'Подвал',
                'description' => 'Классический черно-белый подвал',
                'html_content' => '
<footer class="footer-classic bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-3">О компании</h5>
                <p>Мы создаем современные веб-решения для вашего бизнеса. Качество, надежность и инновации - наши основные принципы.</p>
                <div class="social-links">
                    <a href="#" class="social-link me-3"><i class="fab fa-vk"></i></a>
                    <a href="#" class="social-link me-3"><i class="fab fa-telegram"></i></a>
                    <a href="#" class="social-link me-3"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="social-link me-3"><i class="fab fa-odnoklassniki"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="fw-bold mb-3">Услуги</h5>
                <ul class="footer-links list-unstyled">
                    <li><a href="#" class="text-white-50">Веб-разработка</a></li>
                    <li><a href="#" class="text-white-50">Дизайн</a></li>
                    <li><a href="#" class="text-white-50">SEO</a></li>
                    <li><a href="#" class="text-white-50">Поддержка</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="fw-bold mb-3">Компания</h5>
                <ul class="footer-links list-unstyled">
                    <li><a href="#" class="text-white-50">О нас</a></li>
                    <li><a href="#" class="text-white-50">Команда</a></li>
                    <li><a href="#" class="text-white-50">Карьера</a></li>
                    <li><a href="#" class="text-white-50">Блог</a></li>
                </ul>
            </div>
            <div class="col-lg-4 mb-4">
                <h5 class="fw-bold mb-3">Контакты</h5>
                <div class="contact-info">
                    <p><i class="fas fa-map-marker-alt me-2"></i>Москва, ул. Примерная, 123</p>
                    <p><i class="fas fa-phone me-2"></i>+7 (999) 123-45-67</p>
                    <p><i class="fas fa-envelope me-2"></i>info@company.ru</p>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-white-50">&copy; 2024 Компания. Все права защищены.</p>
            </div>
            <div class="col-md-6 text-end">
                <a href="#" class="text-white-50 me-3">Политика конфиденциальности</a>
                <a href="#" class="text-white-50">Условия использования</a>
            </div>
        </div>
    </div>
</footer>',
                'css_content' => '
.footer-classic {
    background-color: #000 !important;
    color: #fff !important;
}

.footer-classic h5 {
    color: #fff;
    font-weight: bold;
    margin-bottom: 1rem;
}

.footer-classic p {
    color: #ccc;
    line-height: 1.6;
}

.footer-links li {
    margin-bottom: 0.5rem;
}

.footer-links a {
    color: #ccc !important;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-links a:hover {
    color: #fff !important;
    text-decoration: underline;
}

.social-links .social-link {
    display: inline-block;
    width: 40px;
    height: 40px;
    background-color: transparent;
    border: 2px solid #fff;
    color: #fff;
    text-align: center;
    line-height: 36px;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.social-links .social-link:hover {
    background-color: #fff;
    color: #000 !important;
    text-decoration: none;
}

.contact-info i {
    color: #fff;
    width: 20px;
}

.footer-classic hr {
    border-color: #333;
}',
                'js_content' => '',
                'sort_order' => 1,
                'is_active' => true,
            ],

            [
                'name' => 'Минимальный подвал',
                'type' => 'footer',
                'category' => 'Подвал',
                'description' => 'Простой минимальный подвал',
                'html_content' => '
<footer class="footer-minimal bg-light py-4 border-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-muted">&copy; 2024 Компания. Все права защищены.</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end align-items-center">
                    <div class="social-minimal me-4">
                        <a href="#" class="text-dark me-3"><i class="fab fa-telegram"></i></a>
                        <a href="#" class="text-dark me-3"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" class="text-dark"><i class="fab fa-github"></i></a>
                    </div>
                    <div class="legal-links">
                        <a href="#" class="text-muted me-3">Конфиденциальность</a>
                        <a href="#" class="text-muted">Условия</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>',
                'css_content' => '
.footer-minimal {
    background-color: #f8f8f8 !important;
    border-top: 2px solid #000 !important;
}

.footer-minimal p {
    color: #666;
    font-size: 0.9rem;
}

.social-minimal a {
    color: #000 !important;
    text-decoration: none;
    font-size: 1.1rem;
    transition: color 0.3s ease;
}

.social-minimal a:hover {
    color: #666 !important;
}

.legal-links a {
    color: #666 !important;
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.3s ease;
}

.legal-links a:hover {
    color: #000 !important;
    text-decoration: underline;
}',
                'js_content' => '',
                'sort_order' => 2,
                'is_active' => true,
            ],

            [
                'name' => 'Подвал с рассылкой',
                'type' => 'footer',
                'category' => 'Подвал',
                'description' => 'Подвал с формой подписки на рассылку',
                'html_content' => '
<footer class="footer-newsletter bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h4 class="fw-bold mb-3">Подпишитесь на нашу рассылку</h4>
                <p class="mb-4">Получайте последние новости и обновления о наших услугах.</p>
                <form class="newsletter-form">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Ваш email" required>
                        <button class="btn btn-light" type="submit">Подписаться</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h5 class="fw-bold mb-3">Быстрые ссылки</h5>
                        <ul class="footer-links list-unstyled">
                            <li><a href="#" class="text-white-50">Главная</a></li>
                            <li><a href="#" class="text-white-50">О нас</a></li>
                            <li><a href="#" class="text-white-50">Услуги</a></li>
                            <li><a href="#" class="text-white-50">Контакты</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h5 class="fw-bold mb-3">Следите за нами</h5>
                        <div class="social-footer">
                            <a href="#" class="btn btn-outline-light btn-sm me-2 mb-2">ВКонтакте</a>
                            <a href="#" class="btn btn-outline-light btn-sm me-2 mb-2">Telegram</a>
                            <a href="#" class="btn btn-outline-light btn-sm me-2 mb-2">WhatsApp</a>
                            <a href="#" class="btn btn-outline-light btn-sm mb-2">Одноклассники</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0 text-white-50">&copy; 2024 Компания. Все права защищены.</p>
        </div>
    </div>
</footer>',
                'css_content' => '
.footer-newsletter {
    background-color: #000 !important;
    color: #fff !important;
}

.footer-newsletter h4,
.footer-newsletter h5 {
    color: #fff;
    font-weight: bold;
}

.footer-newsletter p {
    color: #ccc;
    line-height: 1.6;
}

.newsletter-form .input-group {
    border: 2px solid #fff;
    overflow: hidden;
}

.newsletter-form .form-control {
    border: none;
    background-color: transparent;
    color: #fff;
    padding: 12px 15px;
}

.newsletter-form .form-control::placeholder {
    color: #ccc;
}

.newsletter-form .form-control:focus {
    background-color: transparent;
    color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-color: transparent;
}

.newsletter-form .btn {
    background-color: #fff;
    color: #000;
    border: none;
    padding: 12px 20px;
    font-weight: 600;
}

.newsletter-form .btn:hover {
    background-color: #ccc;
}

.footer-links a {
    color: #ccc !important;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-links a:hover {
    color: #fff !important;
    text-decoration: underline;
}

.social-footer .btn {
    color: #fff;
    border-color: #fff;
    font-size: 0.85rem;
    padding: 6px 12px;
    transition: all 0.3s ease;
}

.social-footer .btn:hover {
    background-color: #fff;
    color: #000;
    border-color: #fff;
    transform: translateY(-2px);
}

.footer-newsletter hr {
    border-color: #333;
}',
                'js_content' => '',
                'sort_order' => 3,
                'is_active' => true,
            ],

            [
                'name' => 'Многоуровневый подвал',
                'type' => 'footer',
                'category' => 'Подвал',
                'description' => 'Подвал с множественными разделами',
                'html_content' => '
<footer class="footer-multilevel">
    <div class="bg-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">Услуги</h5>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#" class="text-dark">Веб-дизайн</a></li>
                        <li><a href="#" class="text-dark">Разработка</a></li>
                        <li><a href="#" class="text-dark">SEO оптимизация</a></li>
                        <li><a href="#" class="text-dark">Поддержка</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">Компания</h5>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#" class="text-dark">О нас</a></li>
                        <li><a href="#" class="text-dark">Команда</a></li>
                        <li><a href="#" class="text-dark">Вакансии</a></li>
                        <li><a href="#" class="text-dark">Новости</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">Поддержка</h5>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#" class="text-dark">База знаний</a></li>
                        <li><a href="#" class="text-dark">Техподдержка</a></li>
                        <li><a href="#" class="text-dark">Документация</a></li>
                        <li><a href="#" class="text-dark">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">Статистика</h5>
                    <div class="company-stats">
                        <div class="stat-item mb-2">
                            <strong>200+</strong> проектов
                        </div>
                        <div class="stat-item mb-2">
                            <strong>50+</strong> клиентов
                        </div>
                        <div class="stat-item mb-2">
                            <strong>5</strong> лет опыта
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-white">&copy; 2024 Компания. Все права защищены.</p>
                </div>
                <div class="col-md-6 text-end">
                    <div class="footer-legal">
                        <a href="#" class="text-white me-3">Политика конфиденциальности</a>
                        <a href="#" class="text-white">Пользовательское соглашение</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>',
                'css_content' => '
.footer-multilevel .bg-light {
    background-color: #f8f8f8 !important;
    border-top: 2px solid #000;
}

.footer-multilevel h5 {
    color: #000;
    font-weight: bold;
    margin-bottom: 1rem;
}

.footer-links li {
    margin-bottom: 0.5rem;
}

.footer-links a {
    color: #333 !important;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-links a:hover {
    color: #000 !important;
    text-decoration: underline;
}

.company-stats {
    color: #333;
}

.company-stats .stat-item {
    font-size: 0.95rem;
}

.company-stats strong {
    color: #000;
    font-weight: bold;
}

.footer-multilevel .bg-dark {
    background-color: #000 !important;
}

.footer-legal a {
    color: #ccc !important;
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.3s ease;
}

.footer-legal a:hover {
    color: #fff !important;
    text-decoration: underline;
}

.company-stats {
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
}

.company-stats:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

.stat-item {
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
}

.stat-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
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
