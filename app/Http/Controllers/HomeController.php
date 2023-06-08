<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Auth;
use App\Models\Pesanan;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function userHome()
    // {
    //     return view('home',["msg"=>"I am user role"]);
    // }

    // public function adminHome()
    // {
    //     return view('home',["msg"=>"I am admin role"]);
    // }

    public function index()
    {
        $user = Auth::user();
        // return view('user',['user' => $user]);
        return view('layouts.app2');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function catering()
    {
        $produk = Produk::all();
        return view('catering', compact('produk'));
    }

    public function status()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();
        // Mendapatkan pesanan berdasarkan user yang sedang login
        $pesanan = Pesanan::where('user_id', $user->id)->get();
        $produks = Produk::with('kategori')->get();
        $user = User::where('role', '=', "1")->get();
        return view('pesanan', compact('pesanan', 'produks', 'user'));
    }

    public function riwayat()
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();
        // Mendapatkan pesanan berdasarkan user yang sedang login
        $pesanan = Pesanan::where('user_id', $user->id)
                   ->where('status', 'selesai')
                   ->get();

        $produks = Produk::with('kategori')->get();
        $user = User::where('role', '=', "1")->get();
        return view('riwayat', compact('pesanan', 'produks', 'user'));
    }

}
