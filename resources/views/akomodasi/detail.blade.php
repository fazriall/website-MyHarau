@extends('layouts.akomodasi')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            @if($akomodasi->foto)
                <img src="{{ asset('storage/' . $akomodasi->foto) }}" class="img-fluid rounded shadow">
            @endif
        </div>
        <div class="col-md-6">
            <h2>{{ $akomodasi->nama }}</h2>
            <p class="text-muted">{{ $akomodasi->tipe }}</p>
            <p>{{ $akomodasi->deskripsi }}</p>
            <p><strong>Alamat:</strong> {{ $akomodasi->alamat }}</p>
            <p><strong>Telepon:</strong> {{ $akomodasi->telepon }}</p>

            @if($akomodasi->tipe == 'Penginapan')
                <p><strong>Jenis:</strong> {{ $akomodasi->jenis_penginapan }}</p>
                <p><strong>Fasilitas:</strong> {{ $akomodasi->fasilitas }}</p>
                <p><strong>Harga:</strong> Rp {{ number_format($akomodasi->harga, 0, ',', '.') }}/malam</p>
            @elseif($akomodasi->tipe == 'Kendaraan')
                <p><strong>Jenis:</strong> {{ $akomodasi->jenis_kendaraan }}</p>
                <p><strong>Kapasitas:</strong> {{ $akomodasi->kapasitas }} orang</p>
                <p><strong>Harga:</strong> Rp {{ number_format($akomodasi->harga, 0, ',', '.') }}/hari</p>
            @endif

            <a href="{{ route('akomodasi.pembayaran', $akomodasi->id) }}" class="btn btn-success mt-3">Lanjut ke Pembayaran</a>
        </div>
    </div>
</div>
@endsection
