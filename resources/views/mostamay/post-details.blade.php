<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - مستمعي | HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-violet-50 to-purple-50">
    <div class="max-w-4xl mx-auto px-4 py-12">
        <a href="{{ route('mostamay.index') }}" class="inline-block mb-6 text-violet-700 hover:text-violet-900 font-bold">← العودة</a>
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h1 class="text-3xl font-extrabold mb-3">{{ $post->title }}</h1>
            <div class="text-gray-800 leading-relaxed whitespace-pre-line mb-6">{{ $post->content }}</div>
            <div class="flex gap-4 text-sm text-gray-600">
                <span><i class="far fa-thumbs-up ml-1"></i>{{ $post->likes_count }}</span>
                <span><i class="far fa-comments ml-1"></i>{{ $post->comments_count }}</span>
            </div>
        </div>
    </div>
</body>
</html>
