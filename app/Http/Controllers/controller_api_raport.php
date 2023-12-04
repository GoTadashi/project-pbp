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
            $raports = model_raport::select(
                'raport.id_raport',
                'raport.semester',
                'raport.kelas',
                'raport.id_siswa',
                'siswa.nama as nama_siswa',
                'raport.id_guru',
                'guru.nama as nama_guru',
                'matapelajaran.nama_matapelajaran',
                'detail_raport.nilai',
                'detail_raport.predikat',
                'detail_raport.deskripsi'
            )
                ->join('siswa', 'siswa.nis', '=', 'raport.id_siswa')
                ->join('guru', 'guru.id_guru', '=', 'raport.id_guru')
                ->join('detail_raport', 'raport.id_raport', '=', 'detail_raport.id_raport')
                ->join('matapelajaran', 'matapelajaran.id_matapelajaran', '=', 'detail_raport.id_matapelajaran')
                ->get();

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

    public function addDetailRaport(Request $req)
    {
        try {
            $req->validate([
                'nilai' => 'required',
                'predikat' => 'required',
                'deskripsi' => 'required',
                'id_matapelajaran' => 'required|exists:matapelajaran,id_matapelajaran',
                'id_raport' => 'required|exists:raport,id_raport',
            ]);

            model_detailraport::create([
                'nilai' => $req->nilai,
                'predikat' => $req->predikat,
                'deskripsi' => $req->deskripsi,
                'id_matapelajaran' => $req->id_matapelajaran,
                'id_raport' => $req->id_raport,
            ]);

            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Data Detail Raport Berhasil Disimpan',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal menyimpan data detail raport: ' . $e->getMessage(),
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

    public function deleteDetailRaport(Request $req)
    {
        try {
            $delete = model_detailraport::where('id_detail', $req->id_detail)->delete();
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

    public function updateDetailRaport(Request $req)
    {
        try {
            $req->validate([
                'nilai' => 'required',
                'predikat' => 'required',
                'deskripsi' => 'required',
                'id_matapelajaran' => 'required|exists:matapelajaran,id_matapelajaran',
                'id_raport' => 'required|exists:raport,id_raport',
            ]);

            $update = model_detailraport::where('id_detail', $req->id_detail)->update([
                'nilai' => $req->nilai,
                'predikat' => $req->predikat,
                'deskripsi' => $req->deskripsi,
                'id_matapelajaran' => $req->id_matapelajaran,
                'id_raport' => $req->id_raport,
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
