<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $primaryKey = "id_kelas";
    protected $guarded = [];
    protected $fillable = ['id_makul', 'id_dosen', 'kode_kelas'];
    public function makul()
    {
        return $this->belongsTo(makul::class);
    }
    public function dosen()
    {
        return $this->belongsTo(dosen::class);
    }
    public function krs()
    {
        return $this->hasMany(krs::class);
    }
}
