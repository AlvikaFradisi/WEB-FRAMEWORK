<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    // =====================
    // INSERT (SQL BIASA)
    // =====================
    public function insertSQL() {
        DB::insert("INSERT INTO students(nim, nama_lengkap, tempat_lahir, tgl_lahir, email, prodi, alamat, nilai, created_at, updated_at) 
        VALUES ('2022090909','Linus B Torvalds','Finlandia','1971-08-12','linus@linux.org','TRPL','Jl. Sudirman no.10 Padang',90,now(),now())");

        return "Data berhasil ditambahkan (SQL biasa)";
    }

    // =====================
    // INSERT PREPARED
    // =====================
    public function insertPrepared() {
        DB::insert("INSERT INTO students(nim, nama_lengkap, tempat_lahir, tgl_lahir, email, prodi, alamat, nilai, created_at, updated_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", 
        ['2022090908','Taylor Otwell','Limau Manis','1971-08-12','taylor@laravel.com','MI','Jl. M Hatta no.1 Padang',85,now(),now()]);

        return "Data berhasil ditambahkan (prepared)";
    }

    // =====================
    // INSERT BINDING
    // =====================
    public function insertBinding() {
        DB::insert("INSERT INTO students(nim, nama_lengkap, tempat_lahir, tgl_lahir, email, prodi, alamat, nilai, created_at, updated_at) 
        VALUES (:nim, :nama_lengkap, :tempat_lahir, :tgl_lahir, :email, :prodi, :alamat, :nilai, :created_at, :updated_at)", [
            'nim'=>'2022090907',
            'nama_lengkap'=>'Bill Gates',
            'tempat_lahir'=>'Payakumbuh',
            'tgl_lahir'=>'1963-05-01',
            'email'=>'bill@microsoft.com',
            'prodi'=>'MI',
            'alamat'=>'Jl. M Yamin no.1 Padang',
            'nilai'=>75,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        return "Data berhasil ditambahkan (binding)";
    }

    // =====================
    // UPDATE
    // =====================
    public function updateData() {
        DB::update("UPDATE students SET tempat_lahir = ? WHERE nama_lengkap = ?", 
        ['Seattle Washington US', 'Bill Gates']);

        return "Data berhasil diupdate";
    }

    // =====================
    // DELETE
    // =====================
    public function deleteData() {
        DB::delete("DELETE FROM students WHERE nama_lengkap = ?", ['Bill Gates']);

        return "Data berhasil dihapus";
    }

    // =====================
    // SELECT (DEBUG)
    // =====================
    public function selectData() {
        $query = DB::select("SELECT * FROM students");
        dd($query);
    }

    // =====================
    // SELECT TAMPIL SEDERHANA
    // =====================
    public function selectTampil() {
        $query = DB::select("SELECT * FROM students");

        foreach ($query as $data) {
            echo $data->id."<br>";
            echo $data->nim."<br>";
            echo $data->nama_lengkap."<br>";
            echo $data->email."<br>";
            echo $data->alamat."<br><hr>";
        }
    }

    // =====================
    // SELECT KE VIEW
    // =====================
    public function selectView() {
        $query = DB::select("SELECT * FROM students");
        return view('akademik.mahasiswa', ['mahasiswas'=>$query]);
    }

    // =====================
    // SELECT WHERE
    // =====================
    public function selectWhere() {
        $query = DB::select("SELECT * FROM students WHERE prodi = ? ORDER BY nim ASC", ['MI']);
        return view('akademik.mahasiswa', ['mahasiswas'=>$query]);
    }

    // =====================
    // TRUNCATE
    // =====================
    public function statement() {
        DB::statement("TRUNCATE students");
        return "Tabel students sudah dikosongkan!";
    }

    // =====================
    // NILAI MAHASISWA (FIX)
    // =====================
    public function nilaiView() {
        $query = DB::select("SELECT id, nim, nama_lengkap, nilai FROM students");

        // rata-rata nilai
        $avg_nilai = collect($query)->avg('nilai');

        // total nilai
        $total_nilai = collect($query)->sum('nilai');

        return view('akademik.nilai_mahasiswa', [
            'mahasiswas' => $query,
            'avg_nilai' => $avg_nilai,
            'total_nilai' => $total_nilai
        ]);
    }
}