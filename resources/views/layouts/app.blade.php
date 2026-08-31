<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Core Tech - متجر قطع الهاردوير</title>
    
    <!-- ✅ Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- ✅ Bootstrap Icons (رابط مزدوج للتأكيد) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    
    <!-- ✅ Font Awesome كبديل -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        /* ... */
    </style>
    
    @livewireStyles
</head>
<body class="bg-[#F7FBF9] text-[#1A2E26] antialiased">
    {{ $slot }}
    @livewire('cart')
    @livewireScripts
</body>
</html>