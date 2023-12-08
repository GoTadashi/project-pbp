<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_matapelajaran;

class controller_api_matapelajaran extends Controller
{
    public function getMatapelajaran()
    {
        try {
            $matapelajaran = model_matapelajaran::select('id_matapelajaran', 'nama_matapelajaran', 'id_guru')
                ->orderBy('id_matapelajaran')
                ->get();
            return response()->json($matapelajaran, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal mengambil data matapelajaran: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getById($id_matapelajaran)
    {
        try {
            $matapelajaran = model_matapelajaran::find($id_matapelajaran);
    
            if (!$matapelajaran) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data not found',
                ], 404, [], JSON_PRETTY_PRINT); // 404 for not found
            }
    
            return response()->json($matapelajaran, 200, [], JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error retrieving data',
                'error' => $e->getMessage(),
            ], 500, [], JSON_PRETTY_PRINT); // 500 for internal server error
        }
    }
    
    


    public function addMatapelajaran(Request $req)
    {
        try {
            model_matapelajaran::create([
                'nama_matapelajaran' => $req->nama_matapelajaran,
                'id_guru' => $req->id_guru
            ]);

            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Data Matapelajaran Berhasil Disimpan',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal menyimpan data matapelajaran: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function deleteMatapelajaran(Request $req)
    {
        try {
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
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal menghapus data matapelajaran: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateMatapelajaran(Request $req)
    {
        try {
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
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal mengubah data matapelajaran: ' . $e->getMessage(),
            ], 500);
        }
    }
}
