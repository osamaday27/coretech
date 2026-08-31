<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Core Tech - المتجر الإلكتروني</title>
    <!-- تضمين مكتبة التنسيق السريعة للـ UI -->
    <script src="https://tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-slate-950 text-white">

    <!-- استدعاء سلة ومتجر كروت الشاشة والمعالجات التفاعلي هنا بضغطة زر -->
    @livewire('shop-component') 

    @livewireScripts
</body>
</html>
