@extends('layouts.index')
@section('content')
<div class="col-md-12 d-flex flex-row justify-content-end">
    <a class="btn btn-success" href="{{ route('produk.create') }}"> Input Produk Catering</a>
</div>
<section class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section>
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Produk Catering</h3><br>
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
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Foto Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>ID User</th>
                        <th>ID Kategori</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produks as $p)
                        <tr>
                            <td>{{ $p -> idProduk}}</td>
                            <td>{{ $p -> namaProduk}}</td>x
                            <td><img src="{{ asset('storage/'.$p->foto) }}" alt="Foto Produk" width="100"></td>
                            <td>{{ $p -> deskripsi}}</td>
                            <td><span>Rp. </span>{{ $p -> hargaProduk}}</td>
                            <td>{{ $p -> user_id}}</td>
                            <td>{{ $p -> kategori_id}}</td>
                            <td>
                                <form action="{{ route('produk.destroy',$p->idProduk) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('produk.show',$p->idProduk) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('produk.edit',$p->idProduk) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                <div class="text-center mt-5">
                    <a class="btn btn-primary" href="{{ route('exportPDF') }}" target="_blank">Cetak ke PDF</a>
                </div>

                <div class="col-md-12">
                    {{ $produks->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
