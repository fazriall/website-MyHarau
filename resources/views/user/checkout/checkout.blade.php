@extends('user.user')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h4 class="mb-0">Checkout</h4>
        </div>
        <div class="card-body">
            <!-- Alamat Pengiriman dengan Card -->
            <div class="card mb-4 border-primary">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                        Alamat Pengiriman
                    </h5>
                    @if ($address)
                    <a href="{{ url('/profileUser') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit Alamat
                    </a>
                    @else
                    <a href="{{ url('/profileUser') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Alamat
                    </a>
                    @endif
                </div>

                <div class="card-body">
                    @if ($address)
                    <h6 class="fw-bold">{{ $address }}</h6>
                    @else
                    <div class="alert alert-warning mb-0">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Alamat belum ditambahkan! Harap tambahkan alamat untuk melanjutkan checkout.
                    </div>
                    @endif
                </div>
            </div>

            <!-- Daftar Produk di Keranjang -->
            <h5 class="mb-3">
                <i class="fas fa-shopping-cart text-primary me-2"></i>
                Daftar Belanja
            </h5>

            @if (!empty($cart) && count($cart) > 0)
                <div class="table-responsive mb-4">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Subtotal</th>
                                <th>Pengiriman</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/produk/' . $item['produk']->product_img) }}"
                                            alt="{{ $item['produk']->product_name }}" class="img-thumbnail me-3" style="width: 60px; height: 60px; object-fit: cover;" />
                                        <div>
                                            <h6 class="mb-0">{{ $item['produk']->product_name }}</h6>
                                            <small class="text-muted">{{ Str::limit($item['produk']->product_desc, 50) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>Rp{{ number_format($item['produk']->product_price, 0, ',', '.') }}</td>
                                <td>{{ $item['jumlah'] }}</td>
                                <td>Rp{{ number_format($item['jumlah'] * $item['produk']->product_price, 0, ',', '.') }}</td>
                                <td>
                                    <div class="shipping-info">
                                        <span class="badge bg-info text-dark mb-1">
                                            <i class="fas fa-route me-1"></i>
                                            {{ number_format($item['jarak'], 1) }} km
                                        </span>
                                        <div>
                                            <span class="fw-bold">Rp{{ number_format($item['ongkir_produk'], 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-shopping-cart fa-2x mb-3"></i>
                    <p class="mb-0">Keranjang Anda kosong.</p>
                    <a href="{{ url('/products') }}" class="btn btn-primary mt-3">Belanja Sekarang</a>
                </div>
            @endif

            <!-- Ringkasan Belanja -->
            @if (!empty($cart) && count($cart) > 0)
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">
                                    <i class="fas fa-info-circle text-primary me-2"></i>
                                    Info Pengiriman
                                </h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-2">Lokasi pengiriman dihitung berdasarkan jarak antara lokasi toko dan alamat pengiriman Anda.</p>
                                <div class="shipping-policy mt-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-circle text-success me-2" style="font-size: 10px;"></i>
                                        <span>Dalam radius 10 km: Rp10.000</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-circle text-warning me-2" style="font-size: 10px;"></i>
                                        <span>Lebih dari 10 km: Rp10.000 + Rp1.000/km</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">
                                    <i class="fas fa-calculator text-primary me-2"></i>
                                    Ringkasan Belanja
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Total Harga Barang:</span>
                                    <span>Rp{{ number_format($totalPrice, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Total Ongkos Kirim:</span>
                                    <span>Rp{{ number_format($shippingFee, 0, ',', '.') }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Biaya Admin:</span>
                                    <span>Rp{{ number_format($adminFee, 0, ',', '.') }}</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between fw-bold">
                                    <span>Total Belanja:</span>
                                    <span class="text-primary">Rp{{ number_format($finalTotal, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Checkout -->
                <div class="mt-4 text-end">
                    @if ($address)
                    <a href="{{ route('checkout.payment') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-credit-card me-2"></i>
                        Pilih Pembayaran
                    </a>
                    @else
                    <button class="btn btn-secondary btn-lg disabled">
                        <i class="fas fa-credit-card me-2"></i>
                        Pilih Pembayaran
                    </button>
                    <div class="text-danger mt-2">
                        <small><i class="fas fa-exclamation-circle me-1"></i> Harap tambahkan alamat terlebih dahulu</small>
                    </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border-radius: 10px;
        overflow: hidden;
    }
    
    .card-header {
        border-bottom: 1px solid rgba(0,0,0,.125);
    }
    
    .table img {
        border-radius: 5px;
    }
    
    .shipping-info {
        display: flex;
        flex-direction: column;
    }
    
    .badge {
        display: inline-block;
        font-weight: normal;
    }
    
    .btn-primary {
        background-color: #3490dc;
        border-color: #3490dc;
    }
    
    .btn-primary:hover {
        background-color: #2779bd;
        border-color: #2779bd;
    }
    
    .text-primary {
        color: #3490dc !important;
    }
    
    .border-primary {
        border-color: #e8f4ff !important;
    }
</style>
@endpush

@push('scripts')
<script>
    // Menambahkan Font Awesome jika belum ada
    if (!document.querySelector('link[href*="fontawesome"]')) {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css';
        document.head.appendChild(link);
    }
</script>
@endpush