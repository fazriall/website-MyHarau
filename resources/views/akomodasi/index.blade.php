@extends('layouts.akomodasi')

@section('content')
<style>
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url("{{ asset('assets/img/harau-background.jpg') }}");
        background-size: cover;
        background-position: center;
        color: white;
        padding: 60px 0;
        margin-bottom: 40px;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .page-title {
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 36px;
    }
    
    .page-subtitle {
        font-weight: 300;
        margin-bottom: 0;
    }
    
    .custom-tab {
        border-radius: 30px;
        padding: 12px 25px;
        font-weight: 600;
        background-color: transparent;
        color: #495057;
        border: none;
        margin-right: 10px;
        transition: all 0.3s ease;
    }
    
    .custom-tab.active {
        background-color: #13a06b;
        color: white;
        box-shadow: 0 4px 15px rgba(78, 115, 223, 0.2);
    }
    
    .custom-tab:hover:not(.active) {
        background-color: #f1f5fe;
    }
    
    .tab-container {
        background-color: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }
    
    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .card-img-container {
        position: relative;
        height: 220px;
        overflow: hidden;
    }
    
    .card-img-top {
        height: 100%;
        width: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .card:hover .card-img-top {
        transform: scale(1.05);
    }
    
    .card-price {
        position: absolute;
        bottom: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 8px 15px;
        font-weight: 600;
        border-radius: 10px 0 0 0;
    }
    
    .type-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        border-radius: 30px;
        padding: 5px 15px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .badge-penginapan {
        background-color: #13a06b;
        color: white;
    }
    
    .badge-kendaraan {
        background-color: #1cc88a;
        color: white;
    }
    
    .card-body {
        padding: 25px;
    }
    
    .card-title {
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 20px;
        color: #333;
    }
    
    .card-text {
        color: #6c757d;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 48px;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        margin-bottom: 12px;
        color: #555;
    }
    
    .info-item i {
        width: 22px;
        color: #13a06b;
        margin-right: 10px;
        font-size: 16px;
    }
    
    .info-item.success i {
        color: #1cc88a;
    }
    
    .info-divider {
        height: 1px;
        background-color: #e9ecef;
        margin: 15px 0;
    }
    
    .btn-detail {
        border-radius: 30px;
        padding: 10px 20px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-penginapan {
        background-color: #13a06b;
        border-color: #4e73df;
        color: white;
    }
    
    .btn-penginapan:hover {
        background-color: #13a06b;
        border-color: #2e59d9;
        box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
    }
    
    .btn-kendaraan {
        background-color: #1cc88a;
        border-color: #1cc88a;
        color: white;
    }
    
    .btn-kendaraan:hover {
        background-color: #13a06b;
        border-color: #13a06b;
        box-shadow: 0 4px 15px rgba(28, 200, 138, 0.3);
    }
    
    .btn-outline-detail {
        background-color: transparent;
        border: 2px solid #13a06b;
        color: #13a06b;
    }
    
    .btn-outline-detail:hover {
        background-color: #13a06b;
        color: white;
    }
    
    .no-results {
        padding: 60px 0;
        text-align: center;
    }
    
    .no-results i {
        font-size: 60px;
        color: #d1d3e2;
        margin-bottom: 20px;
    }
    
    .no-results h3 {
        font-weight: 600;
        color: #5a5c69;
    }
    
    @media (max-width: 767.98px) {
        .custom-tab {
            padding: 10px 15px;
            font-size: 14px;
        }
        
        .card-img-container {
            height: 180px;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container text-center">
        <h1 class="page-title">Akomodasi di Harau Valley</h1>
        <p class="page-subtitle">Temukan penginapan dan kendaraan terbaik untuk perjalanan Anda</p>
    </div>
</div>

<div class="container py-4">
    <!-- Tab navigation -->
    <ul class="nav nav-pills mb-4 justify-content-center" id="akomodasiTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="custom-tab active" id="semua-tab" data-bs-toggle="tab" data-bs-target="#semua" type="button" role="tab" aria-controls="semua" aria-selected="true">
                <i class="bi bi-grid me-2"></i>Semua Akomodasi
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="custom-tab" id="penginapan-tab" data-bs-toggle="tab" data-bs-target="#penginapan" type="button" role="tab" aria-controls="penginapan" aria-selected="false">
                <i class="bi bi-house-door me-2"></i>Penginapan
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="custom-tab" id="kendaraan-tab" data-bs-toggle="tab" data-bs-target="#kendaraan" type="button" role="tab" aria-controls="kendaraan" aria-selected="false">
                <i class="bi bi-car-front me-2"></i>Kendaraan
            </button>
        </li>
    </ul>
    
    <!-- Tab content -->
    <div class="tab-content tab-container" id="akomodasiTabContent">
        <!-- Semua Akomodasi -->
        <div class="tab-pane fade show active" id="semua" role="tabpanel" aria-labelledby="semua-tab">
            @if($akomodasis->count() > 0)
            <div class="row g-4">
                @foreach($akomodasis as $akomodasi)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-img-container">
                            @if($akomodasi->foto)
                                <img src="{{ asset('storage/' . $akomodasi->foto) }}" class="card-img-top" alt="{{ $akomodasi->nama }}">
                            @else
                                <div class="bg-light text-secondary d-flex align-items-center justify-content-center h-100">
                                    <i class="bi {{ $akomodasi->tipe == 'Penginapan' ? 'bi-house-door' : 'bi-car-front' }} fs-1"></i>
                                </div>
                            @endif
                            <div class="type-badge {{ $akomodasi->tipe == 'Penginapan' ? 'badge-penginapan' : 'badge-kendaraan' }}">
                                {{ $akomodasi->tipe }}
                            </div>
                            <div class="card-price">
                                Rp {{ number_format($akomodasi->harga ?? 0, 0, ',', '.') }}/{{ $akomodasi->tipe == 'Penginapan' ? 'malam' : 'hari' }}
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $akomodasi->nama }}</h5>
                            <p class="card-text">{{ $akomodasi->deskripsi }}</p>
                            
                            <div class="info-divider"></div>
                            
                            <div class="info-item {{ $akomodasi->tipe == 'Kendaraan' ? 'success' : '' }}">
                                <i class="{{ $akomodasi->tipe == 'Penginapan' ? 'bi bi-house-door' : 'bi bi-car-front' }}"></i>
                                <span>{{ $akomodasi->tipe == 'Penginapan' ? ($akomodasi->jenis_penginapan ?? 'Hotel/Homestay') : ($akomodasi->jenis_kendaraan ?? 'Mobil/Motor') }}</span>
                            </div>
                            
                            @if($akomodasi->tipe == 'Penginapan' && $akomodasi->fasilitas)
                            <div class="info-item">
                                <i class="bi bi-star"></i>
                                <span>{{ $akomodasi->fasilitas }}</span>
                            </div>
                            @endif
                            
                            @if($akomodasi->tipe == 'Kendaraan' && $akomodasi->kapasitas)
                            <div class="info-item success">
                                <i class="bi bi-person"></i>
                                <span>{{ $akomodasi->kapasitas }} orang</span>
                            </div>
                            @endif
                            
                            <div class="info-item">
                                <i class="bi bi-geo-alt"></i>
                                <span>{{ $akomodasi->alamat }}</span>
                            </div>
                            
                            <div class="info-item">
                                <i class="bi bi-telephone"></i>
                                <span>{{ $akomodasi->telepon }}</span>
                            </div>
                            
                            <div class="d-grid mt-4">
                                <a href="{{ route('akomodasi.detail', $akomodasi->id) }}" class="btn btn-detail {{ $akomodasi->tipe == 'Penginapan' ? 'btn-penginapan' : 'btn-kendaraan' }}">
                                    {{ $akomodasi->tipe == 'Penginapan' ? 'Pesan Penginapan' : 'Sewa Kendaraan' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="no-results">
                <i class="bi bi-search"></i>
                <h3>Tidak ada akomodasi ditemukan</h3>
                <p>Silakan coba kategori lainnya atau coba lagi nanti</p>
            </div>
            @endif
        </div>
        
        <!-- Penginapan -->
        <div class="tab-pane fade" id="penginapan" role="tabpanel" aria-labelledby="penginapan-tab">
            @if($akomodasis->where('tipe', 'Penginapan')->count() > 0)
            <div class="row g-4">
                @foreach($akomodasis->where('tipe', 'Penginapan') as $penginapan)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-img-container">
                            @if($penginapan->foto)
                                <img src="{{ asset('storage/' . $penginapan->foto) }}" class="card-img-top" alt="{{ $penginapan->nama }}">
                            @else
                                <div class="bg-light text-secondary d-flex align-items-center justify-content-center h-100">
                                    <i class="bi bi-house-door fs-1"></i>
                                </div>
                            @endif
                            <div class="type-badge badge-penginapan">Penginapan</div>
                            <div class="card-price">
                                Rp {{ number_format($penginapan->harga ?? 0, 0, ',', '.') }}/malam
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $penginapan->nama }}</h5>
                            <p class="card-text">{{ $penginapan->deskripsi }}</p>
                            
                            <div class="info-divider"></div>
                            
                            <div class="info-item">
                                <i class="bi bi-house-door"></i>
                                <span>{{ $penginapan->jenis_penginapan ?? 'Hotel/Homestay' }}</span>
                            </div>
                            
                            @if($penginapan->fasilitas)
                            <div class="info-item">
                                <i class="bi bi-star"></i>
                                <span>{{ $penginapan->fasilitas }}</span>
                            </div>
                            @endif
                            
                            <div class="info-item">
                                <i class="bi bi-geo-alt"></i>
                                <span>{{ $penginapan->alamat }}</span>
                            </div>
                            
                            <div class="info-item">
                                <i class="bi bi-telephone"></i>
                                <span>{{ $penginapan->telepon }}</span>
                            </div>
                            
                            <div class="d-grid mt-4">
                                <a href="{{ route('akomodasi.detail', $penginapan->id) }}" class="btn btn-detail btn-penginapan">
                                    Pesan Penginapan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="no-results">
                <i class="bi bi-house-door"></i>
                <h3>Tidak ada penginapan ditemukan</h3>
                <p>Silakan coba kategori lainnya atau coba lagi nanti</p>
            </div>
            @endif
        </div>
        
        <!-- Kendaraan -->
        <div class="tab-pane fade" id="kendaraan" role="tabpanel" aria-labelledby="kendaraan-tab">
            @if($akomodasis->where('tipe', 'Kendaraan')->count() > 0)
            <div class="row g-4">
                @foreach($akomodasis->where('tipe', 'Kendaraan') as $kendaraan)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <div class="card-img-container">
                            @if($kendaraan->foto)
                                <img src="{{ asset('storage/' . $kendaraan->foto) }}" class="card-img-top" alt="{{ $kendaraan->nama }}">
                            @else
                                <div class="bg-light text-secondary d-flex align-items-center justify-content-center h-100">
                                    <i class="bi bi-car-front fs-1"></i>
                                </div>
                            @endif
                            <div class="type-badge badge-kendaraan">Kendaraan</div>
                            <div class="card-price">
                                Rp {{ number_format($kendaraan->harga ?? 0, 0, ',', '.') }}/hari
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $kendaraan->nama }}</h5>
                            <p class="card-text">{{ $kendaraan->deskripsi }}</p>
                            
                            <div class="info-divider"></div>
                            
                            <div class="info-item success">
                                <i class="bi bi-car-front"></i>
                                <span>{{ $kendaraan->jenis_kendaraan ?? 'Mobil/Motor' }}</span>
                            </div>
                            
                            @if($kendaraan->kapasitas)
                            <div class="info-item success">
                                <i class="bi bi-person"></i>
                                <span>{{ $kendaraan->kapasitas }} orang</span>
                            </div>
                            @endif
                            
                            <div class="info-item success">
                                <i class="bi bi-geo-alt"></i>
                                <span>{{ $kendaraan->alamat }}</span>
                            </div>
                            
                            <div class="info-item success">
                                <i class="bi bi-telephone"></i>
                                <span>{{ $kendaraan->telepon }}</span>
                            </div>
                            
                            <div class="d-grid mt-4">
                                <a href="{{ route('akomodasi.detail', $kendaraan->id) }}" class="btn btn-detail btn-kendaraan">
                                    Sewa Kendaraan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="no-results">
                <i class="bi bi-car-front"></i>
                <h3>Tidak ada kendaraan ditemukan</h3>
                <p>Silakan coba kategori lainnya atau coba lagi nanti</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection