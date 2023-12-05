<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    public $timestamps = false;
    protected $primaryKey = 'id_guru';
    protected $fillable = ['nip', 'nama','walikelas', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin'];
    
    public function matapelajaran()
    {
        return $this->hasMany(Matapelajaran::class, 'id_guru', 'id_guru');
    }
}
