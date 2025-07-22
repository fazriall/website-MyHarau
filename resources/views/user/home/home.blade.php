@extends('user.user')

@section('content')
<!-- Hero Section for Marketplace -->
<section class="marketplace-hero bg-light py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold mb-3">Marketplace <span class="text-success">MyHarau</span></h1>
                <p class="lead mb-4">Temukan produk lokal dari pelaku UMKM di sekitar Lembah Harau. Dukung ekonomi lokal dengan berbelanja produk berkualitas dari para pelaku usaha di sekitar Anda.</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg" placeholder="Cari produk di sini..." aria-label="Cari produk">
                    <button class="btn btn-success" type="button"><i class="bi bi-search"></i></button>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block text-center">
                <img src="{{ asset('assets/img/marketplace-hero.png') }}" alt="Marketplace MyHarau" class="img-fluid rounded-3" style="max-height: 300px;">
            </div>
        </div>
    </div>
</section>

<!-- Categories and Products -->
<section class="marketplace-content py-5">
    <div class="container">
        <!-- Filter Bar -->
        <div class="filter-bar mb-4 p-3 bg-white rounded-3 shadow-sm">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="mb-3 mb-md-0">Filter Produk</h5>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="btn-group w-100 w-md-auto">
                        <button type="button" class="btn btn-outline-secondary" id="produk-terdekat-btn" onclick="getLocation()">
                            <i class="bi bi-geo-alt me-1"></i> Produk Terdekat
                        </button>
                        <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Harga: Terendah - Tertinggi</a></li>
                            <li><a class="dropdown-item" href="#">Harga: Tertinggi - Terendah</a></li>
                            <li><a class="dropdown-item" href="#">Terlaris</a></li>
                            <li><a class="dropdown-item" href="#">Terbaru</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Categories Sidebar -->
            <div class="col-lg-3 mb-4">
                <div class="category-sidebar bg-white p-4 rounded-3 shadow-sm">
                    <h5 class="border-bottom pb-3 mb-3">Kategori Produk</h5>
                    
                    <div class="category-list">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="home" class="category-item d-flex align-items-center text-decoration-none text-dark fw-medium py-1">
                                <i class="bi bi-grid me-2 text-success"></i>
                                <span>Semua Produk</span>
                            </a>
                            <span class="badge bg-light text-dark rounded-pill">{{ count($produk) }}</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="#" class="category-item d-flex align-items-center text-decoration-none text-dark fw-medium py-1">
                                <i class="bi bi-bag-heart me-2 text-success"></i>
                                <span>Pakaian</span>
                            </a>
                            <span class="badge bg-light text-dark rounded-pill">12</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="#" class="category-item d-flex align-items-center text-decoration-none text-dark fw-medium py-1">
                                <i class="bi bi-cpu me-2 text-success"></i>
                                <span>Elektronik</span>
                            </a>
                            <span class="badge bg-light text-dark rounded-pill">8</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="#" class="category-item d-flex align-items-center text-decoration-none text-dark fw-medium py-1">
                                <i class="bi bi-tools me-2 text-success"></i>
                                <span>Alat Tani</span>
                            </a>
                            <span class="badge bg-light text-dark rounded-pill">15</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="#" class="category-item d-flex align-items-center text-decoration-none text-dark fw-medium py-1">
                                <i class="bi bi-egg-fried me-2 text-success"></i>
                                <span>Makanan</span>
                            </a>
                            <span class="badge bg-light text-dark rounded-pill">24</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="#" class="category-item d-flex align-items-center text-decoration-none text-dark fw-medium py-1">
                                <i class="bi bi-droplet me-2 text-success"></i>
                                <span>Peralatan Mandi</span>
                            </a>
                            <span class="badge bg-light text-dark rounded-pill">7</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="#" class="category-item d-flex align-items-center text-decoration-none text-dark fw-medium py-1">
                                <i class="bi bi-basket me-2 text-success"></i>
                                <span>Produk Olahan Pertanian</span>
                            </a>
                            <span class="badge bg-light text-dark rounded-pill">19</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="#" class="category-item d-flex align-items-center text-decoration-none text-dark fw-medium py-1">
                                <i class="bi bi-flower1 me-2 text-success"></i>
                                <span>Tanaman Hias</span>
                            </a>
                            <span class="badge bg-light text-dark rounded-pill">11</span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="category-item d-flex align-items-center text-decoration-none text-dark fw-medium py-1">
                                <i class="bi bi-bucket me-2 text-success"></i>
                                <span>Produk Kebersihan</span>
                            </a>
                            <span class="badge bg-light text-dark rounded-pill">6</span>
                        </div>
                    </div>
                    
                    <!-- Price Filter -->
                    <h5 class="border-bottom pb-3 mb-3 mt-4">Rentang Harga</h5>
                    <div class="price-filter mb-4">
                        <div class="row g-2">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Min" aria-label="Minimum price">
                            </div>
                            <div class="col-auto">-</div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Max" aria-label="Maximum price">
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm w-100 mt-2">Terapkan Filter</button>
                    </div>
                    
                    <!-- Popular Tags -->
                    <h5 class="border-bottom pb-3 mb-3">Tags Populer</h5>
                    <div class="tags">
                        <a href="#" class="badge bg-light text-dark text-decoration-none mb-2 me-1 p-2">Organik</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none mb-2 me-1 p-2">Hand Made</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none mb-2 me-1 p-2">Lokal</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none mb-2 me-1 p-2">Tradisional</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none mb-2 me-1 p-2">Hemat</a>
                        <a href="#" class="badge bg-light text-dark text-decoration-none mb-2 me-1 p-2">Eksklusif</a>
                    </div>
                </div>
            </div>
            
            <!-- Product List -->
            <div class="col-lg-9">
                <!-- Category Tags -->
                <div class="category-tags d-flex flex-wrap gap-2 mb-4 d-lg-none">
                    <a href="home" class="btn btn-sm btn-outline-success rounded-pill">Semua</a>
                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill">Pakaian</a>
                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill">Elektronik</a>
                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill">Alat Tani</a>
                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill">Makanan</a>
                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill">Peralatan Mandi</a>
                </div>
                
                <!-- Products Grid -->
                <div class="row g-3" id="produk-list">
                    @forelse ($produk as $item)
                        <div class="col-6 col-md-4 mb-4" data-lat="{{ $item->latitude }}" data-lng="{{ $item->longitude }}">
                            <div class="card h-100 product-card border-0 shadow-sm">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/produk/' . $item->product_img) }}" class="card-img-top" alt="{{ $item->product_img }}" style="height: 200px; object-fit: cover;">
                                    <div class="product-overlay">
                                        <button class="btn btn-sm btn-light rounded-circle shadow-sm" title="Tambah ke wishlist">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                        <button class="btn btn-sm btn-light rounded-circle shadow-sm" title="Tambah ke keranjang">
                                            <i class="bi bi-cart-plus"></i>
                                        </button>
                                    </div>
                                    @if($item->sales > 50)
                                        <span class="badge bg-success position-absolute top-0 start-0 m-2">Terlaris</span>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title mb-1 product-title">{{ Str::limit($item->product_name, 40) }}</h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-success fw-bold">Rp {{ number_format($item->product_price, 0, ',', '.') }}</span>
                                        <small class="text-muted">{{ $item->sales }} terjual</small>
                                    </div>
                                    @if(isset($item->distance))
                                        <div class="d-flex align-items-center mt-2 text-muted" style="font-size: 0.85rem;">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            <span>{{ number_format($item->distance, 2) }} km dari Anda</span>
                                        </div>
                                    @endif
                                </div>
                                <a href="/produk/{{ $item->id }}" class="stretched-link"></a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info d-flex align-items-center" role="alert">
                                <i class="bi bi-info-circle-fill me-2"></i>
                                <div>
                                    Produk tidak ditemukan. Silakan coba filter atau pencarian lain.
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                
                <!-- Pagination -->
                <nav class="mt-4" aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Featured Sellers -->
<section class="featured-sellers py-5 bg-light">
    <div class="container">
        <h2 class="mb-4">Penjual Unggulan</h2>
        <div class="row g-4">
            <!-- Seller 1 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="seller-avatar mb-3">
                            <img src="{{ asset('assets/img/seller1.jpg') }}" alt="Seller" class="rounded-circle" width="80" height="80">
                        </div>
                        <h5>Toko Tani Makmur</h5>
                        <p class="text-muted">Produk Hasil Tani Segar</p>
                        <div class="d-flex justify-content-center mb-3">
                            <span class="me-2"><i class="bi bi-star-fill text-warning"></i> 4.8</span>
                            <span class="border-start ps-2">42 Produk</span>
                        </div>
                        <a href="#" class="btn btn-outline-success btn-sm">Kunjungi Toko</a>
                    </div>
                </div>
            </div>
            
            <!-- Seller 2 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="seller-avatar mb-3">
                            <img src="{{ asset('assets/img/seller2.jpg') }}" alt="Seller" class="rounded-circle" width="80" height="80">
                        </div>
                        <h5>Kerajinan Harau</h5>
                        <p class="text-muted">Produk Kerajinan Tradisional</p>
                        <div class="d-flex justify-content-center mb-3">
                            <span class="me-2"><i class="bi bi-star-fill text-warning"></i> 4.9</span>
                            <span class="border-start ps-2">36 Produk</span>
                        </div>
                        <a href="#" class="btn btn-outline-success btn-sm">Kunjungi Toko</a>
                    </div>
                </div>
            </div>
            
            <!-- Seller 3 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <div class="seller-avatar mb-3">
                            <img src="{{ asset('assets/img/seller3.jpg') }}" alt="Seller" class="rounded-circle" width="80" height="80">
                        </div>
                        <h5>Bunda Catering</h5>
                        <p class="text-muted">Makanan & Kue Tradisional</p>
                        <div class="d-flex justify-content-center mb-3">
                            <span class="me-2"><i class="bi bi-star-fill text-warning"></i> 4.7</span>
                            <span class="border-start ps-2">28 Produk</span>
                        </div>
                        <a href="#" class="btn btn-outline-success btn-sm">Kunjungi Toko</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Product Card Styling */
    .product-card {
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
    }
    
    .product-overlay {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        flex-direction: column;
        gap: 5px;
        opacity: 0;
        transition: opacity 0.3s;
    }
    
    .product-card:hover .product-overlay {
        opacity: 1;
    }
    
    .product-title {
        min-height: 40px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Category Sidebar */
    .category-item {
        transition: all 0.3s;
    }
    
    .category-item:hover {
        color: #28a745 !important;
        transform: translateX(5px);
    }
    
    /* Filter Bar */
    .filter-bar {
        border-left: 4px solid #28a745;
    }
    
    /* Hero Section */
    .marketplace-hero {
        background: linear-gradient(to right, #f8f9fa, #e9ecef);
        border-bottom: 1px solid #dee2e6;
    }
    
    /* Featured Sellers */
    .seller-avatar img {
        border: 3px solid #28a745;
        padding: 3px;
    }
    
    /* Category Tags */
    .category-tags .btn-outline-success {
        border-width: 1px;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 767.98px) {
        .marketplace-hero {
            padding: 30px 0;
        }
    }
</style>

<script>
    // Fungsi untuk mengambil lokasi pengguna
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation tidak didukung oleh browser ini.");
        }
    }

    // Menampilkan posisi dan mengirim ke server
    function showPosition(position) {
        let latitude = position.coords.latitude;
        let longitude = position.coords.longitude;
        
        // Menampilkan loading indicator
        document.getElementById('produk-terdekat-btn').innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mencari...';
        
        // Menambahkan parameter latitude dan longitude ke URL untuk mengirim data
        window.location.href = `?latitude=${latitude}&longitude=${longitude}`;
    }

    // Menampilkan error jika lokasi tidak ditemukan
    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("Permintaan untuk mendapatkan lokasi ditolak oleh pengguna.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Informasi lokasi tidak tersedia.");
                break;
            case error.TIMEOUT:
                alert("Permintaan untuk mendapatkan lokasi pengguna habis waktu.");
                break;
            case error.UNKNOWN_ERROR:
                alert("Terjadi kesalahan yang tidak diketahui.");
                break;
        }
    }
    
    // Add to wishlist functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Prevent click propagation on overlay buttons
        const overlayButtons = document.querySelectorAll('.product-overlay button');
        overlayButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                // Here you would add your actual wishlist/cart functionality
                alert('Fitur ini akan segera tersedia!');
            });
        });
    });
</script>
@endsection