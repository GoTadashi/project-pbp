<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_siswa;
use App\Models\model_guru;
use App\Models\model_raport;

class controller_api_cari extends Controller
{
    public function cariSiswa(Request $req)
    {
        // $cari = $req->input('cari');
        $cari = $req->cari;
        $query = model_siswa::where('nis', 'LIKE', "%$cari%")
            ->orWhere('nama', 'LIKE', "%$cari%")
            ->orWhere('nisn', 'LIKE', "%$cari%")
            ->get();

        return response()->json($query, 200, array(), JSON_PRETTY_PRINT);
    }

    public function cariGuru(Request $req)
    {
        // $cari = $req->input('cari');
        $cari = $req->cari;
        $query = model_guru::where('id_guru', 'LIKE', "%$cari%")
            ->orWhere('nip', 'LIKE', "%$cari%")
            ->orWhere('nama', 'LIKE', "%$cari%")
            ->get();

        return response()->json($query, 200, array(), JSON_PRETTY_PRINT);
    }

    public function cariKelas(Request $req)
    {
        // $cari = $req->input('cari');
        $cari = $req->cari;

        $query = model_raport::where('kelas', 'LIKE', "%$cari%")
            ->join('siswa', 'raport.id_siswa', '=', 'siswa.nis')
            ->select('siswa.nis', 'siswa.nisn', 'siswa.nama')
            ->get();

        return response()->json($query, 200, array(), JSON_PRETTY_PRINT);
    }
}
