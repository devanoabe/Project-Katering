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
        'foto',
        'deskripsi',
        'hargaProduk',
        'user_id',
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'idKategori', 'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
