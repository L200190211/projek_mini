<?php

namespace App\Models;

use App\Models\makul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $guarded = [];
    protected $primaryKey = "id_dosen";
    protected $fillable = ['nip', 'nama_dosen'];
    public function makul()
    {
        return $this->hasMany(makul::class);
    }
}
