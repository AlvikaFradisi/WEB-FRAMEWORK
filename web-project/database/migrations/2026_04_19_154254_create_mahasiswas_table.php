<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->char('nim', 10)->unique();
            $table->string('nama_lengkap', 100);
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('prodi', 50)->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
            $table->softDeletes(); // Untuk fitur soft-delete
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
