<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Lomba extends Model
{
    use HasFactory;

    protected $table = 'lomba'; // Sesuaikan dengan nama tabel yang digunakan

    protected $fillable = [
        'nama_lomba', 'jenis_lomba', 'status', 'deskripsi', 'timeline', 'ketentuan',
        'biaya', 'link_pendaftaran', 'link_guidebook', 'kontak', 'poster' ,'tanggal_pelaksanaan'
    ];

    protected $casts = [
        'tanggal_pelaksanaan' => 'date',
    ];
}
