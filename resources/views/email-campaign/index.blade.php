@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Email-рассылка — предложение по созданию сайта</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('email-campaign.send') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Использовать файл с сервера (папка baseemail)</label>
            <select name="server_file" class="form-select">
                <option value="">-- не использовать --</option>
                @if(!empty($serverFiles))
                    @foreach($serverFiles as $f)
                        <option value="{{ $f }}">{{ $f }}</option>
                    @endforeach
                @endif
            </select>
            <div class="form-text">Файлы должны находиться в C:\ospanel\domains\konstructor\baseemail, формат txt или csv. Если выбран файл — загрузка не требуется.</div>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Или загрузите файл (CSV или TXT)</label>
            <input type="file" class="form-control" id="file" name="file" accept=".csv,.txt,text/plain">
            @error('file')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Тема письма</label>
            <input type="text" class="form-control" id="subject" name="subject"
                   value="{{ old('subject', 'Создайте сайт, который продаёт — консультация') }}" required>
            @error('subject')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Краткий текст (preheader, опционально)</label>
            <textarea class="form-control" name="preview_text" rows="2" placeholder="Короткий preheader для письма">{{ old('preview_text') }}</textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Запустить рассылку</button>
            <a href="{{ route('email-campaign.preview') }}" target="_blank" class="btn btn-outline-secondary">Предпросмотр</a>
        </div>
    </form>

    <hr class="my-4">

    <h6>Рекомендации по загрузке и доставке:</h6>
    <ul>
        <li>Положите .txt или .csv файлы с адресами в C:\ospanel\domains\konstructor\baseemail</li>
        <li>Формат .txt: одна запись на строку или CSV с колонкой email.</li>
        <li>Отправляйте с корпоративного домена и настройте SPF/DKIM/DMARC.</li>
        <li>Запустите воркер очереди: php artisan queue:work</li>
    </ul>
</div>
@endsection
