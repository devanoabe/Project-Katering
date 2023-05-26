<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {   
        $user = DB::table('users')->count();
        $produk = DB::table('produks')->count();
        return view('admin.dashboard', compact('user', 'produk'));
    }
}
