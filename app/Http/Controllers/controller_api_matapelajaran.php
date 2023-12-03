<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_matapelajaran;

class controller_api_matapelajaran extends Controller
{
    public function getMatapelajaran()
    {
        $matapelajaran = model_matapelajaran::select('id_matapelajaran', 'nama_matapelajaran', 'id_guru')->get();
        return response()->json($matapelajaran, 200);
    }

    public function insertMatapelajaran(Request $req)
    {
        model_matapelajaran::create([
            'nama_matapelajaran' => $req->nama_matapelajaran,
            'id_guru' => $req->id_guru
        ]);

        return response()->json([
            'status' => 'SUCCESS',
            'message' => 'Data Matapelajaran Berhasil Disimpan',
        ], 200);
    }

    public function deleteMatapelajaran(Request $req)
    {
        $delete = model_matapelajaran::where('id_matapelajaran', $req->id_matapelajaran)->delete();
        if ($delete) {
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Data Matapelajaran Berhasil Dihapus',
            ], 200);
        } else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'ID Matapelajaran tidak ditemukan',
            ], 404);
        }
    }

    public function updateMatapelajaran(Request $req)
    {
        $update = model_matapelajaran::where('id_matapelajaran', $req->id_matapelajaran)->update([
            'nama_matapelajaran' => $req->nama_matapelajaran,
            'id_guru' => $req->id_guru
        ]);

        if ($update) {
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Data Matapelajaran Berhasil Diubah',
            ], 200);
        } else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'ID Matapelajaran tidak ditemukan',
            ], 404);
        }
    }
}
