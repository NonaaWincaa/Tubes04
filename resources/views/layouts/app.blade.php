<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tubes Web')</title>
    
    <!-- CSS Utama -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
    <!-- CSS Khusus Tiap Halaman -->
    @stack('styles')
</head>
<body>

    <!-- Header & Navigasi -->
    <header>
        <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" class="logo">
        
        <!-- Component Navbar -->
        <x-navbar />
    </header>

    <!-- Konten Utama (Dinamis) -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer Partial -->
    @include('partials.footer')

    @stack('scripts')
</body>
</html>