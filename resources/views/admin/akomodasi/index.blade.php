@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Data Akomodasi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.akomodasi.create') }}" class="btn btn-primary mb-3">Tambah Akomodasi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Foto</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin logout?')">
                Logout
            </button>
        </form>
        <tbody>
            @foreach($akomodasis as $akomodasi)
            <tr>
                <td>{{ $akomodasi->nama }}</td>
                <td>{{ $akomodasi->tipe }}</td>
                <td>
                    @if($akomodasi->foto)
                        <img src="{{ asset('storage/' . $akomodasi->foto) }}" width="120" alt="Foto">
                    @else
                        <span class="text-muted">Tidak ada</span>
                    @endif
                </td>
                <td>{{ $akomodasi->alamat }}</td>
                <td>{{ $akomodasi->telepon }}</td>
                <td>Rp {{ number_format($akomodasi->harga, 0, ',', '.') }}</td>
                <td>
                    <!-- Tombol edit dan hapus nanti bisa ditambahkan -->
                    <td>
                        <a href="{{ route('admin.akomodasi.edit', $akomodasi->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                    
                        <form action="{{ route('admin.akomodasi.destroy', $akomodasi->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                     
                    </td>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
