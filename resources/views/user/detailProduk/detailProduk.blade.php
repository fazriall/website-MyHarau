@extends('user.user')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }

        .product-container {
            max-width: 1200px;
            margin: 30px auto;
        }

        .product-details {
            background: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .product-info {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
        }

        .product-gallery {
            flex: 0 0 400px;
        }

        .product-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .product-image:hover {
            transform: scale(1.02);
        }

        .product-text {
            flex: 1;
            min-width: 300px;
        }

        .product-title {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .product-meta {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            color: #666;
            font-size: 14px;
        }

        .sales-count {
            display: flex;
            align-items: center;
        }
        
        .sales-count i {
            margin-right: 5px;
            color: #4caf50;
        }

        .store-info {
            margin-top: 15px;
            padding: 12px 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            display: flex;
            align-items: center;
        }
        
        .store-info i {
            margin-right: 10px;
            color: #3498db;
            font-size: 18px;
        }

        .price-section {
            margin: 25px 0;
        }

        .current-price {
            font-size: 28px;
            font-weight: 700;
            color: #ff4757;
            margin-bottom: 5px;
        }

        .quantity-section {
            margin: 25px 0;
        }

        .quantity-wrapper {
            display: flex;
            align-items: center;
            max-width: 150px;
            border: 1px solid #ddd;
            border-radius: 6px;
            overflow: hidden;
        }

        .quantity-btn {
            background: #f1f1f1;
            border: none;
            color: #333;
            width: 40px;
            height: 40px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .quantity-btn:hover {
            background: #e1e1e1;
        }

        #quantity {
            width: 60px;
            border: none;
            text-align: center;
            font-size: 16px;
            height: 40px;
            -moz-appearance: textfield;
        }

        #quantity::-webkit-outer-spin-button,
        #quantity::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .stock-info {
            display: flex;
            align-items: center;
            margin-top: 12px;
            color: #666;
            font-size: 14px;
        }
        
        .stock-info i {
            margin-right: 5px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .add-to-cart, .buy-now {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s;
        }
        
        .add-to-cart i, .buy-now i {
            margin-right: 8px;
        }

        .add-to-cart {
            background-color: #fff;
            color: #ff9f43;
            border: 2px solid #ff9f43;
        }

        .add-to-cart:hover {
            background-color: #ff9f43;
            color: #fff;
        }

        .buy-now {
            background-color: #ff4757;
            color: #fff;
        }

        .buy-now:hover {
            background-color: #ff2c40;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(255, 71, 87, 0.3);
        }

        .product-tabs {
            margin-top: 30px;
        }

        .tab-content {
            background: #fff;
            border-radius: 0 0 12px 12px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .description-heading {
            font-size: 22px;
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f1f1f1;
        }

        .product-description p {
            line-height: 1.7;
            color: #555;
        }

        @media (max-width: 992px) {
            .product-gallery {
                flex: 0 0 100%;
                max-width: 500px;
                margin: 0 auto 30px;
            }
            
            .product-info {
                flex-direction: column;
                gap: 20px;
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>

    <div class="product-container">
        <div class="product-details">
            <div class="product-info">
                <div class="product-gallery">
                    <img src="{{ asset('storage/produk/' . $produk->product_img) }}" alt="{{ $produk->product_name }}" class="product-image" />
                </div>
                
                <div class="product-text">
                    <h1 class="product-title">{{ $produk->product_name }}</h1>
                    
                    <div class="product-meta">
                        <div class="sales-count">
                            <i class="fas fa-shopping-bag"></i>
                            <span>{{ $produk->sales }} Terjual</span>
                        </div>
                    </div>
                    
                    @if ($produk->toko)
                    <div class="store-info">
                        <i class="fas fa-store"></i>
                        <span><strong>{{ $produk->toko->nama_toko }}</strong></span>
                    </div>
                    @endif
                    
                    <div class="price-section">
                        <p class="current-price">Rp {{ number_format($produk->product_price, 0, ',', '.') }}</p>
                    </div>
                    
                    <div class="quantity-section">
                        <label for="quantity" class="mb-2 d-block">Jumlah:</label>
                        <div class="quantity-wrapper">
                            <button type="button" class="quantity-btn" onclick="decrementQuantity()">-</button>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $produk->product_stock }}" />
                            <button type="button" class="quantity-btn" onclick="incrementQuantity()">+</button>
                        </div>
                        <div class="stock-info">
                            <i class="fas fa-box-open"></i>
                            <span>Stok tersedia: {{ $produk->product_stock }}</span>
                        </div>
                    </div>
                    
                    <div class="action-buttons">
                        <form action="{{ route('user.tambahKeranjang', $produk->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" id="quantity-cart" value="1" />
                            <button type="submit" class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                Masukkan Ke Keranjang
                            </button>
                        </form>
                        
                        <form action="{{ route('checkout.direct') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $produk->id }}" />
                            <input type="hidden" name="quantity" id="quantity-buy" value="1" />
                            <button type="submit" class="buy-now">
                                <i class="fas fa-bolt"></i>
                                Beli Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="product-tabs">
            <div class="tab-content">
                <h2 class="description-heading">Deskripsi Produk</h2>
                <div class="product-description">
                    <p>{{ $produk->product_desc }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function incrementQuantity() {
            const input = document.getElementById('quantity');
            const max = parseInt(input.getAttribute('max'));
            const currentValue = parseInt(input.value);
            
            if (currentValue < max) {
                input.value = currentValue + 1;
                updateHiddenInputs();
            }
        }
        
        function decrementQuantity() {
            const input = document.getElementById('quantity');
            const currentValue = parseInt(input.value);
            
            if (currentValue > 1) {
                input.value = currentValue - 1;
                updateHiddenInputs();
            }
        }
        
        function updateHiddenInputs() {
            const quantity = document.getElementById('quantity').value;
            document.getElementById('quantity-cart').value = quantity;
            document.getElementById('quantity-buy').value = quantity;
        }
        
        document.getElementById('quantity').addEventListener('input', function() {
            updateHiddenInputs();
        });
    </script>
@endsection