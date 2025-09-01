<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Предпросмотр письма</title>
    <style>
        .preheader { display:none !important; visibility:hidden; opacity:0; height:0; width:0; }
        body { font-family: Arial, sans-serif; color:#222; }
        .container { max-width: 680px; margin: 20px auto; padding: 20px; border:1px solid #e9e9e9; border-radius:8px; }
        .btn { display:inline-block; padding:12px 20px; background:#000; color:#fff; text-decoration:none; border-radius:6px; }
    </style>
</head>
<body>
    <span class="preheader">{{ $preview_text }}</span>
    <div class="container">
        <h2>{{ $subject }}</h2>
        {!! $content !!}
        <p style="margin-top:20px;">
            <a class="btn" href="#">{{ __('Подробнее на сайте') }}</a>
        </p>
        <hr>
        <p style="font-size:12px;color:#666;">Если вы не хотите получать эти письма, вы можете <a href="{{ $unsubscribeUrl }}">отписаться</a>.</p>
    </div>
</body>
</html>
