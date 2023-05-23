<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index(){
        $kategoris = Kategori::all();
        return view('admin.kategori.index')->with('kategoris', $kategoris);
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'idKategori' => 'required',
            'namaKategori' => 'required',
            ]);
            //fungsi eloquent untuk menambah data
            Kategori::create($request->all());
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('kategori.index')->with('success', 'Kategori Catering Berhasil Ditambahkan');
    }

    public function destroy($idKategori)
    {
        Kategori::find($idKategori)->delete();
        return redirect()->route('kategori.index')
            -> with('success', 'Kategori Catering Berhasil Dihapus');
    }

    public function show($idKategori)
    {
        $kategori = Kategori::find($idKategori);
        return view('admin.kategori.detail', compact('kategori'));
    }

    public function edit($idKategori)
    {
        $kategori = Kategori::find($idKategori);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, string $idKategori)
    {
        //melakukan validasi data
        $request->validate([
            'idKategori' => 'required',
            'namaKategori' => 'required',
            ]);
        //fungsi eloquent untuk mengupdate data inputan kita
            Kategori::find($idKategori)->update($request->all());
        //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('kategori.index')->with('success', 'Kategori Catering Berhasil Diupdate');
    }
}
