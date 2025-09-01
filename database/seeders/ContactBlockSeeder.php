<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class ContactBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Классическая форма контактов',
                'type' => 'contact',
                'category' => 'Контакты',
                'description' => 'Простая форма обратной связи',
                'html_content' => '
<section class="contact-classic py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <h2 class="fw-bold mb-4">Свяжитесь с нами</h2>
                <p class="lead mb-4">Мы готовы обсудить ваш проект и ответить на все вопросы</p>
                <form class="contact-form">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Ваше имя" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="tel" class="form-control" placeholder="Телефон">
                        </div>
                        <div class="col-md-6 mb-3">
                            <select class="form-select">
                                <option>Тема обращения</option>
                                <option>Веб-разработка</option>
                                <option>Дизайн</option>
                                <option>Консультация</option>
                                <option>Техподдержка</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="5" placeholder="Сообщение" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark btn-lg">Отправить сообщение</button>
                </form>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="contact-info">
                    <div class="info-item mb-4">
                        <i class="fas fa-map-marker-alt me-3"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Адрес</h6>
                            <p class="mb-0 text-muted">Москва, ул. Примерная, д. 123</p>
                        </div>
                    </div>
                    <div class="info-item mb-4">
                        <i class="fas fa-phone me-3"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Телефон</h6>
                            <p class="mb-0 text-muted">+7 (999) 123-45-67</p>
                        </div>
                    </div>
                    <div class="info-item mb-4">
                        <i class="fas fa-envelope me-3"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Email</h6>
                            <p class="mb-0 text-muted">info@company.ru</p>
                        </div>
                    </div>
                    <div class="info-item mb-4">
                        <i class="fas fa-clock me-3"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Время работы</h6>
                            <p class="mb-0 text-muted">Пн-Пт: 9:00 - 18:00</p>
                        </div>
                    </div>
                    <div class="social-links">
                        <a href="#" class="btn btn-outline-dark me-2">ВКонтакте</a>
                        <a href="#" class="btn btn-outline-dark me-2">WhatsApp</a>
                        <a href="#" class="btn btn-outline-dark">Telegram</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.contact-classic {
    background-color: #f8f8f8 !important;
}

.contact-classic h2 {
    color: #000;
    font-weight: bold;
}

.contact-classic .lead {
    color: #666;
}

.contact-classic .contact-form {
    background-color: #fff;
    padding: 2rem; border-radius: 12px;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.contact-classic .form-control,
.contact-classic .form-select {
    border: 1px solid #e9ecef;
    border-radius: 0;
    padding: 12px 15px;
    color: #000;
}

.contact-classic .form-control:focus,
.contact-classic .form-select:focus {
    border-color: #dee2e6;
    box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.25);
}

.contact-classic .btn-dark {
    background-color: #000;
    border-color: #dee2e6;
    color: #fff;
    padding: 12px 30px;
    font-weight: 600;
}

.contact-classic .btn-dark:hover {
    background-color: #333;
}

.contact-classic .info-item {
    display: flex;
    align-items-start;
    background-color: #fff;
    padding: 1.5rem;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: box-shadow 0.3s ease;
}

.contact-classic .info-item:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.contact-classic .info-item i {
    color: #000;
    font-size: 1.2rem;
    margin-top: 2px;
}

.contact-classic .info-item h6 {
    color: #000;
    font-weight: bold;
}

.contact-classic .info-item .text-muted {
    color: #666 !important;
}

.contact-classic .social-links .btn {
    border-radius: 0;
    font-size: 0.9rem;
    padding: 8px 16px;
}',
                'js_content' => '',
                'sort_order' => 1,
                'is_active' => true,
            ],

            [
                'name' => 'Контакты с картой',
                'type' => 'contact',
                'category' => 'Контакты',
                'description' => 'Контактная информация с местоположением',
                'html_content' => '
<section class="contact-map py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Как нас найти</h2>
            <p class="lead text-muted">Мы находимся в центре города и всегда готовы к встрече</p>
        </div>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="map-container">
                    <div class="map-placeholder text-center p-5 bg-light border">
                        <i class="fas fa-map-marked-alt" style="font-size: 100px; color: #666;"></i>
                        <p class="mt-3 text-muted">Здесь будет интерактивная карта</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="quick-contact-card bg-white p-4 border h-100">
                    <h4 class="fw-bold mb-4">Контактная информация</h4>
                    <div class="contact-item mb-3">
                        <strong>Адрес:</strong><br>
                        <span class="text-muted">Москва, ул. Примерная, д. 123, офис 45</span>
                    </div>
                    <div class="contact-item mb-3">
                        <strong>Телефон:</strong><br>
                        <span class="text-muted">+7 (999) 123-45-67</span>
                    </div>
                    <div class="contact-item mb-3">
                        <strong>Email:</strong><br>
                        <span class="text-muted">info@company.ru</span>
                    </div>
                    <div class="contact-item mb-4">
                        <strong>Время работы:</strong><br>
                        <span class="text-muted">Понедельник - Пятница: 9:00 - 18:00<br>
                        Суббота: 10:00 - 16:00<br>
                        Воскресенье: выходной</span>
                    </div>
                    <a href="tel:+79991234567" class="btn btn-dark w-100">Позвонить</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4 text-center">
                <div class="office-info mb-4">
                    <i class="fas fa-building" style="font-size: 50px; color: #000;"></i>
                    <h5 class="fw-bold mt-3">Главный офис</h5>
                    <p class="text-muted">Москва, ул. Примерная, 123</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="office-info mb-4">
                    <i class="fas fa-users" style="font-size: 50px; color: #000;"></i>
                    <h5 class="fw-bold mt-3">Команда</h5>
                    <p class="text-muted">25+ профессионалов</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="office-info mb-4">
                    <i class="fas fa-clock" style="font-size: 50px; color: #000;"></i>
                    <h5 class="fw-bold mt-3">Опыт работы</h5>
                    <p class="text-muted">Более 5 лет на рынке</p>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.contact-map {
    background-color: #fff;
}

.contact-map h2 {
    color: #000;
    font-weight: bold;
}

.contact-map .lead {
    color: #666;
}

.contact-map .map-container {
    height: 400px;
}

.contact-map .map-placeholder {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #f8f8f8 !important;
    border: 2px solid #000 !important;
}

.contact-map .quick-contact-card {
    background-color: #fff !important; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 2px solid #000 !important;
}

.contact-map .quick-contact-card h4 {
    color: #000;
    font-weight: bold;
}

.contact-map .contact-item {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.contact-map .contact-item:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.contact-map .contact-item strong {
    color: #000;
}

.contact-map .contact-item .text-muted {
    color: #666 !important;
}

.contact-map .btn-dark {
    background-color: #000;
    border-color: #dee2e6;
    color: #fff;
    font-weight: 600;
}

.contact-map .btn-dark:hover {
    background-color: #333;
}

.contact-map .office-info h5 {
    color: #000;
    font-weight: bold;
}

.contact-map .office-info .text-muted {
    color: #666 !important;
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
