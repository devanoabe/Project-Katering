@extends('layouts.index')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">Detail Produk Catering</div>
            <div class="card-body">
                @if ($produk)
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>ID Produk: </b>{{ $produk->idProduk }}</li>
                        <li class="list-group-item"><b>Nama Produk: </b>{{ $produk->namaProduk }}</li>
                        <li class="list-group-item"><b>Foto Produk: </b>{{ $produk->foto }}</li>
                        <li class="list-group-item"><b>Deskripsi: </b>{{ $produk->deskripsi }}</li>
                        <li class="list-group-item"><b>Harga Produk: </b>{{ $produk->hargaProduk }}</li>
                        <li class="list-group-item"><b>ID User: </b>{{ $produk->user_id }}</li>
                        <li class="list-group-item"><b>ID Kategori: </b>{{ $produk->idKategori }}</li>
                    </ul>
                @else
                    <p>Produk tidak ditemukan.</p>
                @endif
            </div>
            <a class="btn btn-success mt-3" href="{{ route('produk.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection
