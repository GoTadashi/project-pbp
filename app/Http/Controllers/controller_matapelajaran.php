<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_matapelajaran;

class controller_matapelajaran extends Controller
{
    public function getMatapelajaran()
    {
        $query = model_matapelajaran::select('id_matapelajaran', 'nama_matapelajaran', 'id_guru');
        $matapelajarans = $query->get();
        return view('tampil_matapelajaran', ['matapelajarans' => $matapelajarans]);
    }

    public function addMatapelajaran(Request $req)
    {
        model_matapelajaran::create([
            'nama_matapelajaran' => $req->nama_matapelajaran,
            'id_guru' => $req->id_guru
        ]);

        return redirect('/tampilan-matapelajaran');
    }

    public function deleteMatapelajaran(Request $req)
    {
        model_matapelajaran::where('id_matapelajaran', $req->id_matapelajaran)->delete();
        return redirect('/tampilan-matapelajaran');
    }

    public function getById($id_matapelajaran)
    {
        $query = model_matapelajaran::select('id_matapelajaran', 'nama_matapelajaran', 'id_guru');
        $matapelajaran = $query->where('id_matapelajaran', $id_matapelajaran)->get();
        return view('edit_matapelajaran', ['matapelajaran' => $matapelajaran]);
    }

    public function update(Request $req)
    {
        model_matapelajaran::where('id_matapelajaran', $req->id_matapelajaran)->update([
            'nama_matapelajaran' => $req->nama_matapelajaran,
            'id_guru' => $req->id_guru
        ]);

        return redirect('/tampilan-matapelajaran');
    }
}
