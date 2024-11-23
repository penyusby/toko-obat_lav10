<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataObat extends Model
{
    use HasFactory;
    protected $table = 'data_obats';

    public $timestamps = false;

    protected $fillable = [
        'nama_obat',
        'golongan_obat',
        'kategori_id',
        'kadaluwarsa',
        'produsen',
        'harga_satuan',
        'stok',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriObat::class);
    }
}
