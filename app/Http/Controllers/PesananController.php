<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

    public function laporan(Request $request)
    {
        $mulai = $request->input('tgl_mulai');
        $selesai = $request->input('tgl_selesai');

        if ($request->has('filter_tgl')) {
            $request->session()->put('tgl_mulai', $mulai);
            $request->session()->put('tgl_selesai', $selesai);
        } elseif ($request->has('reset_filter')) {
            $request->session()->forget('tgl_mulai');
            $request->session()->forget('tgl_selesai');
        }

        $filterMulai = $request->session()->get('tgl_mulai');
        $filterSelesai = $request->session()->get('tgl_selesai');

        $query = Pesanan::where('status', '=', 'selesai');

        if ($filterMulai && $filterSelesai) {
            $query->whereBetween('pesanans.tglPemesanan', [$filterMulai, $filterSelesai]);
        }

        $laporan = $query->get();

        // Menghitung jumlah item per halaman
        $perPage = 5;

        // Mendapatkan nomor halaman saat ini dari query string (?page=)
        $currentPage = Paginator::resolveCurrentPage();

        // Membuat instance LengthAwarePaginator dengan data, jumlah item per halaman, dan halaman saat ini
        $laporanPaginator = new LengthAwarePaginator(
            $laporan->forPage($currentPage, $perPage),
            $laporan->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()]
        );

        $filter = null;
        if ($filterMulai && $filterSelesai) {
            $filter = $laporan;
        }

        return view('admin.laporan.index', compact('laporan', 'laporanPaginator', 'filter'));
    }

    public function cetakPDF(Request $request)
    {
        $mulai = $request->session()->get('tgl_mulai');
        $selesai = $request->session()->get('tgl_selesai');

        $filter = Pesanan::where('status', '=', 'selesai')
            ->when($mulai && $selesai, function ($query) use ($mulai, $selesai) {
                return $query->whereBetween('pesanans.tglPemesanan', [$mulai, $selesai]);
            })
            ->get();

        $laporan = Pesanan::where('status', '=', 'selesai')->get();

        $masuk = DB::table('pesanans')
            ->select('tglPemesanan')
            ->orderBy('tglPemesanan', 'asc')
            ->get();

        // Mendapatkan tanggal pertama
        $tanggalPertama = $masuk->first()->tglPemesanan;

        // Mendapatkan tanggal terakhir
        $tanggalTerakhir = $masuk->last()->tglPemesanan;

        $totalHargaLaporan = $laporan->sum('totalHarga');
        $totalHargaFilter = $filter->sum('totalHarga');

        $jumlahLaporan = $laporan->count();
        $jumlahFilter = $filter->count();

        $pdf = PDF::loadView('admin.laporan.cetak_pdf', compact('laporan', 'filter', 'mulai', 'selesai', 'tanggalPertama', 'tanggalTerakhir', 'totalHargaLaporan', 'totalHargaFilter', 'jumlahLaporan', 'jumlahFilter'))->setOptions(['defaultFont' => 'sans-serif']);
        $pdfContent = $pdf->output();
        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }
}
