<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_siswa;

class controller_siswa extends Controller
{
    public function getSiswa()
    {
        $query = model_siswa::select('nis','nisn', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin')->get();
        return view('tampil_siswa', ['siswa' => $query]);
    }

    public function addSiswa(Request $req)
    {
        model_siswa::insert([
            'nisn' => $req->nisn,
            'nama' => $req->nama,
            'tempat_lahir' => $req->tempat_lahir,
            'tanggal_lahir' => $req->tanggal_lahir,
            'jenis_kelamin' => $req->jenis_kelamin,
        ]);

        return redirect('/tampilan-siswa');
    }

    public function deleteSiswa(Request $req)
    {
        model_siswa::where('nis', $req->nis)->delete();
        return redirect('/tampilan-siswa');
    }

    public function getByIdSiswa($nis)
    {
        $query = model_siswa::select('nis','nisn', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin')->where('nis', $nis)->get();
        return view('edit_siswa', ['siswa' => $query]);
    }

    public function updateSiswa(Request $req)
    {
        model_siswa::where('nis', $req->nis)->update([
            'nama' => $req->nama,
            'tempat_lahir' => $req->tempat_lahir,
            'tanggal_lahir' => $req->tanggal_lahir,
            'jenis_kelamin' => $req->jenis_kelamin,
        ]);
        return redirect('/tampilan-siswa');
    }
}
