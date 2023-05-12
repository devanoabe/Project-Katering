<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'idKategori';
    protected $keyType = 'string';
    protected $fillable = [
        'idKategori',
        'namaKategori',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
