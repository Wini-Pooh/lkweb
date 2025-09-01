@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Левая панель с настройками -->
        <div class="col-md-3 bg-light p-4" style="height: 100vh; overflow-y: auto;">
            <h4 class="mb-4">
                <i class="fas fa-hammer me-2"></i>Конструктор сайтов
            </h4>
            
            <form id="site-builder-form">
                @csrf
                
                <!-- Основные настройки -->
                <div class="card mb-3 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0"><i class="fas fa-cog me-2"></i>Основные настройки</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="site_name" class="form-label">Название сайта</label>
                            <input type="text" class="form-control" id="site_name" name="site_name" 
                                   placeholder="Мой супер сайт" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="domain" class="form-label">Домен (опционально)</label>
                            <input type="text" class="form-control" id="domain" name="domain" 
                                   placeholder="example.com">
                        </div>
                    </div>
                </div>

                <!-- Выбор шаблона -->
                <div class="card mb-3 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h6 class="mb-0"><i class="fas fa-palette me-2"></i>Выбор стиля</h6>
                    </div>
                    <div class="card-body">
                        @foreach($templates as $template)
                        <div class="template-option mb-2 p-2 border rounded" data-template="{{ $template->id }}">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="template_id" 
                                       id="template_{{ $template->id }}" value="{{ $template->id }}" required>
                                <label class="form-check-label w-100" for="template_{{ $template->id }}">
                                    <strong>{{ $template->name }}</strong>
                                    @if($template->description)
                                    <br><small class="text-muted">{{ $template->description }}</small>
                                    @endif
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Выбранные блоки -->
                <div class="card mb-3 shadow-sm">
                    <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0"><i class="fas fa-list me-2"></i>Выбранные блоки</h6>
                        <span class="badge bg-light text-dark" id="selected-count">0</span>
                    </div>
                    <div class="card-body">
                        <div id="selected-blocks-container" class="sortable-container">
                            <p class="text-muted text-center mb-0" id="no-blocks-message">
                                <i class="fas fa-info-circle me-2"></i>Выберите блоки из категорий ниже
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Категории блоков -->
                <div class="card mb-3 shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h6 class="mb-0"><i class="fas fa-cube me-2"></i>Добавить блоки</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            @foreach($blocksByCategory as $category => $blocks)
                            <div class="col-12">
                                <button type="button" class="btn btn-outline-primary w-100 d-flex justify-content-between align-items-center category-btn" 
                                        data-bs-toggle="modal" data-bs-target="#blocksModal" 
                                        data-category="{{ $category }}">
                                    <span>
                                        <i class="fas fa-cube me-2"></i>{{ $category }}
                                    </span>
                                    <span class="badge bg-primary">{{ $blocks->count() }}</span>
                                </button>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Скрытые поля для выбранных блоков -->
                <div id="hidden-blocks-inputs"></div>

                <!-- Кнопки действий -->
                <div class="d-grid gap-2 mt-4">
                    <button type="button" class="btn btn-outline-primary" id="preview-btn">
                        <i class="fas fa-eye me-2"></i>Предпросмотр
                    </button>
                    <button type="submit" class="btn btn-success" id="build-btn">
                        <i class="fas fa-download me-2"></i>Собрать сайт
                    </button>
                </div>
            </form>
        </div>

        <!-- Правая панель с предпросмотром -->
        <div class="col-md-9 p-0">
            <div class="bg-dark text-white p-3 d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0"><i class="fas fa-desktop me-2"></i>Предпросмотр сайта</h6>
                </div>
                <div class="btn-group" role="group">
                    <button class="btn btn-sm btn-outline-light active" id="desktop-view">
                        <i class="fas fa-desktop me-1"></i>Desktop
                    </button>
                    <button class="btn btn-sm btn-outline-light" id="mobile-view">
                        <i class="fas fa-mobile-alt me-1"></i>Mobile
                    </button>
                </div>
                <div id="preview-status" class="text-light small">
                    <i class="fas fa-circle text-secondary me-1"></i>
                    <span>Готов к работе</span>
                </div>
            </div>
            
            <div id="preview-container" style="height: calc(100vh - 80px); overflow-y: auto; background: #f8f9fa;">
                <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                    <div class="text-center">
                        <i class="fas fa-browser fa-4x mb-3"></i>
                        <h5>Предпросмотр появится здесь</h5>
                        <p>Выберите шаблон и блоки, затем нажмите "Предпросмотр"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно успеха -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Успешно!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Ваш сайт был успешно создан!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                <a href="#" class="btn btn-primary" id="download-link">Скачать сайт</a>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно для выбора блоков -->
<div class="modal fade" id="blocksModal" tabindex="-1" aria-labelledby="blocksModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="blocksModalLabel">
                    <i class="fas fa-cube me-2"></i>Выберите блоки: <span id="modalCategoryName"></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <div class="row" id="modalBlocksContainer">
                    <!-- Блоки будут загружены динамически -->
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-muted small me-auto">
                    <i class="fas fa-info-circle me-1"></i>
                    Нажмите на блок для добавления в конструктор
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<!-- Sortable.js CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
.template-option:hover,
.block-option:hover {
    background-color: #f8f9fa;
    cursor: pointer;
}

.template-option.selected {
    background-color: #e3f2fd;
    border-color: #2196f3;
}

.block-option.selected {
    background-color: #e8f5e8;
    border-color: #4caf50;
}

.selected-block-item {
    background: white;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 12px;
    margin-bottom: 8px;
    cursor: move;
    transition: all 0.3s ease;
    position: relative;
}

.selected-block-item:hover {
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transform: translateY(-1px);
}

.selected-block-item .drag-handle {
    color: #6c757d;
    margin-right: 8px;
}

.selected-block-item .remove-block {
    position: absolute;
    top: 8px;
    right: 8px;
    color: #dc3545;
    cursor: pointer;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.selected-block-item:hover .remove-block {
    opacity: 1;
}

.sortable-ghost {
    opacity: 0.4;
}

.sortable-chosen {
    background-color: #f8f9fa;
}

.sortable-drag {
    background-color: white;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

#preview-container iframe {
    width: 100%;
    height: 100%;
    border: none;
    background: white;
}

.mobile-preview iframe {
    width: 375px;
    margin: 0 auto;
    display: block;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.desktop-view {
    width: 100%;
}

.mobile-view {
    max-width: 375px;
    margin: 0 auto;
}

.loading {
    opacity: 0.6;
    pointer-events: none;
}

.category-badge {
    font-size: 0.75rem;
    padding: 2px 6px;
}

.btn-group .btn.active {
    background-color: #fff;
    color: #000;
}

.card-header[data-bs-toggle="collapse"] {
    transition: background-color 0.3s ease;
}

.card-header[data-bs-toggle="collapse"]:hover {
    background-color: rgba(0,0,0,0.05);
}

.block-counter {
    background: linear-gradient(45deg, #007bff, #0056b3);
    color: white;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 600;
}

/* Стили для модального окна блоков */
.modal-block-card {
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid #dee2e6;
    height: 100%;
    position: relative;
}

.modal-block-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    border-color: #007bff;
}

.modal-block-card.selected {
    border-color: #28a745;
    background-color: #f8fff8;
}

.modal-block-card .card-body {
    padding: 1rem;
}

.modal-block-card .block-icon {
    font-size: 2rem;
    color: #6c757d;
    margin-bottom: 0.5rem;
}

.modal-block-card.selected .block-icon {
    color: #28a745;
}

.modal-block-card .block-name {
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #333;
}

.modal-block-card .block-description {
    color: #6c757d;
    font-size: 0.875rem;
    line-height: 1.4;
}

/* Новые стили для визуального предпросмотра блоков */
.block-preview-container {
    position: relative;
    height: 180px;
    overflow: hidden;
    border-radius: 8px;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
}

.block-preview-container::before {
    content: "Загрузка...";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #6c757d;
    font-size: 12px;
    z-index: 1;
}

.block-preview-container.loaded::before {
    display: none;
}

.block-mini-preview {
  width: 100%;
    height: 720px;
    transform: scale(1.1);
    transform-origin: top left;
    border: none;
    background: white;
    pointer-events: none;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.block-preview-container.loaded .block-mini-preview {
    opacity: 1;
}

.block-overlay {
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

.modal-block-card:hover .block-overlay {
    opacity: 1;
}

.block-info {
    text-align: center;
    color: white;
}

.block-info .block-icon {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.block-info .block-name {
    font-weight: 600;
    margin-bottom: 0.25rem;
    font-size: 0.9rem;
}

.block-info .block-description {
    font-size: 0.75rem;
    opacity: 0.9;
}

.modal-block-card.selected .block-overlay {
    background: rgba(40, 167, 69, 0.9);
}

.modal-block-card.selected .block-info .block-icon {
    color: white;
}

.category-btn {
    margin-bottom: 0.5rem;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
}

.category-btn:hover {
    transform: translateX(5px);
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.block-added-indicator {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #28a745;
    color: white;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    animation: scaleIn 0.3s ease;
}

@keyframes scaleIn {
    0% {
        transform: scale(0);
        opacity: 0;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

/* Улучшенные стили для preview контейнера */
#preview-container {
    transition: all 0.3s ease;
}

#preview-container iframe {
    width: 100%;
    height: 100%;
    border: none;
    transition: all 0.3s ease;
}

/* Индикатор загрузки */
.spinner-border {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Улучшенные стили для уведомлений */
.action-notification,
.edit-notification {
    transition: all 0.3s ease-in-out;
    transform: translateX(0);
}

.action-notification.fade:not(.show),
.edit-notification.fade:not(.show) {
    transform: translateX(100%);
    opacity: 0;
}

/* Исправления для модального окна */
.modal.fade:not(.show) {
    display: none !important;
}

.modal-block-card {
    transition: all 0.2s ease-in-out;
}

.modal-block-card:focus {
    outline: 2px solid #007bff;
    outline-offset: 2px;
}
</style>
@endpush

@push('scripts')
<!-- Sortable.js для drag & drop -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>
$(document).ready(function() {
    let currentView = 'desktop';
    let selectedBlocks = [];
    let sortableInstance = null;
    let editedContent = {}; // Хранилище отредактированного контента
    
    // Инициализация статуса
    updatePreviewStatus('ready', 'Готов к работе');
    
    // Инициализация Sortable для перетаскивания блоков
    function initSortable() {
        const container = document.getElementById('selected-blocks-container');
        if (sortableInstance) {
            sortableInstance.destroy();
        }
        
        sortableInstance = Sortable.create(container, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            chosenClass: 'sortable-chosen',
            dragClass: 'sortable-drag',
            handle: '.drag-handle',
            onEnd: function(evt) {
                updateBlockOrder();
            }
        });
    }
    
    // Данные блоков по категориям для модального окна
    const blocksByCategory = @json($blocksByCategory);
    
    // Обработчик открытия модального окна
    $('.category-btn').click(function() {
        const category = $(this).data('category');
        $('#modalCategoryName').text(category);
        loadBlocksInModal(category);
    });
    
    // Исправляем проблемы с модальным окном
    $('#blocksModal').on('show.bs.modal', function() {
        $(this).removeAttr('aria-hidden');
    });
    
    $('#blocksModal').on('hidden.bs.modal', function() {
        $(this).attr('aria-hidden', 'true');
        // Очищаем фокус
        $(this).find('.modal-block-card').removeClass('focus');
    });
    
    // Загрузка блоков в модальное окно
    function loadBlocksInModal(category) {
        const blocks = blocksByCategory[category];
        let blocksHtml = '';
        
        blocks.forEach(function(block) {
            const isSelected = selectedBlocks.indexOf(block.id) !== -1;
            const selectedClass = isSelected ? 'selected' : '';
            const iconClass = isSelected ? 'fa-check' : 'fa-cube';
            const iconColor = isSelected ? 'text-success' : '';
            
            blocksHtml += `
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card modal-block-card ${selectedClass}" data-block-id="${block.id}">
                        ${isSelected ? '<div class="block-added-indicator"><i class="fas fa-check"></i></div>' : ''}
                        <div class="card-body p-2">
                            <div class="block-preview-container">
                                <iframe src="${block.mini_preview_url}" 
                                        class="block-mini-preview" 
                                        scrolling="no" 
                                        frameborder="0">
                                </iframe>
                                <div class="block-overlay">
                                    <div class="block-info">
                                        <div class="block-icon">
                                            <i class="fas ${iconClass} ${iconColor}"></i>
                                        </div>
                                        <div class="block-name">${block.name}</div>
                                        <div class="block-description">${block.description || 'Блок для вашего сайта'}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
        
        $('#modalBlocksContainer').html(blocksHtml);
        
        // Обработчик загрузки iframe для скрытия индикатора загрузки
        $('.block-mini-preview').on('load', function() {
            $(this).closest('.block-preview-container').addClass('loaded');
        });
        
        // Добавляем обработчики клика на блоки
        $('.modal-block-card').click(function() {
            const blockId = $(this).data('block-id');
            const blockData = blocks.find(b => b.id == blockId);
            
            if ($(this).hasClass('selected')) {
                // Удаляем блок
                removeSelectedBlock(blockId);
                $(this).removeClass('selected');
                $(this).find('.block-icon i').removeClass('fa-check text-success').addClass('fa-cube');
                $(this).find('.block-added-indicator').remove();
                
                // Автоматически обновляем предпросмотр после удаления
                updatePreview();
            } else {
                // Добавляем блок
                addSelectedBlock(blockId, blockData.name, blockData.category);
                $(this).addClass('selected');
                $(this).find('.block-icon i').removeClass('fa-cube').addClass('fa-check text-success');
                $(this).append('<div class="block-added-indicator"><i class="fas fa-check"></i></div>');
                
                // Автоматически обновляем предпросмотр
                updatePreview();
            }
        });
    }
    
    // Слушатель сообщений от iframe (для редактирования контента)
    window.addEventListener('message', function(event) {
        if (event.data.type === 'blockContentChanged') {
            editedContent[event.data.blockId] = event.data.content;
            console.log('Контент блока обновлен:', event.data.blockId);
            
            // Показать уведомление о редактировании
            showEditNotification();
            
            // Обновить индикаторы
            updateEditedBlockIndicators();
            
            // Отложенное обновление предпросмотра (избегаем лишних запросов)
            clearTimeout(window.contentUpdateTimeout);
            window.contentUpdateTimeout = setTimeout(function() {
                // Обновляем только если пользователь закончил редактирование
                updatePreview();
            }, 1000); // Ждем 1 секунду после последнего изменения
        }
    });
    
    // Показать уведомление о том, что есть несохраненные изменения
    function showEditNotification() {
        if (!$('#edit-notification').length) {
            const notificationId = 'edit-notification-' + Date.now();
            const notification = `
                <div id="${notificationId}" class="alert alert-info alert-dismissible fade show position-fixed edit-notification" 
                     style="top: 20px; right: 20px; z-index: 1050; max-width: 300px;">
                    <i class="fas fa-edit me-2"></i>
                    <strong>Контент изменен!</strong><br>
                    Не забудьте пересобрать сайт для сохранения изменений.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            
            // Удаляем старое уведомление если есть
            $('.edit-notification').each(function() {
                if ($(this).length) {
                    $(this).remove();
                }
            });
            
            $('body').append(notification);
            
            // Автоматически скрыть через 5 секунд
            setTimeout(function() {
                const element = $('#' + notificationId);
                if (element.length) {
                    element.removeClass('show').addClass('fade');
                    setTimeout(() => {
                        if (element.length) {
                            element.remove();
                        }
                    }, 150);
                }
            }, 5000);
        }
    }
    
    // Обновление порядка блоков в массиве
    function updateBlockOrder() {
        const items = $('#selected-blocks-container .selected-block-item');
        selectedBlocks = [];
        items.each(function() {
            selectedBlocks.push($(this).data('block-id'));
        });
        updateSelectedBlocksInput();
        
        // Автоматически обновляем предпросмотр при изменении порядка
        updatePreview();
    }
    
    // Обновление скрытых input'ов для отправки формы
    function updateSelectedBlocksInput() {
        const container = $('#hidden-blocks-inputs');
        container.empty();
        
        selectedBlocks.forEach(function(blockId) {
            container.append(`<input type="hidden" name="selected_blocks[]" value="${blockId}">`);
        });
    }
    
    // Добавление блока в выбранные
    function addSelectedBlock(blockId, blockName, blockCategory) {
        if (selectedBlocks.indexOf(blockId) !== -1) return;
        
        selectedBlocks.push(blockId);
        
        const blockItem = `
            <div class="selected-block-item" data-block-id="${blockId}" style="opacity: 0;">
                <div class="d-flex align-items-center">
                    <i class="fas fa-grip-vertical drag-handle"></i>
                    <div class="flex-grow-1">
                        <strong>${blockName}</strong>
                        <span class="badge bg-info category-badge ms-2">${blockCategory}</span>
                        <span class="badge bg-warning ms-1 edited-badge" style="display: none;">
                            <i class="fas fa-edit"></i> Изменен
                        </span>
                    </div>
                    <i class="fas fa-times remove-block" onclick="removeSelectedBlock(${blockId})"></i>
                </div>
            </div>
        `;
        
        $('#selected-blocks-container').append(blockItem);
        
        // Анимация появления
        $(`.selected-block-item[data-block-id="${blockId}"]`).animate({opacity: 1}, 300);
        
        $('#no-blocks-message').hide();
        updateSelectedCount();
        updateSelectedBlocksInput();
        
        // Показать уведомление
        showActionNotification(`Блок "${blockName}" добавлен`, 'success');
        
        if (!sortableInstance) {
            initSortable();
        }
    }
    
    // Удаление блока из выбранных
    window.removeSelectedBlock = function(blockId) {
        // Получаем название блока для уведомления
        const blockName = $(`.selected-block-item[data-block-id="${blockId}"] strong`).text();
        
        selectedBlocks = selectedBlocks.filter(id => id != blockId);
        
        // Анимация удаления
        $(`.selected-block-item[data-block-id="${blockId}"]`).animate({opacity: 0}, 200, function() {
            $(this).slideUp(200, function() {
                $(this).remove();
            });
        });
        
        // Удаляем отредактированный контент
        delete editedContent[blockId];
        
        if (selectedBlocks.length === 0) {
            setTimeout(function() {
                $('#no-blocks-message').show();
                showPreviewPlaceholder('Добавьте блоки для создания сайта');
            }, 400);
        }
        
        updateSelectedCount();
        updateSelectedBlocksInput();
        
        // Показать уведомление
        showActionNotification(`Блок "${blockName}" удален`, 'warning');
        
        // Обновляем состояние в модальном окне если оно открыто
        $(`.modal-block-card[data-block-id="${blockId}"]`).removeClass('selected');
        $(`.modal-block-card[data-block-id="${blockId}"] .block-icon i`).removeClass('fa-check text-success').addClass('fa-cube');
        $(`.modal-block-card[data-block-id="${blockId}"] .block-added-indicator`).remove();
        
        // Автоматически обновляем предпросмотр
        setTimeout(function() {
            updatePreview();
        }, 500);
    }
    
    // Обновление счетчика выбранных блоков
    function updateSelectedCount() {
        $('#selected-count').text(selectedBlocks.length);
        
        // Показать количество измененных блоков
        const editedCount = Object.keys(editedContent).length;
        if (editedCount > 0) {
            if (!$('#edited-count').length) {
                $('#selected-count').after(' <span id="edited-count" class="badge bg-warning ms-1"></span>');
            }
            $('#edited-count').text(editedCount + ' изм.');
        } else {
            $('#edited-count').remove();
        }
    }
    
    // Обработчик выбора шаблона
    $('input[name="template_id"]').change(function() {
        $('.template-option').removeClass('selected');
        $(this).closest('.template-option').addClass('selected');
        
        const templateName = $(this).closest('.template-option').find('strong').text();
        showActionNotification(`Шаблон "${templateName}" выбран`, 'success');
        
        updatePreview();
    });
    
    // Автоматический предпросмотр при изменении настроек
    function updatePreview() {
        const templateId = $('input[name="template_id"]:checked').val();
        
        if (!templateId) {
            showPreviewPlaceholder('Выберите шаблон для начала работы');
            return;
        }
        
        if (selectedBlocks.length === 0) {
            showPreviewPlaceholder('Добавьте блоки для создания сайта');
            return;
        }
        
        // Немедленно обновляем предпросмотр без задержки
        generatePreview();
    }
    
    // Показать заглушку в области предпросмотра
    function showPreviewPlaceholder(message) {
        updatePreviewStatus('ready', message);
        const placeholder = `
            <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                <div class="text-center">
                    <i class="fas fa-browser fa-4x mb-3"></i>
                    <h5>Предпросмотр</h5>
                    <p>${message}</p>
                </div>
            </div>
        `;
        $('#preview-container').html(placeholder);
    }
    
    // Генерация предпросмотра
    function generatePreview() {
        const templateId = $('input[name="template_id"]:checked').val();
        
        if (!templateId || selectedBlocks.length === 0) {
            return;
        }
        
        // Показываем индикатор загрузки
        showPreviewLoader();
        
        $.ajax({
            url: '{{ route("site-builder.preview") }}',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                template_id: templateId,
                selected_blocks: selectedBlocks,
                edited_content: editedContent
            },
            success: function(response) {
                const iframe = $('<iframe>').attr('srcdoc', response.html);
                $('#preview-container').html(iframe);
                updatePreviewStatus('success', 'Предпросмотр обновлен');
                applyViewMode();
                
                // Показать подсказку о редактировании
                if (Object.keys(editedContent).length === 0) {
                    showEditHint();
                }
                
                // Обновить индикаторы измененных блоков
                updateEditedBlockIndicators();
            },
            error: function(xhr, status, error) {
                console.error('Ошибка предпросмотра:', error);
                let errorMessage = 'Ошибка загрузки предпросмотра';
                
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    errorMessage = xhr.responseJSON.error;
                }
                
                updatePreviewStatus('error', errorMessage);
                showPreviewPlaceholder(errorMessage + '. Попробуйте еще раз.');
                showActionNotification(errorMessage, 'error');
            }
        });
    }
    
    // Показать загрузчик в области предпросмотра
    function showPreviewLoader() {
        updatePreviewStatus('loading', 'Генерация предпросмотра...');
        const loader = `
            <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                <div class="text-center">
                    <div class="spinner-border text-primary mb-3" role="status">
                        <span class="visually-hidden">Загрузка...</span>
                    </div>
                    <h5>Генерация предпросмотра...</h5>
                    <p>Пожалуйста, подождите</p>
                </div>
            </div>
        `;
        $('#preview-container').html(loader);
    }
    
    // Обновление статуса предпросмотра
    function updatePreviewStatus(status, message) {
        const statusElement = $('#preview-status');
        let iconClass = 'fas fa-circle text-secondary';
        
        switch(status) {
            case 'loading':
                iconClass = 'fas fa-spinner fa-spin text-warning';
                break;
            case 'success':
                iconClass = 'fas fa-circle text-success';
                break;
            case 'error':
                iconClass = 'fas fa-circle text-danger';
                break;
            case 'ready':
                iconClass = 'fas fa-circle text-info';
                break;
        }
        
        statusElement.html(`<i class="${iconClass} me-1"></i><span>${message}</span>`);
    }
    
    // Показать уведомление о действии
    function showActionNotification(message, type = 'info') {
        const alertClass = type === 'success' ? 'alert-success' : 
                          type === 'error' ? 'alert-danger' : 
                          type === 'warning' ? 'alert-warning' : 'alert-info';
        
        const notificationId = 'notification-' + Date.now();
        const notification = `
            <div id="${notificationId}" class="alert ${alertClass} alert-dismissible fade show position-fixed action-notification" 
                 style="top: 80px; right: 20px; z-index: 1050; max-width: 300px;">
                <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'exclamation-triangle' : 'info'} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        
        // Безопасно удаляем предыдущие уведомления
        $('.action-notification').each(function() {
            if ($(this).length) {
                $(this).removeClass('show').addClass('fade');
                setTimeout(() => {
                    if ($(this).length) {
                        $(this).remove();
                    }
                }, 150);
            }
        });
        
        $('body').append(notification);
        
        // Автоматически скрыть через 3 секунды
        setTimeout(function() {
            const element = $('#' + notificationId);
            if (element.length) {
                element.removeClass('show').addClass('fade');
                setTimeout(() => {
                    if (element.length) {
                        element.remove();
                    }
                }, 150);
            }
        }, 3000);
    }
    
    // Предпросмотр
    $('#preview-btn').click(function() {
        generatePreview();
    });
    
    // Показать подсказку о возможности редактирования
    function showEditHint() {
        if (!localStorage.getItem('edit-hint-shown')) {
            setTimeout(function() {
                // Удаляем существующую подсказку если есть
                if ($('#edit-hint').length) {
                    $('#edit-hint').remove();
                }
                
                const hintId = 'edit-hint-' + Date.now();
                const hint = `
                    <div id="${hintId}" class="alert alert-success alert-dismissible fade show position-fixed" 
                         style="top: 20px; right: 20px; z-index: 1050; max-width: 350px;">
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>Совет:</strong> Нажмите на любой блок в предпросмотре для редактирования текста!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
                $('body').append(hint);
                localStorage.setItem('edit-hint-shown', 'true');
                
                setTimeout(function() {
                    const element = $('#' + hintId);
                    if (element.length) {
                        element.removeClass('show').addClass('fade');
                        setTimeout(() => {
                            if (element.length) {
                                element.remove();
                            }
                        }, 150);
                    }
                }, 8000);
            }, 2000);
        }
    }
    
    // Обновить индикаторы измененных блоков
    function updateEditedBlockIndicators() {
        $('.edited-badge').hide();
        Object.keys(editedContent).forEach(function(blockId) {
            $(`.selected-block-item[data-block-id="${blockId}"] .edited-badge`).show();
        });
        updateSelectedCount();
    }
    
    // Переключение видов
    $('#desktop-view').click(function() {
        currentView = 'desktop';
        applyViewMode();
        $('.btn-outline-light').removeClass('active');
        $(this).addClass('active');
    });
    
    $('#mobile-view').click(function() {
        currentView = 'mobile';
        applyViewMode();
        $('.btn-outline-light').removeClass('active');
        $(this).addClass('active');
    });
    
    function applyViewMode() {
        const iframe = $('#preview-container iframe');
        if (iframe.length) {
            if (currentView === 'mobile') {
                iframe.addClass('mobile-preview');
                $('#preview-container').addClass('mobile-view').removeClass('desktop-view');
            } else {
                iframe.removeClass('mobile-preview');
                $('#preview-container').addClass('desktop-view').removeClass('mobile-view');
            }
        }
    }
    
    // Кнопка очистки редактирования
    function addClearEditsButton() {
        if (Object.keys(editedContent).length > 0 && !$('#clear-edits-btn').length) {
            const clearBtn = `
                <button type="button" class="btn btn-outline-warning btn-sm" id="clear-edits-btn">
                    <i class="fas fa-undo me-1"></i>Сбросить правки
                </button>
            `;
            $('#preview-btn').after(' ' + clearBtn);
            
            $('#clear-edits-btn').click(function() {
                if (confirm('Сбросить все правки в тексте?')) {
                    const editedBlocksCount = Object.keys(editedContent).length;
                    editedContent = {};
                    updateEditedBlockIndicators();
                    updatePreview();
                    $(this).remove();
                    showActionNotification(`Сброшены правки в ${editedBlocksCount} блоках`, 'info');
                }
            });
        }
    }
    
    // Сборка сайта
    $('#site-builder-form').submit(function(e) {
        e.preventDefault();
        
        const siteName = $('#site_name').val();
        if (!siteName) {
            alert('Пожалуйста, введите название сайта');
            $('#site_name').focus();
            return;
        }
        
        if (selectedBlocks.length === 0) {
            alert('Пожалуйста, выберите хотя бы один блок');
            return;
        }
        
        $('#build-btn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Создание...');
        
        const formData = $(this).serializeArray();
        
        // Добавляем отредактированный контент
        if (Object.keys(editedContent).length > 0) {
            Object.keys(editedContent).forEach(function(blockId) {
                formData.push({
                    name: `edited_content[${blockId}]`,
                    value: editedContent[blockId]
                });
            });
        }
        
        $.ajax({
            url: '{{ route("site-builder.build") }}',
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#download-link').attr('href', response.download_url);
                $('#successModal').modal('show');
                
                // Очищаем отредактированный контент после успешной сборки
                editedContent = {};
                updateEditedBlockIndicators();
                $('#clear-edits-btn').remove();
                
                // Безопасно закрываем уведомления
                $('.edit-notification').each(function() {
                    if ($(this).length) {
                        $(this).remove();
                    }
                });
                
                showActionNotification('Сайт успешно создан!', 'success');
            },
            error: function(xhr, status, error) {
                console.error('Ошибка сборки сайта:', error);
                let errorMessage = 'Ошибка при создании сайта';
                
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                } else if (xhr.responseText) {
                    errorMessage = 'Ошибка сервера: ' + xhr.status;
                }
                
                showActionNotification(errorMessage, 'error');
            },
            complete: function() {
                $('#build-btn').prop('disabled', false).html('<i class="fas fa-download me-2"></i>Собрать сайт');
            }
        });
    });
    
    // Отслеживание изменений для показа кнопки очистки
    setInterval(function() {
        addClearEditsButton();
    }, 1000);
    
    // Открытие/закрытие категорий по умолчанию
    $('.card-header[data-bs-toggle="collapse"]').click(function() {
        const chevron = $(this).find('.fa-chevron-down');
        setTimeout(function() {
            if (chevron.closest('.card').find('.collapse').hasClass('show')) {
                chevron.removeClass('fa-chevron-down').addClass('fa-chevron-up');
            } else {
                chevron.removeClass('fa-chevron-up').addClass('fa-chevron-down');
            }
        }, 350);
    });
    
    // Открываем первую категорию по умолчанию
    if ($('.card .collapse').length > 0) {
        $('.card .collapse').first().addClass('show');
        $('.card .fa-chevron-down').first().removeClass('fa-chevron-down').addClass('fa-chevron-up');
    }
    
    // Инициализация статуса предпросмотра
    updatePreviewStatus('ready', 'Готов к работе');
    showPreviewPlaceholder('Выберите шаблон и блоки для начала работы');
    
    // Клавиатурные сочетания
    $(document).keydown(function(e) {
        // Ctrl+P - Предпросмотр
        if (e.ctrlKey && e.key === 'p') {
            e.preventDefault();
            generatePreview();
            showActionNotification('Предпросмотр обновлен (Ctrl+P)', 'info');
        }
        
        // Ctrl+S - Сборка сайта
        if (e.ctrlKey && e.key === 's') {
            e.preventDefault();
            $('#site-builder-form').submit();
        }
        
        // Escape - Закрыть модальные окна
        if (e.key === 'Escape') {
            $('.modal').modal('hide');
        }
    });
    
    // Подсказка о клавиатурных сочетаниях
    setTimeout(function() {
        if (!localStorage.getItem('keyboard-shortcuts-shown')) {
            showActionNotification('Подсказка: Ctrl+P - предпросмотр, Ctrl+S - сборка сайта', 'info');
            localStorage.setItem('keyboard-shortcuts-shown', 'true');
        }
    }, 5000);
});
</script>
@endpush
