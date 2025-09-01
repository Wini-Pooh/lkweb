<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        .preheader { display:none !important; visibility:hidden; opacity:0; height:0; width:0; }
        body { font-family: Arial, sans-serif; color:#222; margin:0; padding:0; }
        .container { max-width:680px; margin:0 auto; padding:24px; }
        .btn { background:#000; color:#fff; padding:12px 18px; text-decoration:none; border-radius:6px; display:inline-block; }
    </style>
</head>
<body>
    <span class="preheader">{{ $preview_text }}</span>
    <div class="container">
        <h1>{{ $subjectText }}</h1>

        <p>Здравствуйте,</p>

        <p>Мы подготовили для вас предложение по созданию сайта.</p>

        <p style="margin:18px 0;"><a href="#" class="btn">Получить расчёт</a></p>

        <hr>
        <p style="font-size:13px;color:#666;">
            Если вы не хотите получать эти письма, <a href="{{ $unsubscribeUrl }}">отпишитесь здесь</a>.
        </p>
    </div>
</body>
</html>
