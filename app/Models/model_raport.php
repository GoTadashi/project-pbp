<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_raport extends Model
{
    use HasFactory;
    protected $table = 'raport';
    public $timestamps = false;
    protected $primaryKey = 'id_raport';
    protected $fillable = ['semester', 'kelas', 'id_siswa', 'id_guru'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'nis');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    public function detailRaports()
    {
        return $this->hasMany(DetailRaport::class, 'id_raport', 'id_raport');
    }
}
