<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    echo "Halaman Home";
    echo "Baris Kedua";
});

Route::get('/mahasiswa/ti/udin', function (){
    echo "Selamat Datang Udin";
});

Route::get('/mahasiswa/{nama}', function ($nama){
    return "Selamat datang $nama";
});

Route::get('/mahasiswa/{nama}/{nim}', function ($nama, $nim){
    return "Selamat datang $nama, NIM: $nim";
});

// Optional Parameter
Route::get('/dosen/{nama}/{nip}', function ($nama = "", $nip = ""){
    return "Selamat datang $nama, NIP: $nip";
});

//route redirect
Route::redirect('/home', '/');

//route fallback
Route::fallback(function (){
    return "Halaman tidak ditemukan";
});

Route::get('/mahasiswa', function (){
    return view ('akademik.mahasiswa', [
        'mhs1'=> 'Mark Zuckerberg',
        'mhs2'=> 'Alvika Fradisi',
        'mhs3'=> 'Bil Gates',
        'mhs4'=> 'Elon Musk',
        'mhs5'=> 'Jeff Bezos',
        'mhs6'=> 'Larry Page',
    ]);
});

Route:: get('/mahasiswa', function (){
    $arrMhs = [
        'mhs1' => 'Mark Zuckerberg',
        'mhs2' => 'Alvika Fradisi',
        'mhs3' => 'Bil Gates',
        'mhs4' => 'Elon Musk',
        'mhs5' => 'Jeff Bezos', 
        'mhs6' => 'Larry Page'
    ];
    //return view ('akademik.mahasiswa', $arrMhs); // parameter ke 2 view
    return view ('akademik.mahasiswa')->with($arrMhs); // method with
});


// =======================
// 1. Menampilkan Data
// =======================
Route::get('/latihan/data', function () {
    return view('akademik.latihan', [
        'nama' => 'Alvika Fradisi',
        'nim' => '2401093002',
        'jurusan' => 'Teknik Informatika'
    ]);
});


// =======================
// 2. IF ELSE
// =======================
Route::get('/latihan/if', function () {
    return view('akademik.latihan', [
        'nama' => 'Alvika Fradisi',
        'total_nilai' => 75
    ]);
});


// =======================
// 3. SWITCH CASE
// =======================
Route::get('/latihan/switch', function () {
    return view('akademik.latihan', [
        'nilai_huruf' => 'A'
    ]);
});


// =======================
// 4. PERULANGAN FOR
// =======================
Route::get('/latihan/for', function () {
    return view('akademik.latihan');
});


// =======================
// 5. PERULANGAN WHILE
// =======================
Route::get('/latihan/while', function () {
    return view('akademik.latihan');
});


// =======================
// 6. FOREACH
// =======================
Route::get('/latihan/foreach', function () {
    return view('akademik.latihan', [
        'mahasiswa' => [
            'Mark Zuckerberg',
            'Alvika Fradisi',
            'Bill Gates',
            'Elon Musk'
        ]
    ]);
});


// =======================
// 7. FORELSE
// =======================
Route::get('/latihan/forelse', function () {
    return view('akademik.latihan', [
        'kosong' => []
    ]);
});


// =======================
// 8. CONTINUE & BREAK
// =======================
Route::get('/latihan/loop-control', function () {
    return view('akademik.latihan');
});


Route::get('/mahasiswa', function () {
    $arrMhs = ['Bill Gates', 'Linus Torvalds', 'Taylor Otwell', 'Elon Musk', 'Muhammad Yazid'];
    return view('akademik.mahasiswa', ['mhs' => $arrMhs]);
});

Route::get('/dosen', function () {
    $arrDosen = ['Ronal Hadi', 'Deni S', 'Fazrol R', 'Deddy P', 'Ervan A', 'Cipto P'];
    return view('akademik.dosen', ['dosen' => $arrDosen]);
});

Route::get('/prodi', function () {
    return view('akademik.prodi');
});


