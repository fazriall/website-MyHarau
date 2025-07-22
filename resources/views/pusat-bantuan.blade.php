@extends('layouts.bantuan')

@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($bantuan as $item)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-success">{{ $item->nama_tempat }}</h5>
                    <p class="card-text"><strong>Jenis:</strong> {{ $item->kategori }}</p>
                    <p class="card-text"><strong>Alamat:</strong> {{ $item->alamat }}</p>
                    <p class="card-text"><strong>Telepon:</strong> <a href="tel:{{ $item->telepon }}">{{ $item->telepon }}</a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
