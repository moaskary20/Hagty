<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $story->title }} - مستمعي | HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-violet-50 to-purple-50">
    <div class="max-w-4xl mx-auto px-4 py-12">
        <a href="{{ route('mostamay.index') }}" class="inline-block mb-6 text-violet-700 hover:text-violet-900 font-bold">← العودة</a>
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h1 class="text-3xl font-extrabold mb-3">{{ $story->title }}</h1>
            @if($story->person_name)
            <p class="text-sm text-violet-600 mb-4">بقلم: {{ $story->person_name }}</p>
            @endif
            <div class="text-gray-800 leading-relaxed whitespace-pre-line">{{ $story->story }}</div>
        </div>
    </div>
</body>
</html>
