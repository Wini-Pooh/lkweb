<?php

/**
 * Дополнительные CSS стили для улучшения визуализации блоков
 * Этот файл содержит общие улучшения, которые можно применить ко всем блокам
 */

class GlobalBlockStylesImprover
{
    /**
     * Возвращает улучшенные CSS стили для всех типов блоков
     */
    public static function getImprovedStyles()
    {
        return '
/* ========================================
   ГЛОБАЛЬНЫЕ УЛУЧШЕНИЯ ДЛЯ ВСЕХ БЛОКОВ
   ======================================== */

/* Общие стили для контейнеров */
.container, .container-fluid {
    position: relative;
}

/* Улучшенные карточки */
.card, .service-card, .pricing-card, .team-member, .gallery-item, 
.testimonial-card, .contact-form, .info-item, .process-step,
.faq-item, .cta-form-container, .about-image, .company-stats {
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
}

.card:hover, .service-card:hover, .pricing-card:hover, .team-member:hover,
.gallery-item:hover, .testimonial-card:hover, .info-item:hover,
.process-step:hover, .faq-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    border-color: #dee2e6;
}

/* Улучшенные кнопки */
.btn {
    border-radius: 8px;
    font-weight: 500;
    padding: 12px 24px;
    transition: all 0.3s ease;
    border-width: 2px;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.btn-primary {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    border-color: #007bff;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
    border-color: #0056b3;
}

.btn-outline-primary:hover {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
}

/* Улучшенные формы */
.form-control, .form-select {
    border-radius: 8px;
    border: 1px solid #e9ecef;
    padding: 12px 15px;
    transition: all 0.3s ease;
    background-color: #fff;
}

.form-control:focus, .form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    transform: scale(1.02);
}

/* Улучшенные заголовки с подчеркиванием */
h1, h2, h3, h4, h5, h6 {
    font-weight: 600;
    line-height: 1.2;
    position: relative;
}

h1::after, h2::after {
    content: "";
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 3px;
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    border-radius: 2px;
}

/* Улучшенные изображения */
img {
    border-radius: 8px;
    transition: transform 0.3s ease;
}

img:hover {
    transform: scale(1.05);
}

/* Улучшенные иконки */
.fas, .fab {
    transition: all 0.3s ease;
}

.fas:hover, .fab:hover {
    transform: scale(1.1);
}

/* Улучшенные списки */
.list-unstyled li {
    padding: 8px 0;
    border-bottom: 1px solid #f8f9fa;
    transition: background-color 0.3s ease;
}

.list-unstyled li:hover {
    background-color: #f8f9fa;
    padding-left: 10px;
}

/* Улучшенные навигационные элементы */
.nav-link {
    border-radius: 6px;
    transition: all 0.3s ease;
}

.nav-link:hover {
    background-color: rgba(0, 123, 255, 0.1);
    transform: translateY(-1px);
}

/* Улучшенные статистические блоки */
.stat-item {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 2rem 1rem;
    text-align: center;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-item::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
}

.stat-item:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

/* Улучшенные аккордеоны */
.accordion-item {
    border: 1px solid #e9ecef;
    border-radius: 12px !important;
    margin-bottom: 15px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.accordion-button {
    background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
    border: none;
    padding: 20px 25px;
    font-weight: 600;
    border-radius: 12px !important;
    transition: all 0.3s ease;
}

.accordion-button:not(.collapsed) {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    color: white;
}

.accordion-button:hover {
    transform: translateX(5px);
}

/* Улучшенные галереи */
.gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
}

.gallery-overlay {
    background: linear-gradient(135deg, rgba(0, 123, 255, 0.9) 0%, rgba(0, 86, 179, 0.9) 100%);
    transition: all 0.3s ease;
}

/* Улучшенные социальные ссылки */
.social-link, .social-links a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #f8f9fa;
    border: 2px solid #e9ecef;
    color: #495057;
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-link:hover, .social-links a:hover {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
    color: white;
    transform: translateY(-3px) scale(1.1);
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
}

/* Улучшенные цитаты и отзывы */
.testimonial-text {
    position: relative;
    font-style: italic;
    padding: 20px;
}

.testimonial-text::before {
    content: """;
    font-size: 4rem;
    color: #007bff;
    position: absolute;
    top: -10px;
    left: 0;
    font-family: Georgia, serif;
}

/* Улучшенные ценовые блоки */
.pricing-card.popular {
    background: linear-gradient(135deg, #fff 0%, #f0f8ff 100%);
    border: 2px solid #007bff;
    transform: scale(1.05);
}

.pricing-price {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 12px;
    padding: 20px;
    margin: 15px 0;
}

/* Адаптивные улучшения */
@media (max-width: 768px) {
    .card, .service-card, .pricing-card, .team-member, .gallery-item {
        margin-bottom: 20px;
    }
    
    .btn {
        width: 100%;
        margin-bottom: 10px;
    }
    
    h1::after, h2::after {
        width: 30px;
    }
}

/* Анимации при загрузке */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.card, .service-card, .pricing-card, .team-member {
    animation: fadeInUp 0.6s ease forwards;
}

/* Стили для темных секций */
.bg-dark {
    background: linear-gradient(135deg, #212529 0%, #343a40 100%) !important;
}

.bg-primary {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important;
}';
    }
    
    /**
     * Применяет улучшенные стили к блоку
     */
    public static function applyToBlock($cssContent)
    {
        $improvedStyles = self::getImprovedStyles();
        return $cssContent . "\n\n" . $improvedStyles;
    }
}

// Пример использования:
// $improvedCss = GlobalBlockStylesImprover::applyToBlock($originalCss);
