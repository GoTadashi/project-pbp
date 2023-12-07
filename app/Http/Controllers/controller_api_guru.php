<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_guru;

class controller_api_guru extends Controller
{
    public function getGuru()
    {
        try {
            $query = model_guru::select('id_guru', 'nip', 'nama','walikelas', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin')
                ->orderBy('id_guru')
                ->get();
            return response()->json($query, 200, array(), JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal mengambil data guru: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getByIdGuru($id)
{
    try {
        $guru = model_guru::select('id_guru', 'nip', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin')
            ->where('id_guru', $id)
            ->first();

        if (!$guru) {
            return response()->json(['error' => 'Guru not found'], 404);
        }

        return response()->json(['guru' => $guru], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

    public function addGuru(Request $req)
    {
        try {
            model_guru::create([
                'nip' => $req->nip,
                'nama' => $req->nama,
                'walikelas' => $req->walikelas,
                'tempat_lahir' => $req->tempat_lahir,
                'tanggal_lahir' => $req->tanggal_lahir,
                'jenis_kelamin' => $req->jenis_kelamin
            ]);

            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Data Berhasil Disimpan',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal menyimpan data guru: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function deleteGuru(Request $req)
    {
        try {
            $delete = model_guru::where('id_guru', $req->id_guru)->delete();
            if ($delete) {
                return response()->json([
                    'status' => 'SUCCESS',
                    'message' => 'Data Guru Berhasil Dihapus',
                ], 200);
            } else {
                return response()->json([
                    'status' => 'FAILED',
                    'message' => 'ID Guru tidak ditemukan',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal menghapus data guru: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateGuru(Request $req)
    {
        try {
            $id_guru = $req->id_guru;

            $req->validate([
                'nip' => 'required',
                'nama' => 'required',
                'walikelas' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
            ]);

            $updatedRows = model_guru::where('id_guru', $id_guru)->update([
                'nip' => $req->nip,
                'nama' => $req->nama,
                'walikelas' => $req->walikelas,
                'tempat_lahir' => $req->tempat_lahir,
                'tanggal_lahir' => $req->tanggal_lahir,
                'jenis_kelamin' => $req->jenis_kelamin,
            ]);

            if ($updatedRows > 0) {
                return response()->json([
                    'status' => 'SUCCESS',
                    'message' => 'Data Berhasil Diubah',
                ], 200);
            } else {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'Data guru tidak ditemukan atau tidak ada perubahan',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Gagal mengubah data guru: ' . $e->getMessage(),
            ], 500);
        }
    }
}
