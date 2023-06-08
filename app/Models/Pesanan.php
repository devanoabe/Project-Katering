<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $primaryKey = 'idPesanan';
    protected $fillable = [
        'idPesanan',
        'user_id',
        'idProduk',
        'tglPemesanan',
        'tglPengambilan',
        'jumlahPesanan',
        'totalHarga',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'idProduk', 'idProduk');
    }
}
