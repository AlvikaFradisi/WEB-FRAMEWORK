<?php

use App\Http\Controllers\Auth\DosenController;
use App\Http\Controllers\Auth\MahasiswaController;
use Illuminate\Support\Facades\Route;


// Default route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/dosen', [DosenController::class, 'index']);

// Mahasiswa dengan parameter nama & nim
// Route::get('/mahasiswa/{nama}/{nim}', function($nama, $nim){
//     return "Selamat datang $nama dengan NIM $nim";
// });

// // Mahasiswa dengan parameter nama saja
// Route::get('/mahasiswa/{nama}', function($nama){
//     return "Selamat datang $nama";
// });

// // Dosen dengan parameter optional
// /*Route::get('/dosen/{nama?}/{nip?}', function($nama = '', $nip = ''){
//     return "Selamat datang $nama dengan NIP $nip";
// });*/

// // Redirect & fallback
// Route::redirect('/home', '/');
// Route::fallback(function(){
//     return "Halaman tidak ditemukan";
// });

// // Group login
// Route::prefix('/login')->group(function() {
//     Route::get('/mahasiswa', fn() => '<h2>Login Mahasiswa</h2>');
//    // Route::get('/dosen', fn() => '<h2>Login Dosen</h2>');
//     Route::get('/admin', fn() => '<h2>Login Admin</h2>');
// });


// // Greeting berdasarkan jam
// Route::get('/greet', function () {
//     $hour = date('H');
//     if ($hour < 12) $greeting = "Selamat pagi!";
//     elseif ($hour < 18) $greeting = "Selamat sore!";
//     else $greeting = "Selamat malam!";
//     return "<h1>$greeting</h1>";
// });

// // Mahasiswa list
// Route::get('/mahasiswa', function () {
//     $arrMhs = [
//         'Bill Gates',
//         'Linus Benedict Torvalds',
//         'Taylor Otwell',
//         'Elon Musk',
//         'Muhammad Yazid'
//     ];
//     return view('akademik.mahasiswa', ['mhs' => $arrMhs]);
// });
// Route::get('/nilai_mahasiswa', function(){
//     $nama = 'Taylor Otwell';
//     $nim = '2022180001';
//     $total_nilai = 80; // ubah sesuai nilai yang mau diuji
//     return view('akademik.nilai_mahasiswa', compact('nama', 'nim', 'total_nilai'));
// });
// // Dosen list
// Route::get('/dosen', function () {
//     $arrDosen = [
//         'Ronal Hadi',
//         'Deni S',
//         'Fazrol R',
//         'Deddy P',
//         'Ervan A',
//         'Cipto P'
//     ];
//     return view('akademik.dosen', ['dosen' => $arrDosen]);
// });

// // Prodi route
// Route::get('/pnp/{jurusan}/{prodi}', function ($jurusan, $prodi) {
//     $data = [$jurusan, $prodi];
//     return view('akademik.prodi')->with('data', $data);
// })->name('prodi');