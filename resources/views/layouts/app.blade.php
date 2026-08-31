<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Core Tech - متجر قطع الهاردوير</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --mint-primary: #3EB489;
            --mint-primary-dark: #2D8A6A;
            --mint-primary-light: #6CD4A8;
            --mint-primary-bg: #F0F9F5;
            --mint-primary-border: #D4EDE3;
        }
        
        body {
            font-family: 'Tajawal', sans-serif;
            background: #F7FBF9;
            color: #1A2E26;
        }
        
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #E8F3EE;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--mint-primary);
            border-radius: 9999px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--mint-primary-dark);
        }
        
        ::selection {
            background: var(--mint-primary);
            color: #FFFFFF;
        }
    </style>
    
    @livewireStyles
</head>
<body class="bg-[#F7FBF9] text-[#1A2E26] antialiased">
    {{ $slot }}
    @livewireScripts
</body>
</html>