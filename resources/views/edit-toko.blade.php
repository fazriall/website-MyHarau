@extends('seller.master')

@section('content')
<div class="pagetitle">
    <h1>Edit Toko</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Toko</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Toko</h5>

                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('update.toko') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="nama_toko" class="col-sm-2 col-form-label">Nama Toko</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_toko" name="nama_toko" 
                                    value="{{ $toko->nama_toko ?? old('nama_toko') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" 
                                    rows="5">{{ $toko->deskripsi ?? old('deskripsi') }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="alamat" name="alamat" 
                                    rows="3" required>{{ $toko->alamat ?? old('alamat') }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_telepon" class="col-sm-2 col-form-label">No. Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" 
                                    value="{{ $toko->no_telepon ?? old('no_telepon') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_dana" class="col-sm-2 col-form-label">No. Dana</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_dana" name="no_dana" 
                                    value="{{ $toko->no_dana ?? old('no_dana') }}" placeholder="Masukkan nomor DANA Anda">
                                <div class="form-text">Format: Nomor handphone yang terdaftar di DANA</div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="qris" class="col-sm-2 col-form-label">QRIS</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="qris" name="qris">
                                <div class="form-text">Upload gambar QR Code QRIS Anda</div>
                                @if(isset($toko) && $toko->qris)
                                <div class="mt-3">
                                    <p>QRIS saat ini:</p>
                                    <img src="{{ asset('storage/' . $toko->qris) }}" alt="QRIS Toko" 
                                        style="max-width: 200px; max-height: 200px;">
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="logo_toko" class="col-sm-2 col-form-label">Logo Toko</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="logo_toko" name="logo_toko">
                                <div class="form-text">Upload logo baru untuk mengganti logo lama.</div>
                                @if(isset($toko) && $toko->logo_toko)
                                <div class="mt-3">
                                    <p>Logo saat ini:</p>
                                    <img src="{{ asset('storage/' . $toko->logo_toko) }}" alt="Logo Toko" 
                                        style="max-width: 200px; max-height: 200px;">
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection