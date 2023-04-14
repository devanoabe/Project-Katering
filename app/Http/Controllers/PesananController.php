<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;


class PesananController extends Controller
{
    public function index(){
        $pesanan = Pesanan::all();
        return view('admin.pesanan.index')->with('pesanans', $pesanan);
    }
}
