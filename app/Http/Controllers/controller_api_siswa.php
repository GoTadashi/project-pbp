<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_siswa;
use Carbon\Carbon;

class controller_api_siswa extends Controller
{
    public function getSiswa()
    {
        try {
            $query = model_siswa::select('nis', 'nisn', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'nama_orangtua')
                ->orderBy('nis')
                ->get()
                ->map(function ($siswa) {
                    $siswa->tanggal_lahir = Carbon::parse($siswa->tanggal_lahir)->format('j F Y');
                    return $siswa;
                });
            return response()->json($query, 200, array(), JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal mengambil data siswa: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getByIdSiswa($nis)
    {
        try {
            $siswa = model_siswa::where('nis', $nis)
                ->select('nis', 'nisn', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin')
                ->first();

            if ($siswa) {
                $siswa->tanggal_lahir = Carbon::parse($siswa->tanggal_lahir)->format('j F Y');
                return response()->json($siswa, 200, [], JSON_PRETTY_PRINT);
            } else {
                return response()->json([
                    'status' => 'NOT FOUND',
                    'message' => 'Siswa dengan NIS ' . $nis . ' tidak ditemukan.',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal mengambil data siswa: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function addSiswa(Request $req)
    {
        try {
            model_siswa::insert([
                'nisn' => $req->nisn,
                'nama' => $req->nama,
                'tempat_lahir' => $req->tempat_lahir,
                'tanggal_lahir' => $req->tanggal_lahir,
                'jenis_kelamin' => $req->jenis_kelamin,
                'agama' => $req->agama,
                'nama_orangtua' => $req->nama_orangtua
            ]);

            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Data Berhasil Disimpan',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal menyimpan data siswa: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function deleteSiswa(Request $req)
    {
        try {
            $delete = model_siswa::where('nis', $req->nis)->delete();
            if ($delete) {
                return response()->json([
                    'status' => 'SUCCESS',
                    'message' => 'Data Berhasil Dihapus',
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal menghapus data siswa: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateSiswa(Request $req)
    {
        try {
            $update = model_siswa::where('nis', $req->nis)->update([
                'nama' => $req->nama,
                'tempat_lahir' => $req->tempat_lahir,
                'tanggal_lahir' => $req->tanggal_lahir,
                'jenis_kelamin' => $req->jenis_kelamin,
                'agama' => $req->agama,
                'nama_orangtua' => $req->nama_orangtua
            ]);
            if ($update) {
                return response()->json([
                    'status' => 'SUCCESS',
                    'message' => 'Data Berhasil Diubah',
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal mengubah data siswa: ' . $e->getMessage(),
            ], 500);
        }
    }
}
