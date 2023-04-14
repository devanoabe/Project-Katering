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
            <form method="post" action="{{ route('produk.update', $produk->idProduk) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="idProduk">ID Barang</label> 
                    <input type="text" name="idProduk" class="form-control" id="idProduk" value="{{ old('idProduk', $barang->idProduk) }}" aria-describedby="idBarang" > 
                </div>
                <div class="form-group">
                    <label for="idSupplier">ID Supplier</label> 
                    <select name="idSupplier" class="form-control" id="supplier">
                        @foreach($supplier as $s)
                            <option value="{{ old('idSupplier', $s -> idSupplier) }}">{{ $s -> nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
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
                </div>
                <div class="form-group">
                    <label for="idSatuan">ID Satuan</label> 
                    <select name="idSatuan" class="form-control" id="satuan">
                        @foreach($satuan as $s)
                            <option value="{{ old('idSatuan', $s -> idSatuan) }}">{{ $s -> namaSatuan }}</option>
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
                <div class="form-group">
                    <label for="namaBarang">Nama Barang</label> 
                    <input type="text" name="namaBarang" class="form-control" id="namaBarang" value="{{ old('namaBarang', $barang->namaBarang) }}" aria-describedby="namaBarang" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection