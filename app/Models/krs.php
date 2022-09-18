<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class krs extends Model
{
    use HasFactory;
    protected $table            = 'krs';
    protected $primaryKey       = 'id_krs';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_mhs', 'id_makul', 'status', 'id_kelas'];
    protected $fillable = ['id_mhs', 'id_makul', 'status', 'id_kelas'];
    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class);
    }
    public function makul()
    {
        return $this->belongsTo(makul::class);
    }
    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
}
