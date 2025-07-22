<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Akomodasi | MyHarau')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 80px;
            background-color: #f8f9fa;
        }

        .navbar-brand span {
            color: #28a745;
            font-weight: bold;
        }

        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        footer {
            background-color: #ffffff;
            padding: 30px 0;
            border-top: 1px solid #ddd;
            text-align: center;
            margin-top: 60px;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <strong>My<span>Harau</span></strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/akomodasi') }}">Akomodasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/pusat-bantuan') }}">Pusat Bantuan</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Footer --}}
    <footer class="mt-5">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} MyHarau. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
