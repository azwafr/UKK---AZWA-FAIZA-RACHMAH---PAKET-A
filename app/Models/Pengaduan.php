<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Tanggapan;

class Pengaduan extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'user_nik',
        'user_id',
        'isi_laporan',
        'tgl_pengaduan',
        'foto',
        'status',
        'kategori'
    ];
    
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function details(){
        return $this->hasMany(Pengaduan::class, 'id', 'id');
    }

    public function tanggapan(){
        return $this->belongsTo(Tanggapan::class, 'id', 'pengaduan_id');
    }
}