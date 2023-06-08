<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use PDF;
use Illuminate\Http\Response;

class PesananController extends Controller
{
    public function catering()
    {
        $pesanan = Pesanan::with('user')->get();
        $user = User::all();
        $produk = Produk::all();
        return view('catering', compact('pesanan', 'produk', 'user'));
    }

    public function updateStatus(Request $request, $idPesanan)
    {
        $status = $request->input('status', 'selesai');
        $pesanan = Pesanan::find($idPesanan);
        $pesanan->status = $status;
        $pesanan->save();

        return redirect()->route('pesanan.index')->with('success', 'Status berhasil diperbarui');
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

        // $pesanan->status = 'selesai'; // Atur nilai status

        $pesanan->save();

        return redirect()->route('home.catering')->with('showModal', true);
    }

    public function destroy($idPesanan)
    {
        Pesanan::find($idPesanan)->delete();
        return redirect()->route('pesanan.index')
            -> with('success', 'Pesanan Catering Berhasil Dihapus');
    }

    public function laporan()
    {
        $laporan = Pesanan::where('status', '=', 'selesai')->get();
        return view('admin.laporan.index', compact('laporan'));
    }

    public function cetakPDF(Request $request)
    {
        $laporan = Pesanan::where('status', '=', 'selesai')->get();
        $pdf = PDF::loadView('admin.laporan.cetak_pdf', compact('laporan'))->setOptions(['defaultFont' => 'sans-serif']);
        $pdfContent = $pdf->output();
        $response = new Response($pdfContent);
        $response->headers->set('Content-Type', 'application/pdf');
        return $response;
    }
}
