<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_detailraport;
use App\Models\model_raport;

class controller_api_raport extends Controller
{
    public function getRaport()
    {
        try {
            $raports = model_raport::select('id_raport', 'semester', 'kelas', 'id_siswa', 'id_guru')->get();
            return response()->json($raports, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal mengambil data raport: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getDetailRaport()
    {
        $detailraport = model_detailraport::select('id_raport', 'id_siswa', 'id_guru', 'semester', 'kelas')->get();
        return response()->json($detailraport, 200);
        try {
            $raports = model_raport::select('id_raport', 'semester', 'kelas', 'id_siswa', 'id_guru')->get();
            return response()->json($raports, 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal mengambil data raport: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function addRaport(Request $req)
    {
        try {
            $req->validate([
                'semester' => 'required',
                'kelas' => 'required|max:50',
                'id_siswa' => 'required|exists:siswa,nis',
                'id_guru' => 'required|exists:guru,id_guru',
            ]);

            model_raport::create([
                'semester' => $req->semester,
                'kelas' => $req->kelas,
                'id_siswa' => $req->id_siswa,
                'id_guru' => $req->id_guru,
            ]);

            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Data Raport Berhasil Disimpan',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal menyimpan data raport: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function deleteRaport(Request $req)
    {
        try {
            $delete = model_raport::where('id_raport', $req->id_raport)->delete();
            if ($delete) {
                return response()->json([
                    'status' => 'SUCCESS',
                    'message' => 'Data Raport Berhasil Dihapus',
                ], 200);
            } else {
                return response()->json([
                    'status' => 'FAILED',
                    'message' => 'ID Raport tidak ditemukan',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal menghapus data raport: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateRaport(Request $req)
    {
        try {
            $req->validate([
                'semester' => 'required',
                'kelas' => 'required|max:50',
                'id_siswa' => 'required|exists:siswa,nis',
                'id_guru' => 'required|exists:guru,id_guru',
            ]);

            $update = model_raport::where('id_raport', $req->id_raport)->update([
                'semester' => $req->semester,
                'kelas' => $req->kelas,
                'id_siswa' => $req->id_siswa,
                'id_guru' => $req->id_guru,
            ]);

            if ($update) {
                return response()->json([
                    'status' => 'SUCCESS',
                    'message' => 'Data Raport Berhasil Diubah',
                ], 200);
            } else {
                return response()->json([
                    'status' => 'FAILED',
                    'message' => 'ID Raport tidak ditemukan atau tidak ada perubahan',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal mengubah data raport: ' . $e->getMessage(),
            ], 500);
        }
    }
}
