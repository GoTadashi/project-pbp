<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    public $timestamps = false;
    protected $primaryKey = 'nis';
    protected $fillable = ['nisn', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin','agama','nama_orangtua'];

    public function raport()
    {
        return $this->hasMany(Raport::class, 'id_siswa', 'nis');
    }
}
