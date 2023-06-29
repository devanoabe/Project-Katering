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
    <div class="d-flex align-items-left">
        <div class="col-lg-12">
            <h1 class="mb-0 judul" style="font-weight: bolder;">Pesanan <span>&</span> Status <br> history dari semua pesanan</h1>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <div style="background-color: #1a1814; border-radius: 10px" class="card mt-5 p-4">
            <div class="d-flex flex-row">
                <div class="input-group mb-1">
                    <form class="form-inline mr-auto mw-100 navbar-search pl-3" action="{{ route('home.status') }}" method="GET">
                    <div class="input-group">
                        <input style="border-radius: 10px 0px 0px 10px; background-color: black" type="text" name="keyword" id="search-input" class="form-control border-0 small" placeholder="Cari Produk..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                        <button style="padding-top: 10px; padding-bottom: 10px; background-color: black; color: white; border: none; border-radius: 0px 10px 10px 0px;"class="btn" type="submit">
                            <i class="fas fa-search fa-sm"></i> Search
                        </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            
            <div style="color: white;" class="d-flex flex-row justify-content-between mb-3 mt-3">
                <div style="border: 1px solid #f3b42d; border-radius: 9px" class="row">
                    <div class="d-flex flex-column p-3 mb-1 col-lg-9 col-sm-9 order-1 order-sm-0">
                        <p class="mb-0">Total Pemesanan yang pernah dipesan!</p>
                        <small style="color: #f3b42d">{{ $pesan }} pesanan</small>
                    </div>
                    <div style="background-color: #f3b42d; border-radius: 7.5px" class="price col-lg-3 col-sm-3 order-sm-1">
                        <a href="{{ route('home.catering') }}" style="color: black; font-weight: bolder">Pesan Lagi?</a>
                    </div>
                </div>
            </div>
            
            <div style="color: white;" class="d-flex flex-row justify-content-between mb-3 mt-3">
                <div style="border: 1px solid #f3b42d; border-radius: 9px" class="row">
                    <div class="d-flex flex-column p-3 mb-1 col-lg-9 col-sm-9 order-1 order-sm-0">
                        <p class="mb-0">Total Pemesanan yang status selesai</p>
                        <small style="color: #f3b42d">{{ $riwayat }} pesanan</small>
                    </div>
                    <div style="background-color: #f3b42d; border-radius: 7.5px" class="price col-lg-3 col-sm-3 order-sm-1">
                        <a href="{{ route('home.riwayat') }}" style="color: black; font-weight: bolder">Lihat Riwayat</a>
                    </div>
                </div>
            </div>

        </div>	
    </div>
    @foreach($pesanan as $p)
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col" style=" width: 200px">Tanggal <i class="fa fa-calendar-o" aria-hidden="true"></i></th>
                <th scope="col" style=" width: 340px">Produk</th>
                <th scope="col" style=" width: 140px" class="center">Jumlah</th>
                <th scope="col" class="center">Status</th>
                <th scope="col" class="center">Total</th>
                <th class="d-none d-sm-block center" scope="col">User</th>
            </tr>
        </thead>
        <tbody style="color: white">
            <tr>
                <td>
                    <div class="d-flex flex-row align-items-center mb-2 tul">
                        <div class="text-center tgl-p flex-column flex-md-row">
                            <span style="font-weight: bold;">{{ date('d', strtotime($p->tglPemesanan)) }}</span>
                            <span class="d-md-block">&nbsp;{{ date('F', strtotime($p->tglPemesanan)) }}</span>
                        </div>
                        <p class="d-none d-sm-block" style="margin-left: 5px; margin-top: 12px">
                            Pemesanan
                        </p>
                    </div>
                    <div class="d-flex flex-row align-items-center mb-2 tul">
                        <div class="text-center tgl-pp flex-column flex-md-row">
                            <span style="font-weight: bold;">{{ date('d', strtotime($p->tglPengambilan)) }}</span>
                            <span class="d-md-block">&nbsp;{{ date('F', strtotime($p->tglPengambilan)) }}</span>
                        </div>
                        <p class="d-none d-sm-block"  style="margin-left: 5px; margin-top: 12px">
                            Pengambilan
                        </p>
                    </div>
                </td>
                <td>    
                    <div class="pro">
                        <i style="margin-right: 10px; margin-bottom: 10px;" class="d-none d-sm-block fa fa-cutlery" aria-hidden="true"></i>
                        <p class="mb-0">{{ $p->produk->namaProduk }}</p>
                        <p style="color: gray" class="d-none d-sm-block pt-2">Isian : </p>
                        <p style="font-size: 12px; margin-top: -10px" class="d-none d-sm-block">{{ $p->produk->deskripsi }}</p>
                    </div>
                </td>
                <td style="font-size: 28px" class="center jum">
                    <p>{{ $p->jumlahPesanan }}</p>
                </td>
                <td style="text-align: center;" class="stat">
                    <span id="status{{ $p->idPesanan }}" class="{{ $p->status === 'selesai' ? 'text-suc' : 'text-dan' }}">
                        {{ $p->status }}
                    </span>
                </td>
                <td style="font-size: 28px" class="center tot">
                    <p>{{ $p->totalHarga }}</p>
                </td>
                <td class="center">
                    <div class="d-flex d-none d-sm-block flex-row align-items-center pt-1">
                        <img style="width: 40px; height: auto; margin-right: 12px" class="img-profile rounded-circle" src="{{asset('assets/img/undraw_profile_3.svg')}}">
                        {{ $p->user->name }} <br>
                        <p class="pt-2">{{ $p->user->email }}</p>
                    </div>
                </td>
            </tr>
        
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 80px">
    <!-- <div class="table-responsive">
        <table style="color: white" class="table">
            <thead>
                <tr>
                    <th scope="col" style=" width: 250px">Tanggal <i class="fa fa-calendar-o" aria-hidden="true"></i></th>
                    <th scope="col">User</th>
                    <th scope="col" style=" width: 340px">Produk</th>
                    <th scope="col" style=" width: 190px" class="center">Jumlah</th>
                    <th scope="col">Status <i class="fa fa-arrow-down" aria-hidden="true"></i></th>
                    <th scope="col" class="center">Total Harga</th>
                </tr>
            </thead>
            <tbody>
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
                            <i style="margin-right: 10px; margin-bottom: 10px;" class="fa fa-cutlery" aria-hidden="true"></i>{{ $p->produk->namaProduk }} <br>
                            <p style="color: gray" class="mb-0">Isian : </p>
                            <p style="font-size: 12px">{{ $p->produk->deskripsi }}</p>
                        </div>
                    </td>
                    <td style="font-size: 28px" class="center pt-5">{{ $p->jumlahPesanan }}</td>
                    <td style="padding-top: 60px">
                        <span id="status{{ $p->idPesanan }}" class="{{ $p->status === 'selesai' ? 'text-suc' : 'text-dan' }}">
                            {{ $p->status }}
                        </span>
                    </td>
                    <td style="font-size: 28px" class="center pt-5">Rp. {{ $p->totalHarga }}</td>
                </tr>
            </tbody>
        </table>
        </div> -->
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

    $(document).ready(function() {

        $('#search-input').keyup(function(event) {
            event.preventDefault();

            var keyword = $('#search-input').val();

            $.ajax({
                url: "{{ route('home.status') }}",
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    keyword: keyword
                },
                success: function(response) {
                    // Proses dan tampilkan hasil pencarian di frontend
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error('Gagal melakukan pencarian');
                }
            });
        });
    });
</script>
@endsection
@endsection