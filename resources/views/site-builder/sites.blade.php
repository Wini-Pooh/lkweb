@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Созданные сайты</h2>
                <a href="{{ route('site-builder.index') }}" class="btn btn-primary">
                    Создать новый сайт
                </a>
            </div>

            @if($sites->count() > 0)
                <div class="row">
                    @foreach($sites as $site)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">{{ $site->name }}</h6>
                                <span class="badge bg-{{ $site->status === 'published' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($site->status) }}
                                </span>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <strong>Шаблон:</strong> {{ $site->template->name }}<br>
                                    <strong>Блоков:</strong> {{ count($site->selected_blocks) }}<br>
                                    @if($site->domain)
                                    <strong>Домен:</strong> {{ $site->domain }}<br>
                                    @endif
                                    <strong>Создан:</strong> {{ $site->created_at->format('d.m.Y H:i') }}
                                </p>
                                
                                <div class="mb-3">
                                    <small class="text-muted">Использованные блоки:</small>
                                    <div class="mt-1">
                                        @foreach($site->getSelectedBlocksModels() as $block)
                                        <span class="badge bg-light text-dark me-1">{{ $block->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('site-builder.download', $site->id) }}" 
                                       class="btn btn-primary btn-sm">
                                        <i class="fas fa-download"></i> Скачать
                                    </a>
                                    @if(file_exists(public_path($site->folder_path . '/index.html')))
                                    <a href="{{ asset($site->folder_path . '/index.html') }}" 
                                       target="_blank" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-eye"></i> Просмотр
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Статистика</h5>
                                <div class="row text-center">
                                    <div class="col-md-3">
                                        <h4 class="text-primary">{{ $sites->count() }}</h4>
                                        <p class="mb-0">Всего сайтов</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="text-success">{{ $sites->where('status', 'published')->count() }}</h4>
                                        <p class="mb-0">Опубликованных</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="text-warning">{{ $sites->where('status', 'draft')->count() }}</h4>
                                        <p class="mb-0">Черновиков</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="text-info">{{ $sites->where('created_at', '>=', now()->subWeek())->count() }}</h4>
                                        <p class="mb-0">За неделю</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-globe fa-4x text-muted mb-3"></i>
                    <h4>Пока нет созданных сайтов</h4>
                    <p class="text-muted">Создайте свой первый сайт с помощью конструктора</p>
                    <a href="{{ route('site-builder.index') }}" class="btn btn-primary">
                        Создать сайт
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
