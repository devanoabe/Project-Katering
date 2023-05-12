@extends('layouts.index')
 @section('content')
 <div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Edit Data Produk</div>
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
            <form method="post" action="{{ route('produk.update', $produk->idProduk) }}" id="myForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idProduk">ID Produk</label> 
                    <input type="text" name="idProduk" class="form-control" id="idProduk" value="{{ old('idProduk', $produk->idProduk) }}" aria-describedby="idProduk" > 
                </div>
                <div class="form-group">
                    <label for="namaProduk">Nama Produk</label> 
                    <input type="text" name="namaProduk" class="form-control" id="namaProduk" value="{{ old('namaProduk', $produk->namaProduk) }}" aria-describedby="namaProduk" > 
                </div>
                <div class="form-group">
                    <label for="foto">Foto Produk</label>
                    <input type="file" class="form-control" required="required" name="foto" value = "{{ $produk->foto }}"></br>
                    <img width="100px" height="100px" src="{{asset('storage/'.$produk->foto)}}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label> 
                    <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="{{ old('deskripsi', $produk->deskripsi) }}" aria-describedby="deskripsi" > 
                </div>
                <div class="form-group">
                    <label for="hargaProduk">Harga Produk</label> 
                    <input type="text" name="hargaProduk" class="form-control" id="hargaProduk" value="{{ old('hargaProduk', $produk->hargaProduk) }}" aria-describedby="hargaProduk" > 
                </div>
                <div class="form-group">
                    <label for="user_id">ID User</label> 
                    <select name="user_id" class="form-control" id="user">
                        @foreach($user as $u)
                            <option value="{{ old('user_id', $u -> id) }}">{{ $u -> name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- <div class="form-group">
                    <label for="idUser">ID User</label>
                    <select name="idUser" class="form-control" id="user">
                        @foreach($user as $u)
                            <option value="{{ $u -> idUser }}">{{ $u -> username }}</option>
                        @endforeach
                    </select>
                    <script>
                        document.getElementById('user').addEventListener('change', function() {
                            var selectedOption = this.value;
                            localStorage.setItem('selectedOption', selectedOption);
                        });
                    </script>
                </div> -->
                <div class="form-group">
                    <label for="kategori_id">ID Kategori</label> 
                    <select name="kategori_id" class="form-control">
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