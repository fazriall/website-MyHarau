<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Harau - Platform Pelayanan dan Pengaduan Terpadu</title>
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bantuan.css') }}">
    <!-- Custom CSS -->
    
    <style>
        
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <h1>
                        <i class="bi bi-megaphone-fill me-2"></i>
                        LAPOR HARAU
                    </h1>
                    <p class="mb-0">Platform Layanan Informasi & Pengaduan Terpadu</p>
                </div>
                <div class="col-md-6">
                    <div class="input-group mt-3 mt-md-0">
                        <input type="text" class="form-control search-box" placeholder="Cari informasi atau layanan...">
                        <button class="btn btn-light" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="bi bi-house-fill me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-file-earmark-text-fill me-1"></i> Buat Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-clipboard-data-fill me-1"></i> Statistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-info-circle-fill me-1"></i> Panduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-map-fill me-1"></i> Peta Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-person-lines-fill me-1"></i> Kontak</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="#" class="btn btn-outline-success me-2"><i class="bi bi-box-arrow-in-right me-1"></i> Masuk</a>
                    <a href="#" class="btn btn-gradient"><i class="bi bi-person-plus-fill me-1"></i> Daftar</a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Breadcrumb -->
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
    
    <!-- Hero Section -->
    <div class="container mt-4">
        <div class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="display-4 fw-bold">Suara Anda, Perubahan Untuk Harau</h1>
                        <p class="lead">Laporkan masalah, sampaikan aspirasi, dan pantau progres penanganan secara transparan.</p>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <a href="#" class="btn btn-gradient btn-lg"><i class="bi bi-plus-circle me-2"></i>Buat Laporan</a>
                            <a href="#" class="btn btn-outline-light btn-lg"><i class="bi bi-search me-2"></i>Cek Status</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Emergency Services -->
    <div class="container mb-5">
        <h3 class="section-title">Layanan Darurat</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="feature-card police">
                    <div class="feature-icon police">
                        <i class="bi bi-shield-fill"></i>
                    </div>
                    <h4>Polsek Harau</h4>
                    <p>Laporkan gangguan keamanan, kejahatan, atau situasi darurat kepolisian di sekitar Harau.</p>
                    <div class="d-flex mt-3">
                        <a href="#" class="btn btn-police me-2"><i class="bi bi-telephone-fill me-2"></i>Telepon</a>
                        <a href="#" class="btn btn-outline-primary"><i class="bi bi-chat-text-fill me-2"></i>Lapor</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="feature-card health">
                    <div class="feature-icon health">
                        <i class="bi bi-heart-pulse-fill"></i>
                    </div>
                    <h4>Puskesmas Harau</h4>
                    <p>Dapatkan bantuan medis, informasi kesehatan, dan layanan darurat dari Puskesmas terdekat.</p>
                    <div class="d-flex mt-3">
                        <a href="#" class="btn btn-health me-2"><i class="bi bi-telephone-fill me-2"></i>Telepon</a>
                        <a href="#" class="btn btn-outline-danger"><i class="bi bi-chat-text-fill me-2"></i>Konsultasi</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h4>Damkar & SAR</h4>
                    <p>Laporkan kebakaran, bencana alam, dan kondisi darurat lainnya yang membutuhkan evakuasi.</p>
                    <div class="d-flex mt-3">
                        <a href="#" class="btn btn-emergency me-2"><i class="bi bi-telephone-fill me-2"></i>Telepon</a>
                        <a href="#" class="btn btn-outline-danger"><i class="bi bi-chat-text-fill me-2"></i>Lapor</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
<div class="container mb-5 main-content">
    <div class="row">
        <!-- Left Side - Categories -->
        <div class="col-lg-8">
            <div class="card dashboard-card mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Kategori Pengaduan</h5>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="service-card h-100">
                                    <div class="card-body text-center">
                                        <div class="service-icon tourism-icon">
                                            <i class="bi bi-bug"></i>
                                        </div>
                                        <h5 class="card-title">Fasilitas Rusak</h5>
                                        <p class="card-text">Laporkan kerusakan toilet, tempat duduk, papan petunjuk, dll.</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="service-card h-100">
                                    <div class="card-body text-center">
                                        <div class="service-icon tourism-icon">
                                            <i class="bi bi-exclamation-triangle"></i>
                                        </div>
                                        <h5 class="card-title">Gangguan Keamanan</h5>
                                        <p class="card-text">Laporkan tindakan kriminal, gangguan wisatawan, atau hewan liar.</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="service-card h-100">
                                    <div class="card-body text-center">
                                        <div class="service-icon tourism-icon">
                                            <i class="bi bi-trash"></i>
                                        </div>
                                        <h5 class="card-title">Sampah & Kebersihan</h5>
                                        <p class="card-text">Laporkan tumpukan sampah, bau, atau kondisi kotor di area wisata.</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="service-card h-100">
                                    <div class="card-body text-center">
                                        <div class="service-icon tourism-icon">
                                            <i class="bi bi-person-x"></i>
                                        </div>
                                        <h5 class="card-title">Layanan Tidak Ramah</h5>
                                        <p class="card-text">Pengaduan terkait pelayanan petugas, pemandu, atau UMKM yang kurang baik.</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="service-card h-100">
                                    <div class="card-body text-center">
                                        <div class="service-icon tourism-icon">
                                            <i class="bi bi-geo-alt"></i>
                                        </div>
                                        <h5 class="card-title">Akses Lokasi</h5>
                                        <p class="card-text">Laporkan jalan rusak, rute membingungkan, atau tidak ada penunjuk arah.</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 mb-3">
                            <a href="#" class="text-decoration-none">
                                <div class="service-card h-100">
                                    <div class="card-body text-center">
                                        <div class="service-icon tourism-icon">
                                            <i class="bi bi-info-circle"></i>
                                        </div>
                                        <h5 class="card-title">Informasi Tidak Lengkap</h5>
                                        <p class="card-text">Pengaduan tentang kurangnya informasi lokasi, jadwal, atau layanan.</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-tourism"><i class="bi bi-send me-2"></i>Ajukan Pengaduan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>                
            
            <!-- Right Side - Information and Trending -->
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="card dashboard-card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-lightning-fill me-2"></i>Aksi Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-3">
                            <a href="#" class="btn btn-gradient"><i class="bi bi-plus-circle me-2"></i>Buat Laporan Baru</a>
                            <a href="#" class="btn btn-outline-primary"><i class="bi bi-search me-2"></i>Cek Status Laporan</a>
                            <a href="#" class="btn btn-emergency"><i class="bi bi-telephone-fill me-2"></i>Panggilan Darurat</a>
                            <a href="#" class="btn btn-police"><i class="bi bi-shield me-2"></i>Hubungi Polsek</a>
                            <a href="#" class="btn btn-health"><i class="bi bi-heart-pulse me-2"></i>Layanan Kesehatan</a>
                            <a href="#" class="btn btn-tourism"><i class="bi bi-info-circle me-2"></i>Informasi Wisata</a>
                        </div>
                    </div>
                </div>
                
                <!-- Tourist Help -->
                <div class="card dashboard-card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-info-circle-fill me-2"></i>Bantuan Wisatawan</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="category-icon tourism-icon me-3">
                                <i class="bi bi-translate"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Layanan Penerjemah</h6>
                                <p class="small text-muted mb-0">Tersedia dalam 4 bahasa</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="category-icon tourism-icon me-3">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Penukaran Mata Uang</h6>
                                <p class="small text-muted mb-0">Lokasi ATM dan money changer</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="category-icon tourism-icon me-3">
                                <i class="bi bi-car-front"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Transportasi</h6>
                                <p class="small text-muted mb-0">Sewa kendaraan dan ojek lokal</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="category-icon tourism-icon me-3">
                                <i class="bi bi-phone"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Hotline Wisatawan</h6>
                                <p class="small text-muted mb-0">0812-3456-7890</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Weather Info -->
                <div class="card dashboard-card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-cloud-sun-fill me-2"></i>Cuaca Harau</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="bi bi-cloud-sun fs-1 text-warning"></i>
                        </div>
                        <h3 class="mb-0">27°C</h3>
                        <p class="text-muted">Cerah Berawan</p>
                        <div class="row mt-3">
                            <div class="col-4">
                                <p class="small mb-0"><i class="bi bi-droplet me-1"></i>80%</p>
                                <small class="text-muted">Kelembaban</small>
                            </div>
                            <div class="col-4">
                                <p class="small mb-0"><i class="bi bi-wind me-1"></i>5 km/j</p>
                                <small class="text-muted">Angin</small>
                            </div>
                            <div class="col-4">
                                <p class="small mb-0"><i class="bi bi-umbrella me-1"></i>10%</p>
                                <small class="text-muted">Hujan</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Chat Button -->
    <div class="chat-button" id="openChat">
        <i class="bi bi-chat-dots-fill"></i>
    </div>
    
    <!-- Chat Window -->
    <div class="chat-window" id="chatWindow">
        <div class="chat-header">
            <div>
                <h5 class="mb-0">Pusat Bantuan</h5>
                <small>Bantuan 24/7</small>
            </div>
            <div class="chat-close" id="closeChat">
                <i class="bi bi-x-lg"></i>
            </div>
        </div>
        <div class="chat-messages">
            <div class="message bot-message">
                Halo! Selamat datang di Layanan Lapor Harau. Ada yang bisa saya bantu?
            </div>
            <div class="message user-message">
                Bagaimana cara melaporkan jalan rusak?
            </div>
            <div class="message bot-message">
                Untuk melaporkan jalan rusak, Anda bisa klik tombol "Buat Laporan" di menu utama, lalu pilih kategori "Infrastruktur" dan ikuti petunjuk selanjutnya.
            </div>
        </div>
        <div class="chat-input">
            <input type="text" placeholder="Ketik pesan Anda...">
            <button><i class="bi bi-send-fill"></i></button>
        </div>
    </div>
    
    <!-- Emergency Modal -->
    <div class="modal fade" id="emergencyModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title"><i class="bi bi-exclamation-octagon-fill me-2"></i>Layanan Darurat</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center mb-4">Pilih layanan darurat yang Anda butuhkan:</p>
                    <div class="d-grid gap-2">
                        <a href="tel:110" class="btn btn-police btn-lg"><i class="bi bi-shield-fill me-2"></i>Polsek Harau (110)</a>
                        <a href="tel:119" class="btn btn-emergency btn-lg"><i class="bi bi-fire me-2"></i>Pemadam Kebakaran (119)</a>
                        <a href="tel:118" class="btn btn-health btn-lg"><i class="bi bi-heart-pulse-fill me-2"></i>Ambulans (118)</a>
                        <a href="tel:115" class="btn btn-warning btn-lg text-dark"><i class="bi bi-truck me-2"></i>SAR / BPBD (115)</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5><i class="bi bi-megaphone-fill me-2"></i>LAPOR HARAU</h5>
                    <p class="small">Platform pelayanan dan pengaduan terpadu untuk masyarakat dan wisatawan di kawasan Lembah Harau.</p>
                    <div class="app-download">
    
                    </div>
                <p class="small mb-0">&copy; 2025 Lapor Harau. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://>
                            <div class="col-md-4 mb-3">
                                <a href="#" class="text-decoration-none">
                                    <div class="service-card h-100">
                                        <div class="card-body text-center">
                                            <div class="service-icon">
                                                <i class="bi bi-cone-striped"></i>
                                            </div>
                                            <h5 class="card-title">Infrastruktur</h5>
                                            <p class="card-text">Jalan rusak, jembatan, saluran air, dll.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <a href="#" class="text-decoration-none">
                                    <div class="service-card h-100">
                                        <div class="card-body text-center">
                                            <div class="service-icon">
                                                <i class="bi bi-trash"></i>
                                            </div>
                                            <h5 class="card-title">Kebersihan</h5>
                                            <p class="card-text">Sampah, limbah, polusi, dll.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <a href="#" class="text-decoration-none">
                                    <div class="service-card h-100">
                                        <div class="card-body text-center">
                                            <div class="service-icon">
                                                <i class="bi bi-building"></i>
                                            </div>
                                            <h5 class="card-title">Fasilitas Umum</h5>
                                            <p class="card-text">Taman, pasar, fasilitas publik, dll.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <a href="#" class="text-decoration-none">
                                    <div class="service-card h-100">
                                        <div class="card-body text-center">
                                            <div class="service-icon">
                                                <i class="bi bi-lightning-charge"></i>
                                            </div>
                                            <h5 class="card-title">Listrik & Air</h5>
                                            <p class="card-text">Pemadaman, kebocoran pipa, dll.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <a href="#" class="text-decoration-none">
                                    <div class="service-card h-100">
                                        <div class="card-body text-center">
                                            <div class="service-icon">
                                                <i class="bi bi-shield"></i>
                                            </div>
                                            <h5 class="card-title">Keamanan</h5>
                                            <p class="card-text">Gangguan ketertiban, keamanan lingkungan.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <a href="#" class="text-decoration-none">
                                    <div class="service-card h-100">
                                        <div class="card-body text-center">
                                            <div class="service-icon">
                                                <i class="bi bi-file-earmark-text"></i>
                                            </div>
                                            <h5 class="card-title">Layanan Publik</h5>
                                            <p class="card-text">Administrasi, pelayanan, birokrasi.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Tourism Information -->
                <div class="card dashboard-card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0"><i class="bi bi-binoculars-fill me-2"></i>Informasi Wisatawan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row"