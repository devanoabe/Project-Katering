@extends('layouts.indexCatering')
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="{{asset('css/catering.scss')}}" rel="stylesheet">
</head>

@section('content')
<div class="main">

  <ul class="cards">
  @foreach($produk as $p)
    <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="https://assets.codepen.io/652/photo-1468777675496-5782faaea55b.jpeg" alt="mixed vegetable salad in a mason jar. "></div>
        <div class="card_content">
          <h2 class="card_title">{{$p->namaProduk}}</h2>
          <div class="card_text">
            <p>{{$p->deskripsi}}</p>
            <p>Rp. {{$p->hargaProduk}}</p>
          </div>
          <div class="button">
            <span style="margin-right:12;"><i class="fa-solid fa-basket-shopping"></i></span> Pesan Sekarang</div>
        </div>
      </div>
    </li>
    @endforeach
  </ul>

</div>
@endsection