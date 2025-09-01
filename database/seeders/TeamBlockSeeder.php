<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;

class TeamBlockSeeder extends Seeder
{
    public function run(): void
    {
        $blocks = [
            [
                'name' => 'Классическая команда',
                'type' => 'team',
                'category' => 'Команда',
                'description' => 'Простое представление команды с фотографиями',
                'html_content' => '
<section class="team-classic py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Наша команда</h2>
                <p class="lead text-muted">Профессионалы, которые создают ваш успех</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://via.placeholder.com/300x300" alt="Александр Иванов" class="img-fluid">
                        <div class="member-overlay">
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-telegram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="member-info">
                        <h5>Александр Иванов</h5>
                        <p class="member-position">Lead Developer</p>
                        <p class="member-description">Опыт разработки более 8 лет. Специализируется на backend-разработке и архитектуре проектов.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://via.placeholder.com/300x300" alt="Мария Петрова" class="img-fluid">
                        <div class="member-overlay">
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-behance"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="member-info">
                        <h5>Мария Петрова</h5>
                        <p class="member-position">UI/UX Designer</p>
                        <p class="member-description">Создает интуитивно понятные интерфейсы. Экспертиза в области пользовательского опыта.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://via.placeholder.com/300x300" alt="Дмитрий Сидоров" class="img-fluid">
                        <div class="member-overlay">
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-telegram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-codepen"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="member-info">
                        <h5>Дмитрий Сидоров</h5>
                        <p class="member-position">Frontend Developer</p>
                        <p class="member-description">Специалист по React и Vue.js. Создает отзывчивые и интерактивные интерфейсы.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="team-member">
                    <div class="member-photo">
                        <img src="https://via.placeholder.com/300x300" alt="Анна Козлова" class="img-fluid">
                        <div class="member-overlay">
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-odnoklassniki"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-vk"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="member-info">
                        <h5>Анна Козлова</h5>
                        <p class="member-position">Project Manager</p>
                        <p class="member-description">Обеспечивает своевременное выполнение проектов и качественную коммуникацию с клиентами.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.team-classic {
    background-color: #f8f9fa;
}

.team-classic h2 {
    color: #212529;
    font-weight: bold;
}

.team-classic .lead {
    color: #6c757d;
}

.team-member {
    text-align: center;
    background: white;
    border-radius: 15px;
    padding: 2rem 1.5rem;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.team-member:hover {
    transform: translateY(-10px);
}

.member-photo {
    position: relative;
    margin-bottom: 25px;
    border-radius: 15px;
    overflow: hidden;
}

.member-photo img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: all 0.3s ease;
}

.member-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.member-photo:hover .member-overlay {
    opacity: 1;
}

.member-photo:hover img {
    transform: scale(1.1);
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-link {
    width: 45px;
    height: 45px;
    background: white;
    color: #212529;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: #007bff;
    color: white;
    transform: translateY(-3px);
}

.member-info h5 {
    margin-bottom: 8px;
    font-weight: bold;
    color: #212529;
}

.member-position {
    color: #007bff;
    font-weight: 600;
    margin-bottom: 15px;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 1px;
}

.member-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 0;
}

.member-photo {
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
}

.member-photo:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}',
                'js_content' => '',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Команда с навыками',
                'type' => 'team',
                'category' => 'Команда',
                'description' => 'Представление команды с указанием навыков и прогресс-барами',
                'html_content' => '
<section class="team-skills py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Экспертная команда</h2>
                <p class="lead text-muted">Профессионалы с подтвержденными навыками</p>
            </div>
        </div>
        
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="team-member-detailed">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="member-avatar">
                                <img src="https://via.placeholder.com/200x200" alt="Сергей Новиков" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="member-details">
                                <h4>Сергей Новиков</h4>
                                <p class="member-role">Senior Full-Stack Developer</p>
                                <p class="member-bio">7+ лет опыта в разработке веб-приложений. Специализируется на современных технологиях и архитектурных решениях.</p>
                                
                                <div class="skills-section">
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>PHP/Laravel</span>
                                            <span>95%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 95%"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>JavaScript/React</span>
                                            <span>90%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 90%"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>MySQL/PostgreSQL</span>
                                            <span>85%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 85%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="team-member-detailed">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="member-avatar">
                                <img src="https://via.placeholder.com/200x200" alt="Елена Васильева" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="member-details">
                                <h4>Елена Васильева</h4>
                                <p class="member-role">Senior UX/UI Designer</p>
                                <p class="member-bio">Создает пользовательские интерфейсы, которые конвертируют. Опыт работы с крупными e-commerce проектами.</p>
                                
                                <div class="skills-section">
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>Figma/Sketch</span>
                                            <span>98%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 98%"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>Adobe Creative Suite</span>
                                            <span>92%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 92%"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>Prototyping</span>
                                            <span>88%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 88%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="team-member-detailed">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="member-avatar">
                                <img src="https://via.placeholder.com/200x200" alt="Игорь Романов" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="member-details">
                                <h4>Игорь Романов</h4>
                                <p class="member-role">DevOps Engineer</p>
                                <p class="member-bio">Обеспечивает надежную инфраструктуру и непрерывную интеграцию. Эксперт по облачным технологиям.</p>
                                
                                <div class="skills-section">
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>AWS/Azure</span>
                                            <span>93%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 93%"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>Docker/K8s</span>
                                            <span>89%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 89%"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>CI/CD</span>
                                            <span>91%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 91%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="team-member-detailed">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="member-avatar">
                                <img src="https://via.placeholder.com/200x200" alt="Татьяна Морозова" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="member-details">
                                <h4>Татьяна Морозова</h4>
                                <p class="member-role">QA Engineer</p>
                                <p class="member-bio">Гарантирует высокое качество продукта. Специализируется на автоматизированном тестировании.</p>
                                
                                <div class="skills-section">
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>Test Automation</span>
                                            <span>94%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 94%"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>Selenium/Cypress</span>
                                            <span>87%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 87%"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-info">
                                            <span>Performance Testing</span>
                                            <span>90%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 90%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.team-skills {
    background: #fff;
}

.team-skills h2 {
    color: #212529;
    font-weight: bold;
}

.team-skills .lead {
    color: #6c757d;
}

.team-member-detailed {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
}

.team-member-detailed:hover {
    transform: translateY(-5px);
}

.member-avatar img {
    width: 100%;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.member-details h4 {
    color: #212529;
    font-weight: bold;
    margin-bottom: 8px;
}

.member-role {
    color: #007bff;
    font-weight: 600;
    font-size: 16px;
    margin-bottom: 15px;
}

.member-bio {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 25px;
}

.skills-section {
    margin-top: 20px;
}

.skill-item {
    margin-bottom: 20px;
}

.skill-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 8px;
    font-weight: 600;
    color: #212529;
}

.skill-bar {
    height: 8px;
    background: #e9ecef;
    border-radius: 4px;
    overflow: hidden;
}

.skill-progress {
    height: 100%;
    background: linear-gradient(90deg, #007bff, #0056b3);
    border-radius: 4px;
    transition: width 2s ease;
}',
                'js_content' => '
document.addEventListener("DOMContentLoaded", function() {
    // Анимация прогресс-баров при скролле
    const skillBars = document.querySelectorAll(".skill-progress");
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const progressBar = entry.target;
                const width = progressBar.style.width;
                progressBar.style.width = "0%";
                setTimeout(() => {
                    progressBar.style.width = width;
                }, 100);
            }
        });
    }, { threshold: 0.5 });
    
    skillBars.forEach(bar => {
        observer.observe(bar);
    });
});',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Команда с достижениями',
                'type' => 'team',
                'category' => 'Команда',
                'description' => 'Представление команды с наградами и достижениями',
                'html_content' => '
<section class="team-achievements py-5 bg-dark text-white">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold">Команда профессионалов</h2>
                <p class="lead">Наши эксперты с международными сертификациями</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="achievement-member">
                    <div class="member-card">
                        <div class="member-image">
                            <img src="https://via.placeholder.com/250x250" alt="Владимир Кузнецов" class="img-fluid">
                            <div class="achievement-badge">
                                <i class="fas fa-medal"></i>
                            </div>
                        </div>
                        <div class="member-content">
                            <h4>Владимир Кузнецов</h4>
                            <p class="member-title">Senior Solutions Architect</p>
                            <p class="member-experience">12+ лет опыта</p>
                            
                            <div class="achievements">
                                <div class="achievement-item">
                                    <i class="fab fa-aws"></i>
                                    <span>AWS Solutions Architect</span>
                                </div>
                                <div class="achievement-item">
                                    <i class="fab fa-google"></i>
                                    <span>Google Cloud Professional</span>
                                </div>
                                <div class="achievement-item">
                                    <i class="fas fa-trophy"></i>
                                    <span>Best Developer 2023</span>
                                </div>
                            </div>
                            
                            <div class="member-stats">
                                <div class="stat">
                                    <span class="stat-number">150+</span>
                                    <span class="stat-label">Проектов</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number">98%</span>
                                    <span class="stat-label">Успешность</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="achievement-member">
                    <div class="member-card">
                        <div class="member-image">
                            <img src="https://via.placeholder.com/250x250" alt="Ольга Смирнова" class="img-fluid">
                            <div class="achievement-badge">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="member-content">
                            <h4>Ольга Смирнова</h4>
                            <p class="member-title">Lead UX Researcher</p>
                            <p class="member-experience">9+ лет опыта</p>
                            
                            <div class="achievements">
                                <div class="achievement-item">
                                    <i class="fab fa-google"></i>
                                    <span>Google UX Design Certificate</span>
                                </div>
                                <div class="achievement-item">
                                    <i class="fas fa-palette"></i>
                                    <span>Design Excellence Award</span>
                                </div>
                                <div class="achievement-item">
                                    <i class="fas fa-users"></i>
                                    <span>UX Research Expert</span>
                                </div>
                            </div>
                            
                            <div class="member-stats">
                                <div class="stat">
                                    <span class="stat-number">200+</span>
                                    <span class="stat-label">Исследований</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number">95%</span>
                                    <span class="stat-label">Конверсия</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="achievement-member">
                    <div class="member-card">
                        <div class="member-image">
                            <img src="https://via.placeholder.com/250x250" alt="Максим Федоров" class="img-fluid">
                            <div class="achievement-badge">
                                <i class="fas fa-certificate"></i>
                            </div>
                        </div>
                        <div class="member-content">
                            <h4>Максим Федоров</h4>
                            <p class="member-title">Security Expert</p>
                            <p class="member-experience">10+ лет опыта</p>
                            
                            <div class="achievements">
                                <div class="achievement-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>CISSP Certified</span>
                                </div>
                                <div class="achievement-item">
                                    <i class="fas fa-lock"></i>
                                    <span>Ethical Hacker (CEH)</span>
                                </div>
                                <div class="achievement-item">
                                    <i class="fas fa-bug"></i>
                                    <span>Penetration Testing Expert</span>
                                </div>
                            </div>
                            
                            <div class="member-stats">
                                <div class="stat">
                                    <span class="stat-number">500+</span>
                                    <span class="stat-label">Аудитов</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number">99.9%</span>
                                    <span class="stat-label">Защищенность</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>',
                'css_content' => '
.team-achievements {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
}

.team-achievements h2 {
    color: white;
    font-weight: bold;
}

.team-achievements .lead {
    color: rgba(255, 255, 255, 0.8);
}

.achievement-member {
    height: 100%;
}

.member-card {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 30px;
    text-align: center;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
    height: 100%;
}

.member-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
}

.member-image {
    position: relative;
    margin-bottom: 25px;
    display: inline-block;
}

.member-image img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid rgba(255, 255, 255, 0.3);
}

.achievement-badge {
    position: absolute;
    top: -10px;
    right: -10px;
    width: 40px;
    height: 40px;
    background: #ffc107;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #212529;
    font-size: 18px;
}

.member-content h4 {
    color: white;
    font-weight: bold;
    margin-bottom: 8px;
}

.member-title {
    color: #3498db;
    font-weight: 600;
    margin-bottom: 5px;
}

.member-experience {
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
    margin-bottom: 25px;
}

.achievements {
    margin-bottom: 25px;
}

.achievement-item {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    padding: 8px 12px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.9);
}

.achievement-item i {
    margin-right: 8px;
    color: #3498db;
}

.member-stats {
    display: flex;
    justify-content: space-around;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    padding-top: 20px;
}

.stat {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 24px;
    font-weight: bold;
    color: #3498db;
}

.stat-label {
    font-size: 12px;
    color: rgba(255, 255, 255, 0.7);
    text-transform: uppercase;
    letter-spacing: 1px;
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
