@extends('layouts.akomodasi')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Form Pembayaran - {{ $akomodasi->nama }}</h2>

    <form method="POST" action="#">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>

        @if($akomodasi->tipe == 'Penginapan')
            <div class="mb-3">
                <label for="jumlah_malam" class="form-label">Jumlah Malam</label>
                <input type="number" class="form-control" id="jumlah_malam" name="jumlah_malam" min="1" required>
            </div>
        @else
            <div class="mb-3">
                <label for="jumlah_hari" class="form-label">Jumlah Hari</label>
                <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" min="1" required>
            </div>
        @endif

        <div class="mb-3">
            <label for="metode" class="form-label">Metode Pembayaran</label>
            <select class="form-select" name="metode" id="metode" required>
                <option value="">Pilih Metode</option>
                <option value="transfer">Transfer Bank</option>
                <option value="cod">Bayar di Tempat</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
    </form>
</div>
@endsection
