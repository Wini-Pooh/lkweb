@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Редактирование блока: {{ $block->name }}</h2>
                <div>
                    <a href="{{ route('blocks.preview', $block) }}" class="btn btn-info" target="_blank">
                        <i class="fas fa-external-link-alt"></i> Предпросмотр
                    </a>
                    <a href="{{ route('blocks.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Назад к списку
                    </a>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('blocks.update', $block) }}">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Основная информация</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Название блока <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               class="form-control @error('name') is-invalid @enderror" 
                                               id="name" 
                                               name="name" 
                                               value="{{ old('name', $block->name) }}" 
                                               required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="type" class="form-label">Тип блока <span class="text-danger">*</span></label>
                                        <select class="form-select @error('type') is-invalid @enderror" 
                                                id="type" 
                                                name="type" 
                                                required>
                                            <option value="">Выберите тип</option>
                                            <option value="header" {{ old('type', $block->type) == 'header' ? 'selected' : '' }}>Header (Шапка)</option>
                                            <option value="hero" {{ old('type', $block->type) == 'hero' ? 'selected' : '' }}>Hero (Главный баннер)</option>
                                            <option value="features" {{ old('type', $block->type) == 'features' ? 'selected' : '' }}>Features (Возможности)</option>
                                            <option value="services" {{ old('type', $block->type) == 'services' ? 'selected' : '' }}>Services (Услуги)</option>
                                            <option value="about" {{ old('type', $block->type) == 'about' ? 'selected' : '' }}>About (О нас)</option>
                                            <option value="contact" {{ old('type', $block->type) == 'contact' ? 'selected' : '' }}>Contact (Контакты)</option>
                                            <option value="cta" {{ old('type', $block->type) == 'cta' ? 'selected' : '' }}>CTA (Призыв к действию)</option>
                                            <option value="footer" {{ old('type', $block->type) == 'footer' ? 'selected' : '' }}>Footer (Подвал)</option>
                                            <option value="content" {{ old('type', $block->type) == 'content' ? 'selected' : '' }}>Content (Контент)</option>
                                            <option value="gallery" {{ old('type', $block->type) == 'gallery' ? 'selected' : '' }}>Gallery (Галерея)</option>
                                            <option value="testimonials" {{ old('type', $block->type) == 'testimonials' ? 'selected' : '' }}>Testimonials (Отзывы)</option>
                                            <option value="pricing" {{ old('type', $block->type) == 'pricing' ? 'selected' : '' }}>Pricing (Цены)</option>
                                            <option value="team" {{ old('type', $block->type) == 'team' ? 'selected' : '' }}>Team (Команда)</option>
                                            <option value="blog" {{ old('type', $block->type) == 'blog' ? 'selected' : '' }}>Blog (Блог)</option>
                                            <option value="other" {{ old('type', $block->type) == 'other' ? 'selected' : '' }}>Other (Другое)</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category" class="form-label">Категория <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <select class="form-select @error('category') is-invalid @enderror" 
                                                    id="category_select" 
                                                    name="category_select">
                                                <option value="">Выберите или создайте категорию</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category }}" {{ old('category', $block->category) == $category ? 'selected' : '' }}>
                                                        {{ $category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-outline-secondary" type="button" id="newCategoryBtn">
                                                Новая
                                            </button>
                                        </div>
                                        <input type="text" 
                                               class="form-control mt-2 @error('category') is-invalid @enderror" 
                                               id="category" 
                                               name="category" 
                                               value="{{ old('category', $block->category) }}" 
                                               placeholder="Введите новую категорию"
                                               style="display: none;"
                                               required>
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="sort_order" class="form-label">Порядок сортировки</label>
                                        <input type="number" 
                                               class="form-control @error('sort_order') is-invalid @enderror" 
                                               id="sort_order" 
                                               name="sort_order" 
                                               value="{{ old('sort_order', $block->sort_order) }}" 
                                               min="0">
                                        @error('sort_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Описание</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="3">{{ old('description', $block->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- HTML контент -->
                        <div class="card mt-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">HTML контент <span class="text-danger">*</span></h5>
                                <button type="button" class="btn btn-sm btn-outline-info" onclick="previewCode()">
                                    <i class="fas fa-eye"></i> Предпросмотр
                                </button>
                            </div>
                            <div class="card-body">
                                <textarea class="form-control @error('html_content') is-invalid @enderror" 
                                          id="html_content" 
                                          name="html_content" 
                                          rows="15" 
                                          required>{{ old('html_content', $block->html_content) }}</textarea>
                                @error('html_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Введите HTML код блока. Используйте Bootstrap классы для стилизации.
                                </small>
                            </div>
                        </div>

                        <!-- CSS контент -->
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">CSS стили</h5>
                            </div>
                            <div class="card-body">
                                <textarea class="form-control @error('css_content') is-invalid @enderror" 
                                          id="css_content" 
                                          name="css_content" 
                                          rows="10">{{ old('css_content', $block->css_content) }}</textarea>
                                @error('css_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Дополнительные CSS стили для блока (необязательно).
                                </small>
                            </div>
                        </div>

                        <!-- JavaScript контент -->
                        <div class="card mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">JavaScript код</h5>
                            </div>
                            <div class="card-body">
                                <textarea class="form-control @error('js_content') is-invalid @enderror" 
                                          id="js_content" 
                                          name="js_content" 
                                          rows="8">{{ old('js_content', $block->js_content) }}</textarea>
                                @error('js_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    JavaScript код для блока (необязательно).
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card sticky-top">
                            <div class="card-header">
                                <h5 class="mb-0">Настройки</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="is_active" 
                                           name="is_active" 
                                           {{ old('is_active', $block->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Активен
                                    </label>
                                </div>
                                <small class="form-text text-muted">
                                    Активные блоки доступны для использования в конструкторе.
                                </small>

                                <hr>

                                <div class="text-muted small">
                                    <div><strong>Создан:</strong> {{ $block->created_at->format('d.m.Y H:i') }}</div>
                                    <div><strong>Обновлён:</strong> {{ $block->updated_at->format('d.m.Y H:i') }}</div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Сохранить изменения
                                    </button>
                                    <a href="{{ route('blocks.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> Отмена
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Модальное окно предпросмотра -->
<div class="modal fade" id="previewModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Предпросмотр блока</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <iframe id="previewFrame" style="width: 100%; height: 500px; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('category_select');
    const categoryInput = document.getElementById('category');
    const newCategoryBtn = document.getElementById('newCategoryBtn');

    // Инициализация - если категория не в списке, показать input
    if (categorySelect.value === '' && categoryInput.value !== '') {
        categoryInput.style.display = 'block';
        categorySelect.style.display = 'none';
        categoryInput.required = true;
        categorySelect.required = false;
        newCategoryBtn.textContent = 'Выбрать';
    }

    // Переключение между выбором существующей и созданием новой категории
    newCategoryBtn.addEventListener('click', function() {
        if (categoryInput.style.display === 'none') {
            categoryInput.style.display = 'block';
            categorySelect.style.display = 'none';
            categoryInput.required = true;
            categorySelect.required = false;
            newCategoryBtn.textContent = 'Выбрать';
        } else {
            categoryInput.style.display = 'none';
            categorySelect.style.display = 'block';
            categoryInput.required = false;
            categorySelect.required = true;
            newCategoryBtn.textContent = 'Новая';
        }
    });

    // Синхронизация значений
    categorySelect.addEventListener('change', function() {
        if (this.value) {
            categoryInput.value = this.value;
        }
    });

    categoryInput.addEventListener('input', function() {
        categorySelect.value = '';
    });
});

function previewCode() {
    const htmlContent = document.getElementById('html_content').value;
    const cssContent = document.getElementById('css_content').value;
    const jsContent = document.getElementById('js_content').value;

    if (!htmlContent.trim()) {
        alert('Введите HTML контент для предпросмотра');
        return;
    }

    const previewHtml = `
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Предпросмотр блока</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
            ${cssContent}
        </style>
    </head>
    <body>
        ${htmlContent}
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        ${jsContent ? `<script>${jsContent}</script>` : ''}
    </body>
    </html>`;

    const previewFrame = document.getElementById('previewFrame');
    const blob = new Blob([previewHtml], { type: 'text/html' });
    const url = URL.createObjectURL(blob);
    previewFrame.src = url;

    const modal = new bootstrap.Modal(document.getElementById('previewModal'));
    modal.show();
}
</script>
@endpush
