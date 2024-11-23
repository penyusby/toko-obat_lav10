<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoriObat extends Model
{
    use HasFactory;
    protected $table = 'kategori_obats';
    public $timestamps = false;
    protected $primarykey = 'id';
    protected $fillable = ['nama_kategori'];
}
