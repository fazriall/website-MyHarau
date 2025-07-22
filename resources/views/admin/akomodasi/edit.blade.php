@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Akomodasi</h2>

    <form action="{{ route('admin.akomodasi.update', $akomodasi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Akomodasi</label>
            <input type="text" name="nama" class="form-control" value="{{ $akomodasi->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Tipe</label>
            <select name="tipe" class="form-control" required id="tipeSelect">
                <option value="">-- Pilih Tipe --</option>
                <option value="Penginapan" {{ $akomodasi->tipe == 'Penginapan' ? 'selected' : '' }}>Penginapan</option>
                <option value="Kendaraan" {{ $akomodasi->tipe == 'Kendaraan' ? 'selected' : '' }}>Kendaraan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $akomodasi->harga }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $akomodasi->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $akomodasi->alamat }}">
        </div>

        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $akomodasi->telepon }}">
        </div>

        {{-- Penginapan --}}
        <div id="penginapanFields" style="display: {{ $akomodasi->tipe == 'Penginapan' ? 'block' : 'none' }};">
            <div class="mb-3">
                <label>Jenis Penginapan</label>
                <input type="text" name="jenis_penginapan" class="form-control" value="{{ $akomodasi->jenis_penginapan }}">
            </div>
            <div class="mb-3">
                <label>Fasilitas</label>
                <input type="text" name="fasilitas" class="form-control" value="{{ $akomodasi->fasilitas }}">
            </div>
        </div>

        {{-- Kendaraan --}}
        <div id="kendaraanFields" style="display: {{ $akomodasi->tipe == 'Kendaraan' ? 'block' : 'none' }};">
            <div class="mb-3">
                <label>Jenis Kendaraan</label>
                <input type="text" name="jenis_kendaraan" class="form-control" value="{{ $akomodasi->jenis_kendaraan }}">
            </div>
            <div class="mb-3">
                <label>Kapasitas</label>
                <input type="text" name="kapasitas" class="form-control" value="{{ $akomodasi->kapasitas }}">
            </div>
        </div>

        <div class="mb-3">
            <label>Foto</label><br>
            @if($akomodasi->foto)
                <img src="{{ asset('storage/' . $akomodasi->foto) }}" width="100"><br>
            @endif
            <input type="file" name="foto" class="form-control mt-2">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
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
