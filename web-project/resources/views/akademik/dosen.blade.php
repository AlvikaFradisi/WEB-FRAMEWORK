@extends('layouts.main')
@section('title', 'Data Dosen')

@section('container')
<h1>Daftar Dosen</h1>
<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dosens as $index => $dsn)
                <tr>
                    <td>{{ $dsn->id }}</td>
                    <td>{{ $dsn->nik }}</td>
                    <td>{{ $dsn->nama }}</td>
                    <td>{{ $dsn->email }}</td>
                    <td>{{ $dsn->prodi }}</td>
                    <td>{{ $dsn->alamat }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Data dosen tidak tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-3">
        {{ $dosens->links() }}
    </div>
</div>
@endsection