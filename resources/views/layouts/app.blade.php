<!-- resources/views/layouts/app.blade.php -->
<!-- pagina 99 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <nav class="navbar">
            <a class="navbar-brand" href="#">Proyecto Crud</a>
            <div>
                <a class="nav-link" href="{{ url('/posts') }}">Posts</a>
                <a class="nav-link" href="{{ url('/categories') }}">Categorías</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <!-- Pie de página -->
    </footer>


</body>
</html>