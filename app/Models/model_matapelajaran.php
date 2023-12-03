<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_matapelajaran extends Model
{
    use HasFactory;
    protected $table = 'matapelajaran';
    public $timestamps = false;
    protected $primaryKey = 'id_matapelajaran';
    protected $fillable = ['id_matapelajaran','nama_matapelajaran', 'id_guru'];

    public function raport()
    {
        return $this->hasMany(DetailRaport::class, 'id_matapelajaran', 'id_matapelajaran');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }
}
