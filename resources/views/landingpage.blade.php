<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyHarau - Wisata & UMKM Harau</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #218838;
            --dark-color: #1e7e34;
            --light-color: #f8f9fa;
            --accent-color: #ffc107;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            padding-top: 76px;
            color: #333;
        }
        
        /* Navbar Styling */
        .navbar {
            padding: 15px 0;
            transition: all 0.3s ease;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
        }
        
        .logo-black {
            color: #212529;
            font-weight: 800;
        }
        
        .logo-green {
            color: var(--primary-color);
            font-weight: 800;
        }
        
        .nav-link {
            font-weight: 600;
            color: #495057;
            margin: 0 10px;
            position: relative;
            transition: 0.3s;
        }
        
        .nav-link:hover {
            color: var(--primary-color);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--primary-color);
            transition: width 0.3s;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        /* Sidebar Styling */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1031;
            top: 0;
            left: 0;
            background-color: #fff;
            overflow-x: hidden;
            padding-top: 60px;
            transition: 0.5s;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar a {
            padding: 15px 25px;
            text-decoration: none;
            font-size: 18px;
            color: #495057;
            display: block;
            transition: 0.3s;
            font-weight: 600;
            border-left: 4px solid transparent;
        }
        
        .sidebar a:hover {
            color: var(--primary-color);
            background-color: rgba(40, 167, 69, 0.05);
            border-left: 4px solid var(--primary-color);
        }
        
        .sidebar .closebtn {
            position: absolute;
            top: 15px;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        
        .sidebar-header {
            padding: 0 0 20px 0;
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 20px;
        }
        
        /* Hero Section */
        .hero-section {
            padding: 100px 0;
            background: linear-gradient(rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.9)), url('assets/img/harau-bg.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .hero-content h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        
        .hero-content p {
            font-size: 1.25rem;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .hero-image img {
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .hero-image img:hover {
            transform: translateY(-10px);
        }
        
        /* Features Section */
        .features-section {
            padding: 100px 0;
            background-color: #f8f9fa;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: #212529;
        }
        
        .section-title p {
            font-size: 1.25rem;
            color: #6c757d;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .feature-card {
            padding: 30px;
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            height: 100%;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            height: 80px;
            width: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(40, 167, 69, 0.1);
            border-radius: 50%;
            margin-bottom: 25px;
        }
        
        .feature-icon i {
            font-size: 2.5rem;
            color: var(--primary-color);
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .feature-card p {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 25px;
        }
        
        /* About Section */
        .about-section {
            padding: 100px 0;
        }
        
        .about-image img {
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        
        .about-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .about-content p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #495057;
            margin-bottom: 30px;
        }
        
        /* Footer */
        .footer {
            background-color: #212529;
            color: #f8f9fa;
            padding: 70px 0 30px;
        }
        
        .footer-logo {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 20px;
        }
        
        .footer-logo span {
            color: var(--primary-color);
        }
        
        .footer-text {
            font-size: 1rem;
            margin-bottom: 30px;
            color: #adb5bd;
        }
        
        .footer-links h4 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: #fff;
        }
        
        .footer-links ul {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 15px;
        }
        
        .footer-links a {
            color: #adb5bd;
            text-decoration: none;
            transition: 0.3s;
            font-size: 1rem;
        }
        
        .footer-links a:hover {
            color: var(--primary-color);
            padding-left: 5px;
        }
        
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            width: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 10px;
            color: #fff;
            transition: 0.3s;
        }
        
        .social-links a:hover {
            background-color: var(--primary-color);
            transform: translateY(-5px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 30px;
            margin-top: 50px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #adb5bd;
        }
        
        /* Responsive Styles */
        @media (max-width: 991.98px) {
            .hero-content {
                text-align: center;
                margin-bottom: 50px;
            }
            
            .about-content {
                margin-top: 50px;
            }
        }
        
        @media (max-width: 767.98px) {
            .hero-section {
                padding: 50px 0;
            }
            
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .features-section {
                padding: 50px 0;
            }
            
            .about-section {
                padding: 50px 0;
            }
            
            .feature-card {
                margin-bottom: 30px;
            }
        }
        
        /* Button Styles */
        .btn {
            padding: 12px 25px;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.3s;
        }
        
        .btn-success {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-success:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }
        
        .btn-outline-success {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-success:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }
        
        .btn-lg {
            padding: 15px 30px;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <i class="bi bi-list me-2" onclick="toggleSidebar()" style="cursor:pointer; font-size: 1.8rem;"></i>
            <span class="logo-black">My</span><span class="logo-green">Harau</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#features">Fitur</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#peta">Peta Wisata</a></li>
            </ul>
        
            <!-- Auth Buttons - Conditional rendering -->
            @guest
            <div class="d-flex ms-3">
                <a href="{{ route('login') }}" class="btn btn-outline-success me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-success">Sign up</a>
            </div>
            @else
            <div class="d-flex ms-3">
                <a href="{{ route('user.profile') }}" class="btn btn-outline-success me-2">
                    <i class="bi bi-person-circle me-1"></i>Profil
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right me-1"></i>Logout
                    </button>
                </form>
            </div>
            @endguest
        </div>
    </div>
</nav>

    <!-- Sidebar -->
    <div id="mySidebar" class="sidebar">
        <div class="sidebar-header">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar()">&times;</a>
        </div>
        <a href="#sewa"><i class="bi bi-car-front me-2"></i> Sewa Kendaraan & Akomodasi</a>
        <a href="#umkm"><i class="bi bi-shop me-2"></i> Produk UMKM</a>
        <a href="#wisata"><i class="bi bi-geo-alt me-2"></i> Tempat Wisata</a>
        <a href="#bantuan"><i class="bi bi-headset me-2"></i> Pusat Bantuan</a>
        <a href="#kontak"><i class="bi bi-telephone me-2"></i> Kontak Darurat</a>
    </div>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1>Selamat Datang di <span class="text-success">MyHarau</span></h1>
                    <p>
                        MyHarau adalah platform digital berbasis peta yang menghubungkan masyarakat, 
                        pelaku usaha, dan wisatawan di wilayah Harau. Temukan produk UMKM lokal, 
                        sewa kendaraan, pesan akomodasi, dan akses layanan bantuan dengan cepat.
                    </p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                        <a href="{{ 'home' }}" class="btn btn-success btn-lg">
                            <i class="bi bi-shop me-2"></i>Jelajahi Marketplace
                        </a>
                        <a href="{{ url('pusat-bantuan') }}" class="btn btn-outline-success btn-lg">
                            <i class="bi bi-headset me-2"></i>Pusat Bantuan
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 hero-image">
                    <img src="{{ asset('assets/img/petani1.png') }}" alt="Lembah Harau" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Fitur Utama MyHarau</h2>
                <p>Berikut adalah layanan yang tersedia untuk mendukung eksplorasi dan aktivitas Anda di wilayah Harau</p>
            </div>
            
            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shop"></i>
                        </div>
                        <h3>Marketplace + Peta</h3>
                        <p>
                            Jelajahi produk UMKM berdasarkan lokasi, temukan kebutuhan Anda dengan mudah 
                            lewat peta interaktif yang memperlihatkan semua pelaku usaha di Harau.
                        </p>
                        <a  href="{{ 'home' }}" class="btn btn-outline-success">
                            <i class="bi bi-arrow-right me-1"></i>Buka Marketplace
                        </a>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-car-front"></i>
                        </div>
                        <h3>Akomodasi & Transportasi</h3>
                        <p>
                            Sewa kendaraan dan booking penginapan dengan cepat dan aman untuk perjalanan 
                            yang nyaman selama berada di kawasan wisata Harau.
                        </p>
                        <a href="{{ url('akomodasi') }}" class="btn btn-outline-success">
                            <i class="bi bi-arrow-right me-1"></i>Cari Akomodasi
                        </a>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h3>Pusat Bantuan 24/7</h3>
                        <p>
                            Dapatkan bantuan cepat untuk segala keperluan darurat dan informasi 
                            wisatawan selama berada di kawasan Harau kapanpun dibutuhkan.
                        </p>
                        <a href="{{ url('pusat-bantuan') }}" class="btn btn-outline-success">
                            <i class="bi bi-arrow-right me-1"></i>Hubungi Bantuan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section 1 -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 about-image">
                    <img src="{{ asset('assets/img/petani2.png') }}" alt="Petani bekerja di ladang" class="img-fluid">
                </div>
                <div class="col-lg-6 about-content">
                    <h2>Meningkatkan Efisiensi Pengelolaan Wilayah</h2>
                    <p>
                        <strong>MyHarau</strong> adalah solusi digital terintegrasi yang membantu masyarakat, 
                        wisatawan, dan pengelola daerah untuk memantau serta mengelola aktivitas wilayah secara real-time. 
                        Dengan dukungan data dan peta interaktif, pengguna dapat melihat lokasi UMKM, tempat wisata, 
                        penginapan, serta kendaraan yang tersedia.
                    </p>
                    <p>
                        Sistem ini memungkinkan pelaku usaha dan pemerintah untuk mengelola potensi daerah secara efisien, 
                        mempermudah wisatawan dalam merencanakan perjalanan, serta mempercepat layanan melalui 
                        pusat bantuan yang responsif. Semua terhubung dalam satu platform cerdas berbasis wilayah.
                    </p>
                    <a href="#peta" class="btn btn-success">Lihat Peta Interaktif</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section 2 -->
    <section class="about-section bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 about-content order-lg-1 order-2">
                    <h2>Memberdayakan Daerah dengan Teknologi Cerdas</h2>
                    <p>
                        <strong>MyHarau</strong> memberdayakan masyarakat dan pelaku usaha lokal melalui teknologi cerdas 
                        yang menyatukan data wilayah, peta interaktif, dan sistem layanan real-time. Dengan fitur marketplace, 
                        sistem penyewaan, dan pusat bantuan yang terintegrasi, pengguna dapat mengakses berbagai kebutuhan secara efisien.
                    </p>
                    <p>
                        Pelaku UMKM dapat memperluas pasar, wisatawan dapat merencanakan perjalanan dengan mudah, 
                        dan pengelola daerah dapat mengambil keputusan berbasis data. Teknologi ini mendorong pertumbuhan 
                        ekonomi lokal, memperkuat promosi wisata, serta meningkatkan kualitas layanan publik di wilayah seperti Harau.
                    </p>
                    <a href="#umkm" class="btn btn-success">Temukan Produk UMKM</a>
                </div>
                <div class="col-lg-6 about-image order-lg-2 order-1 mb-4 mb-lg-0">
                    <img src="{{ asset('assets/img/petani3.png') }}" alt="Pertanian di Harau" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-logo">My<span>Harau</span></div>
                    <p class="footer-text">
                        Platform digital berbasis peta yang menghubungkan masyarakat, 
                        pelaku usaha, dan wisatawan di wilayah Harau.
                    </p>
                    <div class="social-links">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mt-4 mt-md-0">
                    <div class="footer-links">
                        <h4>Tautan</h4>
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#features">Fitur</a></li>
                            <li><a href="#about">Tentang</a></li>
                            <li><a href="#peta">Peta Wisata</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="footer-links">
                        <h4>Layanan</h4>
                        <ul>
                            <li><a href="#marketplace">Marketplace UMKM</a></li>
                            <li><a href="#sewa">Sewa Kendaraan</a></li>
                            <li><a href="#akomodasi">Penginapan & Hotel</a></li>
                            <li><a href="#bantuan">Pusat Bantuan</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="footer-links">
                        <h4>Kontak</h4>
                        <ul>
                            <li><i class="bi bi-geo-alt me-2"></i> Lembah Harau, Lima Puluh Kota</li>
                            <li><i class="bi bi-telephone me-2"></i> +62 823 1234 5678</li>
                            <li><i class="bi bi-envelope me-2"></i> info@myharau.id</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2025 MyHarau. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar Functions
        function toggleSidebar() {
            const sidebar = document.getElementById("mySidebar");
            if (sidebar.style.width === "250px") {
                closeSidebar();
            } else {
                sidebar.style.width = "250px";
            }
        }
        
        function closeSidebar() {
            document.getElementById("mySidebar").style.width = "0";
        }
        
        // Scroll Animation for Navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow');
                navbar.style.padding = "10px 0";
            } else {
                navbar.classList.remove('shadow');
                navbar.style.padding = "15px 0";
            }
        });
    </script>
</body>

</html>