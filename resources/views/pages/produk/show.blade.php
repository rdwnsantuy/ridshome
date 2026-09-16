@extends('layouts.main')

@section('content')
    <h1>Halo ini Halaman Daftar Produk</h1>
    <hr>
    <a href="/product/create" type="button" class="btn btn-primary mb-3">Tambah Produk</a>
    <div class="alert alert-primary">
        <h4 class="alert-heading">Info Toko</h4>
        <p>Nama Toko -> {{ $data_toko['nama_toko'] }}</p>
        <p>Alamat Toko -> {{ $data_toko['alamat_toko'] }}</p>
        <p>Type Toko -> {{ $data_toko['type_toko'] }}</p>
    </div>
    @if (session('success'))
        <div class="alert alert-primary">
            {{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Daftar Produk
            <form class="input-group" style="width:350px">
                @if (Request()->keyword != '')
                    <a href="/product" class="btn btn-info">Reset</a>
                @endif
                <input type="text" class="form-control" name="keyword" placeholder="Cari data produk">
                <button class="btn btn-success" type="submit" id="button-addon2">Search Data</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Handle</th>
                </thead>
                <tbody>
                    @forelse ($data_produk as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->deskripsi_produk }}</td>
                            <td>
                                <button type="button" class="btn btn-danger">Delete</button>
                                <a href="/product/{{ $item->id_produk }}/edit" class="btn btn-warning">Edit</a>
                                <a href="/product/{{ $item->id_produk }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
