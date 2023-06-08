@extends('layouts.index')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Laporan Pemesanan</h3><br>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>ID Pesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Produk</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Pengambilan</th>
                        <th>Jumlah Pesanan</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                </thead>
                <tbody>
                    @php
                    $i = 1; // Inisialisasi variabel increment
                    @endphp
                    @foreach($laporan as $lap)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $lap->idPesanan }}</td>
                        <td>{{ $lap->user->name }}</td>
                        <td>{{ $lap->produk->namaProduk }}</td>
                        <td>{{ $lap->tglPemesanan }}</td>
                        <td>{{ $lap->tglPengambilan }}</td>
                        <td>{{ $lap->jumlahPesanan }}</td>
                        <td>Rp. {{ number_format($lap -> totalHarga, 0, ',', '.') }}</td>
                        <td id="status{{ $lap->idPesanan }}">{{ $lap->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center mt-5">
                <a href="{{ route('cetakPDF') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50" style="margin-right: 5px;"></i>Cetak ke PDF</a>
            </div>
        </div>
    </div>
</section>

@endsection