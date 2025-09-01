<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Template;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Классический черно-белый',
                'description' => 'Профессиональный черно-белый стиль',
                'css_framework' => 'bootstrap',
                'color_scheme' => json_encode([
                    'primary' => '#000000',
                    'secondary' => '#666666',
                    'background' => '#ffffff',
                    'text' => '#000000'
                ]),
                'custom_css' => '
/* Классический черно-белый стиль */
:root {
    --primary-color: #000000;
    --secondary-color: #666666;
    --light-gray: #f5f5f5;
    --dark-gray: #333333;
    --text-color: #000000;
    --bg-color: #ffffff;
}

body {
    font-family: "Arial", "Helvetica", sans-serif;
    color: var(--text-color);
    background-color: var(--bg-color);
}

.navbar {
    background-color: var(--bg-color) !important;
    border-bottom: 2px solid var(--primary-color);
    box-shadow: none;
}

.navbar-brand, .nav-link {
    color: var(--text-color) !important;
}

.nav-link:hover {
    color: var(--secondary-color) !important;
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    border: 2px solid var(--primary-color);
}

.btn-primary:hover {
    background-color: white;
    color: var(--primary-color);
    border-color: var(--primary-color);
}

.btn-secondary {
    background-color: white;
    border-color: var(--secondary-color);
    color: var(--secondary-color);
    border: 2px solid var(--secondary-color);
}

.btn-secondary:hover {
    background-color: var(--secondary-color);
    color: white;
}

.card {
    border: 2px solid var(--secondary-color);
    box-shadow: none;
    background-color: white;
    color: var(--text-color);
}

.card:hover {
    border-color: var(--primary-color);
}

.bg-primary {
    background-color: var(--primary-color) !important;
    color: white !important;
}

.bg-light {
    background-color: var(--light-gray) !important;
    color: var(--text-color) !important;
}

.bg-dark {
    background-color: var(--dark-gray) !important;
    color: white !important;
}

.text-white {
    color: white !important;
}

.text-dark {
    color: var(--text-color) !important;
}

h1, h2, h3, h4, h5, h6 {
    color: var(--text-color);
}

.navbar-dark .navbar-brand,
.navbar-dark .nav-link {
    color: white !important;
}
                ',
                'is_active' => true,
            ],
            [
                'name' => 'Минималистичный серый',
                'description' => 'Элегантный серо-белый дизайн',
                'css_framework' => 'bootstrap',
                'color_scheme' => json_encode([
                    'primary' => '#333333',
                    'secondary' => '#888888',
                    'background' => '#ffffff',
                    'text' => '#333333'
                ]),
                'custom_css' => '
/* Минималистичный серый стиль */
:root {
    --primary-color: #333333;
    --secondary-color: #888888;
    --light-gray: #f8f8f8;
    --medium-gray: #dddddd;
    --text-color: #333333;
    --bg-color: #ffffff;
}

body {
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    color: var(--text-color);
    background-color: var(--bg-color);
    line-height: 1.6;
}

.navbar {
    background-color: var(--bg-color) !important;
    border-bottom: 1px solid var(--medium-gray);
    box-shadow: none;
}

.navbar-brand, .nav-link {
    color: var(--text-color) !important;
}

.nav-link:hover {
    color: var(--primary-color) !important;
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    border: 1px solid var(--primary-color);
}

.btn-primary:hover {
    background-color: var(--secondary-color);
    border-color: var(--secondary-color);
}

.btn-secondary {
    background-color: white;
    border-color: var(--secondary-color);
    color: var(--secondary-color);
    border: 1px solid var(--secondary-color);
}

.btn-secondary:hover {
    background-color: var(--secondary-color);
    color: white;
}

.card {
    border: 1px solid var(--medium-gray);
    box-shadow: none;
    background-color: white;
    color: var(--text-color);
}

.card:hover {
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.bg-primary {
    background-color: var(--primary-color) !important;
    color: white !important;
}

.bg-light {
    background-color: var(--light-gray) !important;
    color: var(--text-color) !important;
}

.bg-dark {
    background-color: var(--primary-color) !important;
    color: white !important;
}

.text-white {
    color: white !important;
}

.text-dark {
    color: var(--text-color) !important;
}

h1, h2, h3, h4, h5, h6 {
    color: var(--text-color);
    font-weight: 600;
}

.navbar-dark .navbar-brand,
.navbar-dark .nav-link {
    color: white !important;
}
                ',
                'is_active' => true,
            ],
            [
                'name' => 'Контрастный черно-белый',
                'description' => 'Высококонтрастный черно-белый дизайн',
                'css_framework' => 'bootstrap',
                'color_scheme' => json_encode([
                    'primary' => '#000000',
                    'secondary' => '#ffffff',
                    'background' => '#ffffff',
                    'text' => '#000000'
                ]),
                'custom_css' => '
/* Контрастный черно-белый стиль */
:root {
    --primary-color: #000000;
    --secondary-color: #ffffff;
    --gray-color: #808080;
    --light-gray: #f0f0f0;
    --text-color: #000000;
    --bg-color: #ffffff;
}

body {
    font-family: "Arial", "Helvetica", sans-serif;
    color: var(--text-color);
    background-color: var(--bg-color);
    font-weight: 500;
}

.navbar {
    background-color: var(--bg-color) !important;
    border-bottom: 3px solid var(--primary-color);
    box-shadow: none;
}

.navbar-brand, .nav-link {
    color: var(--text-color) !important;
    font-weight: bold;
}

.nav-link:hover {
    color: var(--gray-color) !important;
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
    border: 3px solid var(--primary-color);
    font-weight: bold;
}

.btn-primary:hover {
    background-color: white;
    color: var(--primary-color);
    border-color: var(--primary-color);
}

.btn-secondary {
    background-color: white;
    border-color: var(--primary-color);
    color: var(--primary-color);
    border: 3px solid var(--primary-color);
    font-weight: bold;
}

.btn-secondary:hover {
    background-color: var(--primary-color);
    color: white;
}

.card {
    border: 3px solid var(--primary-color);
    box-shadow: none;
    background-color: white;
    color: var(--text-color);
}

.card:hover {
    background-color: var(--light-gray);
}

.bg-primary {
    background-color: var(--primary-color) !important;
    color: white !important;
}

.bg-light {
    background-color: var(--light-gray) !important;
    color: var(--text-color) !important;
}

.bg-dark {
    background-color: var(--primary-color) !important;
    color: white !important;
}

.text-white {
    color: white !important;
}

.text-dark {
    color: var(--text-color) !important;
}

h1, h2, h3, h4, h5, h6 {
    color: var(--text-color);
    font-weight: bold;
}

.navbar-dark .navbar-brand,
.navbar-dark .nav-link {
    color: white !important;
}
                ',
                'is_active' => true,
            ]
        ];

        foreach ($templates as $template) {
            Template::create($template);
        }
    }
}
