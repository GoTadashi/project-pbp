<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_guru;

class controller_guru extends Controller
{
    public function getGuru()
    {
        $query = model_guru::select('id_guru', 'nip', 'nama')->get();
        return view('tampil_guru', ['gurus' => $query]);
    }

    public function addGuru(Request $req)
    {
        model_guru::create([
            'nip' => $req->nip,
            'nama' => $req->nama,
            'tempat_lahir' => $req->tempat_lahir,
            'tanggal_lahir' => $req->tanggal_lahir,
            'jenis_kelamin' => $req->jenis_kelamin,
        ]);

        return redirect('/tampilan-guru');
    }

    public function deleteGuru(Request $req)
    {
        model_guru::where('id_guru', $req->id)->delete();
        return redirect('/tampilan-guru');
    }

    public function getByIdGuru($id)
    {
        $query = model_guru::select('id_guru', 'nip', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin')
            ->where('id_guru', $id)
            ->get();

        return view('edit_guru', ['guru' => $query]);
    }

    public function updateGuru(Request $req)
    {
        model_guru::where('id_guru', $req->id)->update([
            'nip' => $req->nip,
            'nama' => $req->nama,
            'tempat_lahir' => $req->tempat_lahir,
            'tanggal_lahir' => $req->tanggal_lahir,
            'jenis_kelamin' => $req->jenis_kelamin,
        ]);

        return redirect('/tampilan-guru');
    }
}
