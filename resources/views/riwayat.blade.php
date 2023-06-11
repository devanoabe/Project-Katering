@extends('layouts.indexCatering')

<head>
    <link rel="stylesheet" href="{{asset('css/pesanan.css')}}">
</head>

@section('content')
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
<section style="padding-left: 50px; padding-right: 50px;" class="content">
    <h1 class="mb-0 judul" style="font-weight: bolder;">Pesanan <span>&</span> Status</h1>
    <h1 class="mb-5 judul" style="font-weight: bolder; margin-top: -20px">history dari pesanan selesai</h1>
        <div style="margin-top: 80px" class="card-body">
            <table style="color: white" class="table">
                <thead>
                    <tr>
                        <th style=" width: 250px">Tanggal <i class="fa fa-calendar-o" aria-hidden="true"></i></th>
                        <th>User</th>
                        <th style=" width: 340px">Produk</th>
                        <th style=" width: 190px" class="center">Jumlah</th>
                        <th>Status <i class="fa fa-arrow-down" aria-hidden="true"></i></th>
                        <th class="center">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesanan as $p)
                    <tr>
                        <td>
                            <div class="d-flex flex-row align-items-center mb-2">
                                <div class="text-center tgl-p">
                                    <span style="font-weight: bold;">{{ date('d', strtotime($p->tglPemesanan)) }}</span><br>
                                    <span>{{ date('F', strtotime($p->tglPemesanan)) }}</span>
                                </div>
                                <p style="margin-left: 5px; margin-top: 12px">
                                    <i style="font-size: 6px; color: red" class="fa fa-circle" aria-hidden="true"></i>
                                    Pemesanan
                                </p>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-2">
                                <div class="text-center tgl-pp">
                                    <span style="font-weight: bold;">{{ date('d', strtotime($p->tglPengambilan)) }}</span><br>
                                    <span>{{ date('F', strtotime($p->tglPengambilan)) }}</span>
                                </div>
                                <p style="margin-left: 5px; margin-top: 12px">
                                    <i style="font-size: 6px; color: green" class="fa fa-circle" aria-hidden="true"></i>
                                    Pengambilan
                                </p>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-row align-items-center pt-5">
                                <img style="width: 45px; height: auto; margin-right: 12px" class="img-profile rounded-circle" src="{{asset('assets/img/undraw_profile_3.svg')}}">
                                {{ $p->user->name }} <br>
                                {{ $p->user->email }}
                            </div>
                        </td>
                        <td>
                            <div class="pt-2">
                                <i style="margin-right: 10px; margin-bottom: 10px;" 
                                class="fa fa-cutlery" aria-hidden="true"></i>{{ $p->produk->namaProduk }} <br>
                                <p style="color: gray" class="mb-0">Isian : </p>
                                <p style="font-size: 12px">{{ $p->produk->deskripsi }}</p> 
                            </div>
                        </td>
                        <td style="font-size: 28px" class="center pt-5">{{ $p->jumlahPesanan }}</td>
                        <td style="padding-top: 60px">
                            <span id="status{{ $p->idPesanan }}" class="{{ $p->status === 'selesai' ? 'text-suc' : 'text-dan' }}">
                                {{ $p->status }}
                            </span> <br>
                             @if ($p->status === 'selesai')
                                <p style="color: gray; font-size: 12px; margin-top: 10px">at : {{ $p->updated_at->format('Y-m-d') }}</p>
                            @endif
                        </td>
                        <td style="font-size: 28px" class="center pt-5">Rp. {{ $p->totalHarga }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</section>
<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var activateButtons = document.querySelectorAll('.activate-button');

        activateButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var idPesanan = this.getAttribute('data-id');
                var statusCell = document.querySelector('#status' + idPesanan);

                // Kirim permintaan AJAX untuk memperbarui status
                $.ajax({
                    url: '/updateStatus/' + idPesanan,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    data: {
                        status: 'selesai'
                    },
                    success: function(response) {
                        // Perbarui status menjadi "selesai" di halaman
                        statusCell.textContent = 'selesai';
                    },
                    error: function(xhr, status, error) {
                        console.error('Gagal memperbarui status');
                    }
                });
            });
        });
    });
</script>
@endsection
@endsection