@extends('layouts.main')

@section('title', 'Data Prodi')

@section('content')
    <h1>Daftar Prodi</h1>
    <div class="row">
        <div class="col-lg-4">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('images/logo-ti.jpg') }}" class="card-img-top" alt="Logo TI">
                <div class="card-body">
                    <h5 class="card-title">Prodi Manajemen Informatika</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="#" class="btn btn-primary">More</a>
                </div>
            </div>
        </div>
        <!-- Tambahkan card lain untuk prodi lain -->
    </div>
@endsection