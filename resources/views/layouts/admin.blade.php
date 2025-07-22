<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Akomodasi</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard Admin</a>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
