<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Core Tech - متجر قطع الهاردوير</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Tajawal', 'Cairo', sans-serif;
        }
        /* تنسيق شريط التمرير */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #94a3b8;
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }
        /* تحديد النص */
        ::selection {
            background: #2563eb;
            color: #ffffff;
        }
        /* تنسيق البطاقات */
        .product-card {
            transition: all 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-4px);
        }
    </style>
    
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    {{ $slot }}
    @livewireScripts
</body>
</html>