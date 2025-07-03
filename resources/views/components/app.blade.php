<!doctype html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Prescription</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="h-full">
    <x-nav></x-nav>
    <div>
        {{ $slot }}
    </div>
</body>
</html>
