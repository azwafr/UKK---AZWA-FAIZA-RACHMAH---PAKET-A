<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pengaduan;

class Tanggapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'pengaduan_id', 'tgl_tanggapan', 'tanggapan', 'petugas_id', 'kategori'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'id', 'id');
    }
    
    public function pengaduan(){
        return $this->hasMany(Pengaduan::class, 'id', 'pengaduan_id');
    }
}