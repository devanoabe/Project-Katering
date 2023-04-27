@extends('layouts.index')
@section('content')
<div class="container mt-5">
   <div class="row justify-content-center align-items-center">
   <div class="card" style="width: 24rem;">
   <div class="card-header">Tambah Produk Catering</div>
   
   <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">      
         <strong>Whoops!</strong> There were some problems with your input.<br><br>
         <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
      @endif
      
      <form method="post" action="{{ route('produk.store') }}" id="myForm">
         @csrf
         <div class="form-group">
            <label for="idProduk">ID Produk</label> 
            <input type="text" name="idProduk" class="form-control" id="idProduk" aria-describedby="idProduk" > 
         </div>
         <div class="form-group">
            <label for="namaProduk">Nama Produk</label> 
            <input type="text" name="namaProduk" class="form-control" id="namaProduk" aria-describedby="namaProduk" > 
         </div>
         <div class="form-group">
            <label for="deskripsi">Deskripsi</label> 
            <input type="text" name="deskripsi" class="form-control" id="deskripsi" aria-describedby="deskripsi" > 
         </div>
         <div class="form-group">
            <label for="hargaProduk">Harga Produk</label> 
            <input type="text" name="hargaProduk" class="form-control" id="hargaProduk" aria-describedby="hargaProdukhargaProduk" > 
         </div>
         <div class="form-group">
            <label for="user_id">ID User</label> 
            <select name="user_id" class="form-control">
                @foreach($user as $u)
                    <option value="{{ $u -> id }}">{{ $u -> name }}</option>
                @endforeach
            </select> 
         </div>
         <div class="form-group">
            <label for="idKategori">ID Kategori</label> 
            <select name="idKategori" class="form-control">
                @foreach($kategori as $k)
                    <option value="{{ $k -> idKategori }}">{{ $k -> namaKategori }}</option>
                @endforeach
            </select> 
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>
</div>
</div>
@endsection