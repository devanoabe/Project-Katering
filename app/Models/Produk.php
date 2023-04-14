<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $primaryKey = 'idProduk';
    protected $keyType = 'string';
    protected $fillable = [
        'idProduk',
        'namaProduk',
        'deskripsi',
        'hargaProduk',
        'user_id',
        'idKategori',
    ];
}
