<?php

namespace App\Models;

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class makul extends Model
{
    use HasFactory;
    protected $table = 'makul';
    protected $guarded = [];
    protected $primaryKey = "id_makul";
    protected $fillable = ['kode_makul', 'nama_makul', 'sks_makul', 'semester'];
    public function kelas()
    {
        return $this->hasMany(kelas::class);
    }
    public function krs()
    {
        return $this->hasMany(krs::class);
    }
}
