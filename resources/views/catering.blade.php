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
          <div class="button" data-toggle="modal" data-target="#pesan" data-produk-id="{{ $p->idProduk }}" data-produk-nama="{{ $p->namaProduk }}" data-produk-harga="{{ $p->hargaProduk }}">
            <span style="margin-right:12px;"><i class="fa-solid fa-basket-shopping"></i></span> Pesan Sekarang
          </div>
        </div>
      </div>
    </li>
    @endforeach
  </ul>
</div>
<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 style="color: black;" class="modal-title" id="exampleModalLongTitle">Pengumuman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <h5 style="color: black;">
            Untuk pemesanan silahkan hubungi nomor wa
          </h5>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">
          <a href="https://wa.me/6281339059398">
            Hubungi
          </a>
        </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      <!-- Konten lainnya di dalam modal -->
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
        <h4 class="modal-title">Tambah Pesanan</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="color:black;">
        <form method="post" action="{{ route('pesanan.store') }}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="idProduk">ID Produk</label>
            <input type="hidden" name="idProduk" id="idProduk">
            <span id="namaProduk"></span>
          </div>
          <div class="form-group">
            <label for="tglPemesanan">Tanggal Pemesanan</label>
            <input type="date" name="tglPemesanan" class="form-control" id="tglPemesanan" aria-describedby="tglPemesanan">
          </div>
          <div class="form-group">
            <label for="tglPengambilan">Tanggal Pengambilan</label>
            <input type="date" name="tglPengambilan" class="form-control" id="tglPengambilan" aria-describedby="tglPengambilan">
          </div>
          <div class="form-group">
            <label for="jumlahPesanan">Jumlah Pesanan</label>
            <input type="number" name="jumlahPesanan" class="form-control" id="jumlahPesanan" aria-describedby="jumlahPesanan">
          </div>
          <div class="form-group">
            <label for="totalHarga">Total Harga</label>
            <span id="totalHarga"></span>
          </div>
          <button type="submit" data-toggle="modal" data-target="#wa" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

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
