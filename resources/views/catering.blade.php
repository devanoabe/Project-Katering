@extends('layouts.indexCatering')

<head>
  <link href="{{asset('css/catering.scss')}}" rel="stylesheet">
</head>

@section('content')
<div class="main">
  <ul class="cards">
    @foreach($produk as $p)
    <li class="cards_item">
      <div class="card" data-produk-id="{{ $p->idProduk }}" data-produk-nama="{{ $p->namaProduk }}" data-produk-harga="{{ $p->hargaProduk }}">
        <div class="card_image"><img src="{{ asset('storage/'.$p->foto) }}"></div>
        <div class="card_content">
          <h2 class="card_title">{{$p->namaProduk}}</h2>
          <div class="card_text">
            <p>{{$p->deskripsi}}</p>
            <p>Rp. {{$p->hargaProduk}}</p>
          </div>
          @guest
          @if (Route::has('login'))
          <div class="button" data-toggle="modal" data-target="#login">
            <span style="margin-right:12px;"><i class="fa-solid fa-basket-shopping"></i></span> Pesan Sekarang
          </div>
          @endif
          @else
          <div class="button" id="pesanSekarang" data-toggle="modal" data-target="#pesan" data-produk-id="{{ $p->idProduk }}" data-produk-nama="{{ $p->namaProduk }}" data-produk-harga="{{ $p->hargaProduk }}">
            <span style="margin-right:12px;"><i class="fa-solid fa-basket-shopping"></i></span> Pesan Sekarang
          </div>
          @endguest
        </div>
      </div>
    </li>
    @endforeach
  </ul>
</div>

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close align-items-end" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <img src="../images/lg.png" class="mx-auto d-block" style="max-width: 30%; height: auto;">
          <h3 style="text-align: center; color: black; font-weight: bolder; padding-top: 10px">
              Login terlebih dahulu!
          </h3>
          <p style="text-align: center; color: black; padding-left: 40px; padding-right: 40px; font-size: 12px">
              Maaf, untuk melakukan pemesanan Anda harus login terlebih dahulu. Silakan login menggunakan akun Anda atau daftar jika belum memiliki akun
          </p>
          <div class="center text-center">
            <button style="background-color: black;" type="button" class="btn">
                <a style="color: white" href="{{ route('login') }}">{{ __('Login') }}</a>
            </button>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title wa">
          Pembayaran
          <p>
            Silahkan lanjutkan untuk pemesanan
          </p>
        </h2>
        <button type="button" class="close" data-dismiss="modal">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body img" style="justify-content: center; align-items: center;">
        <img src="../assets/img/katering.png" class="mx-auto d-block" style="max-width: 100%; height: auto;">
        <p style="text-align: center; color: red;">
          *Untuk Layanan Pengiriman dapat melakukan konfirmasi
        </p>
        <p style="text-align: left">
          Nomor Telepon
        </p>
        <h2 style="text-align: center; font-size: 50px; color:black;">0858-0046-0598</h2>
      </div>
      <div class="modal-footer">
        <div class="container-fluid mb-4">
          <div class="row">
            <div class="col-6 text-left">
              <button type="button" class="btn w-100 cls" data-dismiss="modal">Close</button>
            </div>
            <div class="col-6 text-right">
              <button type="submit" class="btn w-100 sbt">
                <a style="color: white" href="https://wa.me/6285800460598">
                  <i style="font-size:18px; margin-right: 8px" class="fa fa-whatsapp"></i>Hubungi
                </a>
              </button>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div> 
    </div>
  </div>
</div>

@if(session('showModal'))
<script>
  $(document).ready(function() {
    $('#pesanModal').modal('show');
  });
</script>
@endif

<div class="modal fade" id="pesan" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fa fa-flag-o" aria-hidden="true"></i>
        <h2 class="modal-title">Tambah Pesanan
        <p>Silahkan pilih tanggal dan jumlah pesanan</p>
        </h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="color:black;">
        <form method="post" action="{{ route('pesanan.store') }}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="idProduk">Nama Produk :</label><br>
            <input type="hidden" name="idProduk" id="idProduk">
            <p id="namaProduk"></p>
          </div>
          <div class="form-group">
            <label for="tglPemesanan">Tanggal Pemesanan</label><span>*</span>
            <input type="date" name="tglPemesanan" class="form-control" id="tglPemesanan" aria-describedby="tglPemesanan">
          </div>
          <div class="form-group">
            <label for="tglPengambilan">Tanggal Pengambilan</label><span>*</span>
            <input type="date" name="tglPengambilan" class="form-control" id="tglPengambilan" aria-describedby="tglPengambilan">
          </div>
          <div class="form-group">
            <label for="jumlahPesanan">Jumlah Pesanan</label><span>*</span>
            <input type="number" name="jumlahPesanan" class="form-control" id="jumlahPesanan" aria-describedby="jumlahPesanan">
          </div>
      </div>
      <div class="modal-footer justify-content-between">
          <label for="totalHarga">Total Harga</label>
          <p id="totalHarga"></p>
      </div>
      <div class="row p-3">
        <div class="col-2">
          <button style="border: 1px solid black; color: black" type="button" class="btn" data-dismiss="modal">Close</button>
        </div>
        <div class="col-10">
          <button style="background-color: black; color: white" type="submit" class="btn w-100 sb" id="submit">Submit</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script>
  $(document).ready(function() {
    $('.button').on('click', function() {
      var card = $(this).closest('.card');
      var idProduk = card.data('produk-id');
      var namaProduk = card.data('produk-nama');
      var hargaProduk = card.data('produk-harga');

      $('#idProduk').val(idProduk);
      $('#namaProduk').text(namaProduk);
      $('#totalHarga').text('Rp. 0.00'); // Set default value to 0.00

      $('#jumlahPesanan').on('input', function() {
        var jumlahPesanan = parseInt($(this).val());
        var totalHarga = jumlahPesanan * hargaProduk;

        if (!isNaN(totalHarga)) {
          $('#totalHarga').text('Rp. ' + totalHarga.toFixed(2));
        } else {
          $('#totalHarga').text('Rp. 0.00');
        }
      });
    });
    // Event saat modal ditutup
    $('#pesan').on('hidden.bs.modal', function() {
      $('#jumlahPesanan').val(''); // Mengosongkan input jumlah pesanan
      $('#totalHarga').text('Rp. 0.00'); // Mengatur total harga menjadi Rp 0.00
    });
  });
</script>
@endsection