<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Tabel siswa
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('nis');
            $table->string('nisn')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('nama_orangtua');
        });

        // Tabel guru
        Schema::create('guru', function (Blueprint $table) {
            $table->increments('id_guru');
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('walikelas')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
        });

        // Tabel matapelajaran
        Schema::create('matapelajaran', function (Blueprint $table) {
            $table->increments('id_matapelajaran');
            $table->string('nama_matapelajaran');
            $table->unsignedInteger('id_guru')->nullable();
            $table->foreign('id_guru')->references('id_guru')->on('guru')->onDelete('cascade');
        });

        // Tabel raport
        Schema::create('raport', function (Blueprint $table) {
            $table->increments('id_raport');
            $table->integer('semester');
            $table->string('kelas', 50);
            $table->unsignedInteger('id_siswa');
            $table->unsignedInteger('id_guru');
            $table->foreign('id_siswa')->references('nis')->on('siswa')->onDelete('cascade');
            $table->foreign('id_guru')->references('id_guru')->on('guru')->onDelete('cascade');
        });

        // Tabel detail_raport
        Schema::create('detail_raport', function (Blueprint $table) {
            $table->increments('id_detail');
            $table->float('nilai');
            $table->string('predikat');
            $table->string('deskripsi');
            $table->unsignedInteger('id_matapelajaran'); // Ubah tipe data menjadi integer
            $table->unsignedInteger('id_raport');
            $table->foreign('id_matapelajaran')->references('id_matapelajaran')->on('matapelajaran')->onDelete('cascade');
            $table->foreign('id_raport')->references('id_raport')->on('raport')->onDelete('cascade');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->string('verify_key')->nullable();
            $table->integer('active');
            $table->timestamps();
        });;
    }

    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('detail_raport');
        Schema::dropIfExists('raport');
        Schema::dropIfExists('matapelajaran');
        Schema::dropIfExists('guru');
        Schema::dropIfExists('siswa');
    }
};
