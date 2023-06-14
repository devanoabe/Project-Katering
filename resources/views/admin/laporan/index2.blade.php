@extends('layouts.index')

<head>
    <link rel="stylesheet" href="{{asset('css/laporan.css')}}">
</head>

@section('content')
<section style="padding-left: 50px; padding-right: 50px;" class="content">
        <div class="d-flex justify-content-between">
                <div class="d-flex flex-row align-items-left">
                    <div class="ms-2 c-details">
                        <h4 style="color: black; font-weight: bolder" class="mb-0">List Laporan</h4>
                        <p style="font-size: 12px">Detail laporan yang selesai dikerjakan</p>
                    </div>
                </div>
                <a style="background-color: black; color: white; padding: 10px; height: 50%;" href="{{ route('cetakPDF') }}" class="d-none d-sm-inline-block btn btn-sm shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50" style="margin-right: 5px; padding 20px"></i>Cetak ke PDF</a>
            </div>
        <div class="card">
            <table class="table table-borderless">
                <thead style="background-color: #f3f4fb;">
                    <tr>
                        <th width="50px">No. </th>
                        <th style="width: 50px; text-align: center">Pemesanan</th>
                        <th width="450px">Pesanan</th>
                        <th>Produk</th>
                        <th width="90px">Status</th>
                        <th style="width: 180px; text-align: center">Total Harga</th>
                </thead>
                <tbody>
                    @php
                    $i = 1; // Inisialisasi variabel increment
                    @endphp
                    @foreach($laporan as $lap)
                    <tr>
                        <td>{{ $i++ }}</td>
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
                </tbody>
            </table>
        </div>

</section>

@endsection