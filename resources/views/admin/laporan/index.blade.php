@extends('layouts.index')

<head>
    <link rel="stylesheet" href="{{asset('css/laporan.css')}}">
</head>
@section('content')
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section style="padding-left: 50px; padding-right: 50px;" class="content">
    <p class="mb-0"><i class="fa fa-credit-card mr-2" aria-hidden="true"></i>Dashboard</p>
    <h2 class="mb-5" style="color:black; font-weight: bolder;">Data Laporan Pemesanan</h2>
        <div class="row mt-4 justify-content-end">
            <div class="dropdown fl">
                <a style="text-decoration: none;" href="#" class="d-flex justify-content-between" data-toggle="dropdown"> 
                    <h5>Filter</h5> 
                    <i class="fa fa-filter" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu">
                    <form method="post" action="{{ route('laporan') }}" class="form-inline" id="form-filter">
                        @csrf
                        <p class="ml-3 mb-0 mt-2">Tanggal Mulai : </p>
                        <input type="date" name="tgl_mulai" class="form-control ml-3">
                        <p class="ml-3 mb-0 mt-2">Tanggal Selesai : </p>
                        <input type="date" name="tgl_selesai" class="form-control ml-3">
                        <button type="submit" name="filter_tgl" class="btn ml-3 mt-3" onclick="showPopup()">Filter</button>
                    </form> 
                </ul>
            </div>
            <div class="ml-2">
                <form method="post" action="{{ route('laporan') }}" class="form-inline" id="form-reset">
                    @csrf
                    <button style="background-color: black; color: white" type="submit" name="reset_filter" class="btn">Reset</button>
                </form>
            </div>
            <div class="ml-2 mr-3">
                <form method="get" action="{{ route('cetakPDF') }}" class="form-inline" id="form-export">
                    @csrf
                    <input type="hidden" name="tgl_mulai" value="{{ session('tgl_mulai') }}">
                    <input type="hidden" name="tgl_selesai" value="{{ session('tgl_selesai') }}">
                    <button style="background-color: black; color: white" type="submit" name="filter_tgl" class="btn">Export Data
                    <i class="fas fa-download fa-sm" style="margin-left: 5px; color: white"></i></button>
                </form>
            </div>
        </div>

        <script>
            function showPopup() {
                var popup = document.getElementById("popup");
                popup.classList.add("show");
            }

        </script>
        <div class="card">
            <table class="table table-borderless">
                <thead style="background-color: #f3f4fb;">
                    <tr>
                        <th style="width: 50px; text-align: center">Pemesanan</th>
                        <th width="450px">Pesanan</th>
                        <th>Produk</th>
                        <th width="90px">Status</th>
                        <th style="width: 180px; text-align: center">Total Harga</th>
                </thead>
                <tbody>
                    <?php
                    if ($mulai = null || $selesai = null) {
                    ?>
                        @foreach($filter as $lap)
                        <tr>
                            <td>
                                <div class="text-center">
                                    <span style="font-weight: bold;">{{ date('d', strtotime($lap->tglPemesanan)) }}</span><br>
                                    <span>{{ date('F', strtotime($lap->tglPemesanan)) }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row align-items-center mb-2">
                                    <div class="col-2">
                                        <img style="width: 65px; height: auto; border-radius: 10px" class="img-profile" src="{{asset('images/faces/1.jpg')}}">
                                    </div>
                                    <div class="col-10 pl-4">
                                            <p style="color: black; font-size: 20px; font-weight: bolder">{{ $lap->user->name }}</p>
                                            <span style="margin-right: 6px; color: #858796">trans : {{ $lap->idPesanan }}</span>
                                            <span><i style="font-size: 4px; color: red;" class="fa fa-circle" aria-hidden="true"></i></span>
                                            <span style="margin-left: 6px; color: #858796">jumlah : {{ $lap->jumlahPesanan }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p style="color: black; font-size: 18px; font-weight: bold"class="mb-0">{{ $lap->produk->namaProduk }}</p> <br>
                                <p style="color: #858796; font-size: 14px; margin-top: -14px">Diambil : {{ $lap->tglPengambilan }}</p>
                            </td>
                            <td id="status{{ $lap->idPesanan }}">
                                <div class="text-suc">
                                    {{ $lap->status }}    
                                </div>
                            </td>
                            <td>
                                <p style="text-align: center; font-weight: bolder">Rp. {{ number_format($lap -> totalHarga, 0, ',', '.') }}</p>
                            </td>
                        </tr>
                        @endforeach
                    <?php
                    }
                    if (isset($_POST['filter_tgl'])) {
                    ?>
                        @foreach($filter as $lap)
                        <tr>
                            <td>
                                <div class="text-center">
                                    <span style="font-weight: bold;">{{ date('d', strtotime($lap->tglPemesanan)) }}</span><br>
                                    <span>{{ date('F', strtotime($lap->tglPemesanan)) }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row align-items-center mb-2">
                                    <div class="col-2">
                                        <img style="width: 65px; height: auto; border-radius: 10px" class="img-profile" src="{{asset('images/faces/1.jpg')}}">
                                    </div>
                                    <div class="col-10 pl-4">
                                            <p style="color: black; font-size: 20px; font-weight: bolder">{{ $lap->user->name }}</p>
                                            <span style="margin-right: 6px; color: #858796">trans : {{ $lap->idPesanan }}</span>
                                            <span><i style="font-size: 4px; color: red" class="fa fa-circle" aria-hidden="true"></i></span>
                                            <span style="margin-left: 6px; color: #858796">jumlah : {{ $lap->jumlahPesanan }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p style="color: black; font-size: 18px; font-weight: bold"class="mb-0">{{ $lap->produk->namaProduk }}</p> <br>
                                <p style="color: #858796; font-size: 14px; margin-top: -14px">Diambil : {{ $lap->tglPengambilan }}</p>
                            </td>
                            <td id="status{{ $lap->idPesanan }}">
                                <div class="text-suc">
                                    {{ $lap->status }}    
                                </div>
                            </td>
                            <td>
                                <p style="text-align: center; font-weight: bolder">Rp. {{ number_format($lap -> totalHarga, 0, ',', '.') }}</p>
                            </td>
                        </tr>
                        @endforeach
                    <?php
                    } else {
                    ?>
                        @foreach($laporanPaginator as $lap)
                        <tr>
                            <td>
                                <div class="text-center">
                                    <span style="font-weight: bold;">{{ date('d', strtotime($lap->tglPemesanan)) }}</span><br>
                                    <span>{{ date('F', strtotime($lap->tglPemesanan)) }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row align-items-center mb-2">
                                    <div class="col-2">
                                        <img style="width: 65px; height: auto; border-radius: 10px" class="img-profile" src="{{asset('images/faces/1.jpg')}}">
                                    </div>
                                    <div class="col-10 pl-4">
                                            <p style="color: black; font-size: 20px; font-weight: bolder">{{ $lap->user->name }}</p>
                                            <span style="margin-right: 6px; color: #858796">trans : {{ $lap->idPesanan }}</span>
                                            <span><i style="font-size: 4px; color: red" class="fa fa-circle" aria-hidden="true"></i></span>
                                            <span style="margin-left: 6px; color: #858796">jumlah : {{ $lap->jumlahPesanan }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p style="color: black; font-size: 18px; font-weight: bold"class="mb-0">{{ $lap->produk->namaProduk }}</p> <br>
                                <p style="color: #858796; font-size: 14px; margin-top: -14px">Diambil : {{ $lap->tglPengambilan }}</p>
                            </td>
                            <td id="status{{ $lap->idPesanan }}">
                                <div class="text-suc">
                                    {{ $lap->status }}    
                                </div>
                            </td>
                            <td>
                                <p style="text-align: center; font-weight: bolder">Rp. {{ number_format($lap -> totalHarga, 0, ',', '.') }}</p>
                            </td>
                        </tr>
                        @endforeach
                        <?php
                    }
                    ?>   
                </tbody>
            </table>
        </div>

        <div class="col-md-12 mt-4 mb-4">
            <ul class="pagination">
                {{ $laporanPaginator->links() }}
            </ul>
        </div>
</section>

@endsection