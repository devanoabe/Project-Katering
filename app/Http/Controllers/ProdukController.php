<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\User;
use PDF;

class ProdukController extends Controller
{
    public function index(){
        $produks = Produk::with('kategori')->paginate(3);
        return view('admin.produk.index', compact('produks'));
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
            'foto' => 'required|image|max:2048',
            'deskripsi' => 'required',
            'hargaProduk' => 'required',
            'user_id' => 'required',
            'kategori_id' => 'required',
            ]);
            $imageName = time().'.'.$request->foto->extension();  
            $request->foto->move(public_path('storage'), $imageName);

            $produk = new Produk;
            $produk ->idProduk = $request->get('idProduk');
            $produk ->namaProduk = $request->get('namaProduk');
            $produk ->foto=$imageName;
            $produk ->deskripsi = $request->get('deskripsi');
            $produk ->hargaProduk = $request->get('hargaProduk');
            


            $produk->user_id = $request->get('user_id');
            $produk->kategori_id = $request->get('kategori_id');

            // $produk->user()->associate($user);
            // $produk->kategori()->associate($kategori);

            $produk->save();
            //fungsi eloquent untuk menambah data
            
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
            'foto' => 'required|image|max:2048',
            'deskripsi' => 'required',
            'hargaProduk' => 'required',
            'user_id' => 'required',
            'kategori_id' => 'required',
            ]);
            $produk = Produk::with('kategori')->where('idProduk', $idProduk)->first();
            $produk ->idProduk = $request->get('idProduk');
            $produk ->namaProduk = $request->get('namaProduk');
            $produk ->deskripsi = $request->get('deskripsi');
            $produk ->hargaProduk = $request->get('hargaProduk');
            $produk->save();
            if($request->file('foto')){
                // hapus foto lama jika ada foto baru yang diupload
                if($produk->foto && file_exists(storage_path('app/public/'.$produk->foto))){
                    \Storage::delete('public/'.$produk->foto);
                }
                // simpan foto baru ke direktori penyimpanan
                $file = $request->file('foto');
                $nama_file = $file->getClientOriginalName();
                $file->storeAs('public/foto', $nama_file);
                // simpan nama file foto ke dalam kolom 'foto' pada tabel 'mahasiswas'
                $produk->foto = $nama_file;
            }              
            $image_name = $request->file('foto')->store('images', 'public');
            $produk->foto = $image_name;

            $produk->user_id = $request->get('user_id'); 
            $produk->kategori_id = $request->get('kategori_id');

            $produk->save();
            return redirect()->route('produk.index')->with('success', 'Produk Catering Berhasil Diupdate');
    }

    public function exportPDF()
    {
        $produks = Produk::select('idProduk', 'namaProduk', 'deskripsi', 'hargaProduk', 'user_id', 'kategori_id')->get();
        $pdf = PDF::loadView('admin.produk.produk_pdf', ['produks' => $produks])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('Produk.pdf');  
    }
}
