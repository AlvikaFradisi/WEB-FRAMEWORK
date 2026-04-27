<?php

use App\Http\Controllers\Auth\DosenController;
use App\Http\Controllers\Auth\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mhs', [MahasiswaController::class, 'index']);
// Route::get('/mahasiswa', [\App\Http\Controllers\Auth\MahasiswaController::class, 'index']); // menggunakan namespace lengkap

Route::get('/dosen', [DosenController::class, 'index']);

//Db Facade
Route::get('/insert-sql', [MahasiswaController::class, 'insertSql']);
Route::get('/insert-prepared', [MahasiswaController::class, 'insertPrepared']);
Route::get('/insert-binding', [MahasiswaController::class, 'insertBinding']);
Route::get('/update', [MahasiswaController::class, 'update']);
Route::get('/delete', [MahasiswaController::class, 'delete']);
Route::get('/select', [MahasiswaController::class, 'select']);
Route::get('/select-tampil', [MahasiswaController::class, 'selectTampil']);
Route::get('/select-view', [MahasiswaController::class, 'selectView']);
Route::get('/select-where', [MahasiswaController::class, 'selectWhere']);
Route::get('/statement', [MahasiswaController::class, 'statement']);

//Query Builder
Route::get('/insert-dosen', [DosenController::class, 'insertDosen']);
Route::get('/insert-banyak-dosen', [DosenController::class, 'insertBanyakDosen']);
Route::get('/update-dosen', [DosenController::class, 'updateDosen']);
Route::get('/update-where-dosen', [DosenController::class, 'updateWhereDosen']);
Route::get('/update-or-insert', [DosenController::class, 'updateOrInsert']);
Route::get('/delete-dosen', [DosenController::class, 'deleteDosen']);
Route::get('/get', [DosenController::class, 'get']);
Route::get('/get-tampil', [DosenController::class, 'getTampil']);
Route::get('/get-view', [DosenController::class, 'getView']);
Route::get('/get-where', [DosenController::class, 'getWhere']);
Route::get('/select-dosen', [DosenController::class, 'selectDosen']);
Route::get('/take', [DosenController::class, 'take']);
Route::get('/first', [DosenController::class, 'first']);
Route::get('/find', [DosenController::class, 'find']);
Route::get('/raw', [DosenController::class, 'raw']);

//Eloquent ORM
Route::get('/cek-objek', [MahasiswaController::class, 'cekObjek']);
Route::get('/insert', [MahasiswaController::class, 'insert']);
Route::get('/mass-assignment', [MahasiswaController::class, 'massAssignment']);

Route::get('/update', [MahasiswaController::class, 'update']);
Route::get('/update-where', [MahasiswaController::class, 'updateWhere']);
Route::get('/mass-update', [MahasiswaController::class, 'massUpdate']);

Route::get('/delete', [MahasiswaController::class, 'delete']);
Route::get('/destroy', [MahasiswaController::class, 'destroy']);
Route::get('/mass-delete', [MahasiswaController::class, 'massDelete']);

Route::get('/all', [MahasiswaController::class, 'all']);
Route::get('/all-view', [MahasiswaController::class, 'allView']);
Route::get('/get-where', [MahasiswaController::class, 'getWhere']);
Route::get('/test-where', [MahasiswaController::class, 'testWhere']);
Route::get('/first', [MahasiswaController::class, 'first']);
Route::get('/find', [MahasiswaController::class, 'find']);
Route::get('/latest', [MahasiswaController::class, 'latest']);
Route::get('/limit', [MahasiswaController::class, 'limit']);
Route::get('/skip-take', [MahasiswaController::class, 'skipTake']);

Route::get('/soft-delete', [MahasiswaController::class, 'softDelete']);
Route::get('/with-trashed', [MahasiswaController::class, 'withTrashed']);
Route::get('/restore', [MahasiswaController::class, 'restore']);
Route::get('/force-delete', [MahasiswaController::class, 'forceDelete']);






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

// Prodi route
Route::get('/pnp/{jurusan}/{prodi}', function ($jurusan, $prodi) {
    $data = [$jurusan, $prodi];
    return view('akademik.prodi')->with('data', $data);
})->name('prodi');