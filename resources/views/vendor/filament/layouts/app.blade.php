<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>
    @if (isset($styles))
        {{ $styles }}
    @endif
    @if (isset($head))
        {{ $head }}
    @endif
</head>
<body class="fi-body">
    {{ $slot }}
    @if (isset($scripts))
        {{ $scripts }}
    @endif
</body>
</html>
