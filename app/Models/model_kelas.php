<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    public $timestamps = false;
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['id_kelas', 'kelas', 'id_guru', 'id_siswa'];

    public function guru()
    {
        return $this->hasMany(Guru::class, 'id_guru', 'id_guru');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'nis');
    }
}
