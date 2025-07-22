@extends('seller.master')
@section('content')
    <section class="section tambahProduk">
        <!-- Form -->
        <div class="form-add p-4 bg-white rounded-4">
            <form action="{{ route('seller.storeProduk') }}" method="POST" enctype="multipart/form-data">
                @csrf <!-- Tambahkan token CSRF untuk keamanan -->
                <div class="mb-4">
                    <label for="product_img" class="form-label">Upload Foto Produk <span>*</span></label>
                    <input type="file" class="form-control" name="product_img" id="product_img" accept="image/*" required
                        onchange="validateFileSize(this)" />
                </div>

                <div class="mb-4">
                    <label for="product_name" class="form-label">Nama Produk <span>*</span></label>
                    <input type="text" class="form-control input" name="product_name" id="product_name"
                        placeholder="Masukkan nama produk" required />
                </div>
                <div class="mb-4">
                    <label for="category" class="form-label">Kategori Produk <span>*</span></label>
                    <select name="category" id="category" class="form-select" required>
                        <option value="">Pilih Kategori</option>
                        <option value="1">makanan dan minuman</option>
                        <option value="2">pakaian</option>
                        <option value="3">aksesoris</option>
                        <option value="4">elektronik</option>
                        <option value="5">peralatan mandi</option>
                        <option value="6">Produk Olahan Pertanian</option>
                        <option value="7">Tanaman Hias</option>
                        <option value="8">produk kebersihan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="product_price" class="form-label">Harga Produk <span>*</span></label>
                    <input type="number" class="form-control input" name="product_price" id="product_price"
                        placeholder="Masukkan harga produk" required />
                </div>
                <div class="mb-4">
                    <label for="product_stock" class="form-label">Stok Produk <span>*</span></label>
                    <input type="number" class="form-control input" name="product_stock" id="product_stock"
                        placeholder="Masukkan jumlah stok" required />
                </div>
                <div class="mb-4">
                    <label for="product_desc" class="form-label">Deskripsi Produk <span>*</span></label>
                    <textarea class="form-control" name="product_desc" id="product_desc" rows="3"
                        placeholder="Masukkan deskripsi produk" required></textarea>
                </div>
                
                <div class="mb-4">
                    <label for="location" class="form-label">Lokasi Produk <span>*</span></label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="Lokasi Produk" required readonly />
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Tandai Lokasi Produk di Peta <span>*</span></label>
                    <div id="map" style="height: 300px; border-radius: 10px;"></div>
                </div>
            
            </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="history.back()" class="btn btn-secondary">
                        Kembali
                    </button>
                </div>
            </form>
        </div>
    </section>
<!-- Load Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc"></script>

<script>
let map;
let marker;

function initMap() {
    const defaultLocation = { lat: -0.0672, lng: 100.6425 }; // Titik default Harau
    map = new google.maps.Map(document.getElementById('map'), {
        center: defaultLocation,
        zoom: 14
    });

    marker = new google.maps.Marker({
        position: defaultLocation,
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP
    });

    // Update form value saat marker dipindahkan
    marker.addListener('dragend', function(event) {
        updatePosition(event.latLng.lat(), event.latLng.lng());
    });

    // Dapatkan lokasi real dari device
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const userPos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            marker.setPosition(userPos);
            map.setCenter(userPos);
            updatePosition(userPos.lat, userPos.lng);
        }, function() {
            console.log('Gagal mengambil lokasi GPS.');
        });
    } else {
        console.log('Browser tidak support Geolocation.');
    }
}

function updatePosition(lat, lng) {
    document.getElementById('latitude').value = lat;
    document.getElementById('longitude').value = lng;
    document.getElementById('location').value = `Lat: ${lat}, Lng: ${lng}`;
}

// Panggil saat window load
window.onload = initMap;
</script>


    <script>
        function validateFileSize(input) {
            const file = input.files[0];
            const maxSize = 2 * 1024 * 1024; // 2MB dalam byte

            if (file) {
                if (file.size > maxSize) {
                    alert('Ukuran file tidak boleh lebih dari 2MB. Silakan pilih file yang lebih kecil.');
                    input.value = ''; // Reset input file
                }
            }
        }
    </script>
@endsection
