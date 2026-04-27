@extends('layouts.main')

@section('title', 'Daftar Mahasiswa')

@section('container')
<h1>Daftar Mahasiswa Jurusan TI</h1>
<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tgl Lahir</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Alamat</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswas as $index => $mhs)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mhs->nim }}</td>
                    <td>{{ $mhs->nama_lengkap }}</td>
                    <td>{{ $mhs->tempat_lahir }}</td>
                    <td>{{ $mhs->tgl_lahir }}</td>
                    <td>{{ $mhs->email }}</td>
                    <td>{{ $mhs->prodi }}</td>
                    <td>{{ $mhs->alamat }}</td>
                    <td>{{ $mhs->nilai }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Data mahasiswa tidak tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-3">
        {{ $mahasiswas->links() }}
    </div>
</div>
@endsection 