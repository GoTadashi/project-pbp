<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_detailraport extends Model
{
    use HasFactory;
    protected $table = 'detail_raport';
    public $timestamps = false;
    protected $fillable = ['Nilai', 'Predikat', 'Deskripsi', 'id_matapelajaran', 'id_raport', 'id_siswa', 'semester', 'kelas'];

    public function matapelajaran()
    {
        return $this->belongsTo(Matapelajaran::class, 'id_matapelajaran', 'id_matapelajaran');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'nis');
    }

    public function raport()
    {
        return $this->belongsTo(Raport::class, 'id_raport', 'id_raport');
    }
}
