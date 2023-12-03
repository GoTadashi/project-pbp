<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_guru;
use GuzzleHttp\Psr7\Message;

class controller_api_guru extends Controller
{
    public function getGuru()
    {
        $query = model_guru::select('id_guru', 'nip', 'nama')->get();
        return response()->json($query, 200, array(), JSON_PRETTY_PRINT);
    }

    public function addGuru(Request $req)
    {
        model_guru::create([
            'nip' => $req->nip,
            'nama' => $req->nama,
            'tempat_lahir' => $req->tempat_lahir,
            'tanggal_lahir' => $req->tanggal_lahir,
            'jenis_kelamin' => $req->jenis_kelamin
        ]);

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Data Berhasil Disimpan',
        ], 200);
    }

    public function deleteGuru(Request $req)
    {
        $delete = model_guru::where('id_guru', $req->id)->delete();
        if ($delete) {
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Data Berhasil Dihapus',
            ], 200);
        }
    }

    public function updateGuru(Request $req)
    {
        $update = model_guru::where('id_guru', $req->id)->update([
            'nip' => $req->nip,
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
