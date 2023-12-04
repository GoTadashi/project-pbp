<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\model_detailraport;
use App\Models\model_raport;

class controller_api_raport extends Controller
{
    public function getRaport()
    {
        $raport = model_raport::select('id_raport', 'id_siswa', 'id_guru', 'semester', 'kelas')->get();
        return response()->json($raport, 200);
    }

    public function getDetailRaport()
    {
        $detailraport = model_detailraport::select('id_raport', 'id_siswa', 'id_guru', 'semester', 'kelas')->get();
        return response()->json($detailraport, 200);
    }
}
