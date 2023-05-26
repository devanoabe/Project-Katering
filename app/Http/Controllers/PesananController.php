<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;


class PesananController extends Controller
{
    public function catering()
    {
        $pesanan = Pesanan::all();
        $user = User::all();
        $produk = Produk::all();
        return view('catering', compact('pesanan', 'produk', 'user'));
    }

    public function index()
    {
        $pesanan = Pesanan::all();
        $produks = Produk::with('kategori')->get();
        $user = User::where('role', '=', "1")->get();
        return view('admin.pesanan.index', compact('pesanan', 'produks', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idProduk' => 'required|exists:produks,idProduk',
            'tglPemesanan' => 'required',
            'tglPengambilan' => 'required',
            'jumlahPesanan' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->idProduk);
        $hargaProduk = $produk->hargaProduk;
        $jumlahPesanan = $request->jumlahPesanan;
        $totalHarga = $hargaProduk * $jumlahPesanan;

        $pesanan = new Pesanan();
        $pesanan->tglPemesanan = $request->tglPemesanan;
        $pesanan->tglPengambilan = $request->tglPengambilan;
        $pesanan->jumlahPesanan = $jumlahPesanan;
        $pesanan->totalHarga = $totalHarga;

        $iduser = Auth::id();
        $pesanan->user_id = $iduser;
        $pesanan->idProduk = $request->idProduk;

        $pesanan->save();

        return redirect()->route('home.catering')->with('showModal', true);
    }
}
