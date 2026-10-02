<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampung Trimulyo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto">
            <a href="/" class="text-xl font-bold">Kampung Trimulyo</a>
        </div>
    </nav>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>