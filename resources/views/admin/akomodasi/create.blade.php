@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Tambah Akomodasi</h2>

    <form action="{{ route('admin.akomodasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Akomodasi</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required id="tipeSelect">
                <option value="">-- Pilih Tipe --</option>
                <option value="Penginapan">Penginapan</option>
                <option value="Kendaraan">Kendaraan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>

        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control">
        </div>

        {{-- Tampilkan ini jika Penginapan --}}
        <div id="penginapanFields" style="display: none;">
            <div class="mb-3">
                <label>Jenis Penginapan</label>
                <input type="text" name="jenis_penginapan" class="form-control">
            </div>
            <div class="mb-3">
                <label>Fasilitas</label>
                <input type="text" name="fasilitas" class="form-control">
            </div>
        </div>

        {{-- Tampilkan ini jika Kendaraan --}}
        <div id="kendaraanFields" style="display: none;">
            <div class="mb-3">
                <label>Jenis Kendaraan</label>
                <input type="text" name="jenis_kendaraan" class="form-control">
            </div>
            <div class="mb-3">
                <label>Kapasitas</label>
                <input type="text" name="kapasitas" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

<script>
    document.getElementById('tipeSelect').addEventListener('change', function () {
        const tipe = this.value;
        document.getElementById('penginapanFields').style.display = (tipe === 'Penginapan') ? 'block' : 'none';
        document.getElementById('kendaraanFields').style.display = (tipe === 'Kendaraan') ? 'block' : 'none';
    });
</script>
@endsection
