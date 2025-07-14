<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Anime Site')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-color: #121212;">
    @include('components.navbar')
    {{-- @yield('navbar') --}}
    @yield('hero')
    @yield('trending')

    <main class="container py-4">
        @yield('content')
    </main>
    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>