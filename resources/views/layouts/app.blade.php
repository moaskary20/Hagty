<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Tajawal', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts - Tajawal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        /* Apply Tajawal font to all elements */
        * {
            font-family: 'Tajawal', sans-serif !important;
        }
        
        .d94288 {
            color: #d94288;
        }
        .bg-d94288 {
            background-color: #d94288;
        }
        .border-d94288 {
            border-color: #d94288;
        }
        .focus\:ring-d94288:focus {
            --tw-ring-color: #d94288;
        }
        .focus\:border-d94288:focus {
            border-color: #d94288;
        }
        .hover\:text-d94288:hover {
            color: #d94288;
        }
        .hover\:from-pink-700:hover {
            --tw-gradient-from: #be185d;
            --tw-gradient-to: rgb(190 24 93 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }
        .hover\:to-purple-700:hover {
            --tw-gradient-to: #7c2d12;
        }
        .from-d94288 {
            --tw-gradient-from: #d94288;
            --tw-gradient-to: rgb(217 66 136 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
        }
        .to-purple-600 {
            --tw-gradient-to: #9333ea;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div id="app">
        @yield('content')
    </div>

</body>
</html>
