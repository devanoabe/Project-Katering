<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\User;

class ProdukController extends Controller
{
    public function index(){
        $produk = Produk::paginate(3);
        return view('admin.produk.index')->with('produks', $produk);
    }

    public function create()
    {
        $user = User::where('role', '=', "1")->get();
        $kategori = Kategori::all();
        return view('admin.produk.create', compact('user', 'kategori'));
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idProduk' => 'required',
            'namaProduk' => 'required',
            'deskripsi' => 'required',
            'hargaProduk' => 'required',
            'user_id' => 'required',
            'idKategori' => 'required',
            ]);
            //fungsi eloquent untuk menambah data
            Produk::create($request->all());
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('produk.index')->with('success', 'Produk Catering Berhasil Ditambahkan');
    }

    public function destroy($idProduk)
    {
        Produk::find($idProduk)->delete();
        return redirect()->route('produk.index')
            -> with('success', 'Produk Catering Berhasil Dihapus');
    }

    public function show($idProduk)
    {
        $produk = Produk::find($idProduk);
        return view('admin.produk.detail', compact('produk'));
    }

    public function edit($idProduk)
    {
        $user = User::where('role', '=', "1")->get();
        $kategori = Kategori::all();
        $produk = Produk::find($idProduk);
        return view('admin.produk.edit', compact('user', 'kategori', 'produk'));
    }

    public function update(Request $request, string $idProduk)
    {
        //melakukan validasi data
        $request->validate([
            'idProduk' => 'required',
            'namaProduk' => 'required',
            'deskripsi' => 'required',
            'hargaProduk' => 'required',
            'user_id' => 'required',
            'idKategori' => 'required',
            ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            Produk::find($idProduk)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('produk.index')->with('success', 'Produk Catering Berhasil Diupdate');
    }

}
