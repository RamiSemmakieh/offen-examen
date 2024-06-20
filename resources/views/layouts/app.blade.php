<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header>
        <nav>
            <!-- navigation links here -->
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- footer content here -->
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>