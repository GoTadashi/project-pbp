<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_siswa;

class controller_api_siswa extends Controller
{
    public function getSiswa()
    {
        $query = model_siswa::select('nis', 'nisn', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin')->get();
        return response()->json($query, 200, array(), JSON_PRETTY_PRINT);
    }

    public function addSiswa(Request $req)
    {
        model_siswa::insert([
            'nis' => $req->nis,
            'nisn' => $req->nisn,
            'nama' => $req->nama,
            'tempat_lahir' => $req->tempat_lahir,
            'tanggal_lahir' => $req->tanggal_lahir,
            'jenis_kelamin' => $req->jenis_kelamin,
        ]);

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Data Berhasil Disimpan',
        ], 200);
    }

    public function deleteSiswa(Request $req)
    {
        $delete = model_siswa::where('nis', $req->nis)->delete();
        if ($delete) {
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Data Berhasil Dihapus',
            ], 200);
        }
    }

    public function updateSiswa(Request $req)
    {
        $update = model_siswa::where('nis', $req->nis)->update([
            'nama' => $req->nama,
            'tempat_lahir' => $req->tempat_lahir,
            'tanggal_lahir' => $req->tanggal_lahir,
            'jenis_kelamin' => $req->jenis_kelamin,
        ]);
        if ($update) {
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Data Berhasil Diubah',
            ], 200);
        }
    }
}
