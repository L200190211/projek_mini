<?php

namespace App\Models;

use Dotenv\Repository\Adapter\GuardedWriter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $guarded = [];
    protected $primaryKey = "id_mhs";
    protected $fillable = ['nim_mhs', 'nama_mhs', 'email', 'alamat', 'no_tlp'];
    // protected $dates = false;
    public function krs()
    {
        return $this->hasMany(krs::class);
    }
}
