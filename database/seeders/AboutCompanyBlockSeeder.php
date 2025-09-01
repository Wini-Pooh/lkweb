<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class AboutCompanyBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'О компании - классический',
                'type' => 'about',
                'category' => 'О компании',
                'description' => 'Классическая секция о компании',
                'html_content' => '
<section class="about-classic py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2 class="fw-bold mb-4">О нашей компании</h2>
                <p class="lead mb-4">Мы - команда профессионалов, которая уже более 5 лет создает качественные веб-решения для бизнеса любого масштаба.</p>
                <p class="mb-4">Наш подход основан на глубоком понимании потребностей клиентов и использовании современных технологий. Мы не просто разрабатываем сайты - мы создаем инструменты для роста вашего бизнеса.</p>
                <div class="row company-stats">
                    <div class="col-4 text-center">
                        <h3 class="fw-bold">200+</h3>
                        <p>Проектов</p>
                    </div>
                    <div class="col-4 text-center">
                        <h3 class="fw-bold">50+</h3>
                        <p>Клиентов</p>
                    </div>
                    <div class="col-4 text-center">
                        <h3 class="fw-bold">5+</h3>
                        <p>Лет опыта</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="about-image text-center">
                    <i class="fas fa-users" style="font-size: 150px; color: #666;"></i>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.about-classic {
    background-color: #fff;
    color: #000;
}

.about-classic h2 {
    color: #000;
    font-weight: bold;
}

.about-classic .lead {
    color: #333;
    font-size: 1.25rem;
    line-height: 1.6;
}

.about-classic p {
    color: #666;
    line-height: 1.7;
}

.about-classic .company-stats {
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 2rem; border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.about-classic .company-stats h3 {
    color: #000;
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.about-classic .company-stats p {
    color: #666;
    font-size: 1rem;
    margin-bottom: 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.about-classic .company-stats {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 2px solid #000;
}

.about-image {
    padding: 2rem; border-radius: 12px;
    background-color: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}',
                'js_content' => '',
                'sort_order' => 1,
                'is_active' => true,
            ],

            [
                'name' => 'О компании с командой',
                'type' => 'about',
                'category' => 'О компании',
                'description' => 'Секция о компании с презентацией команды',
                'html_content' => '
<section class="about-team py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Наша команда</h2>
            <p class="lead text-muted">Профессионалы, которые воплощают ваши идеи в жизнь</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="team-member text-center bg-white p-4 h-100">
                    <div class="member-photo mb-3">
                        <i class="fas fa-user-circle" style="font-size: 80px; color: #666;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Алексей Иванов</h5>
                    <p class="text-muted mb-3">Lead Developer</p>
                    <p class="small">Опытный разработчик с 7-летним стажем. Специализируется на современных веб-технологиях.</p>
                    <div class="social-links">
                        <a href="#" class="text-dark me-2"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" class="text-dark me-2"><i class="fab fa-github"></i></a>
                        <a href="#" class="text-dark"><i class="fab fa-telegram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="team-member text-center bg-white p-4 h-100">
                    <div class="member-photo mb-3">
                        <i class="fas fa-user-circle" style="font-size: 80px; color: #666;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Мария Петрова</h5>
                    <p class="text-muted mb-3">UI/UX Designer</p>
                    <p class="small">Создает интуитивные и красивые интерфейсы, которые пользователи обожают.</p>
                    <div class="social-links">
                        <a href="#" class="text-dark me-2"><i class="fab fa-dribbble"></i></a>
                        <a href="#" class="text-dark me-2"><i class="fab fa-behance"></i></a>
                        <a href="#" class="text-dark"><i class="fab fa-odnoklassniki"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="team-member text-center bg-white p-4 h-100">
                    <div class="member-photo mb-3">
                        <i class="fas fa-user-circle" style="font-size: 80px; color: #666;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Дмитрий Сидоров</h5>
                    <p class="text-muted mb-3">Project Manager</p>
                    <p class="small">Обеспечивает качественную реализацию проектов в срок и в рамках бюджета.</p>
                    <div class="social-links">
                        <a href="#" class="text-dark me-2"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" class="text-dark me-2"><i class="fab fa-vk"></i></a>
                        <a href="#" class="text-dark"><i class="fab fa-telegram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.about-team {
    background-color: #f8f8f8 !important;
}

.about-team h2 {
    color: #000;
    font-weight: bold;
}

.about-team .lead {
    color: #666;
}

.about-team .team-member {
    background-color: #fff !important; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.about-team .team-member:hover {
    transform: translateY(-10px);
    border-color: #333;
}

.about-team .team-member h5 {
    color: #000;
    font-weight: bold;
}

.about-team .team-member .text-muted {
    color: #666 !important;
    font-weight: 500;
}

.about-team .team-member .small {
    color: #777;
    line-height: 1.5;
}

.about-team .social-links a {
    display: inline-block;
    color: #000 !important;
    text-decoration: none;
    font-size: 1.1rem;
    transition: color 0.3s ease;
}

.about-team .social-links a:hover {
    color: #666 !important;
}',
                'js_content' => '',
                'sort_order' => 2,
                'is_active' => true,
            ],

            [
                'name' => 'История компании',
                'type' => 'about',
                'category' => 'О компании',
                'description' => 'Временная шкала истории компании',
                'html_content' => '
<section class="about-history py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Наша история</h2>
            <p class="lead text-muted">Путь развития компании с момента основания</p>
        </div>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-marker bg-dark"></div>
                <div class="timeline-content">
                    <h5 class="fw-bold">2019 - Основание</h5>
                    <p>Компания была основана командой энтузиастов веб-разработки с целью создания качественных цифровых решений.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-marker bg-dark"></div>
                <div class="timeline-content">
                    <h5 class="fw-bold">2020 - Первые проекты</h5>
                    <p>Реализация первых крупных проектов для местных предприятий. Формирование основных принципов работы.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-marker bg-dark"></div>
                <div class="timeline-content">
                    <h5 class="fw-bold">2022 - Расширение</h5>
                    <p>Увеличение команды до 15 человек. Начало работы с крупными федеральными клиентами.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-marker bg-dark"></div>
                <div class="timeline-content">
                    <h5 class="fw-bold">2024 - Сегодня</h5>
                    <p>Более 200 успешных проектов, команда из 25 профессионалов, офисы в 3 городах.</p>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.about-history {
    background-color: #fff;
}

.about-history h2 {
    color: #000;
    font-weight: bold;
}

.about-history .lead {
    color: #666;
}

.about-history .timeline {
    position: relative;
    padding-left: 30px;
}

.about-history .timeline::before {
    content: "";
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background-color: #000;
}

.about-history .timeline-item {
    position: relative;
    margin-bottom: 2rem;
    padding-left: 30px;
}

.about-history .timeline-marker {
    position: absolute;
    left: -37px;
    top: 5px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #000 !important;
    border: 3px solid #fff;
    box-shadow: 0 0 0 2px #000;
}

.about-history .timeline-content h5 {
    color: #000;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.about-history .timeline-content p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 0;
}',
                'js_content' => '',
                'sort_order' => 3,
                'is_active' => true,
            ],

            [
                'name' => 'Ценности компании',
                'type' => 'about',
                'category' => 'О компании',
                'description' => 'Корпоративные ценности и принципы',
                'html_content' => '
<section class="about-values py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Наши ценности</h2>
            <p class="lead text-muted">Принципы, которыми мы руководствуемся в работе</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center bg-white p-4 h-100">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-trophy" style="font-size: 60px; color: #000;"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Качество</h5>
                    <p>Мы никогда не идем на компромиссы в вопросах качества. Каждый проект проходит тщательную проверку.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center bg-white p-4 h-100">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-clock" style="font-size: 60px; color: #000;"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Пунктуальность</h5>
                    <p>Соблюдение сроков - основа успешного сотрудничества. Мы всегда выполняем обязательства вовремя.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="value-card text-center bg-white p-4 h-100">
                    <div class="icon-wrapper mb-3">
                        <i class="fas fa-lightbulb" style="font-size: 60px; color: #000;"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Инновации</h5>
                    <p>Мы постоянно изучаем новые технологии и подходы, чтобы предлагать самые современные решения.</p>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.about-values {
    background-color: #f8f8f8 !important;
}

.about-values h2 {
    color: #000;
    font-weight: bold;
}

.about-values .lead {
    color: #666;
}

.about-values .value-card {
    background-color: #fff !important; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.about-values .value-card:hover {
    transform: translateY(-10px);
    border-color: #333;
}

.about-values .icon-wrapper {
    padding: 1rem;
    transition: all 0.3s ease;
}

.about-values .value-card:hover .icon-wrapper {
    transform: scale(1.1);
}

.about-values .value-card h5 {
    color: #000;
    font-weight: bold;
}

.about-values .value-card p {
    color: #666;
    line-height: 1.6;
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
