@extends('layouts.main')

@section('content')
    <h1>Halo ini Halaman Daftar Produk</h1>
    <hr>
    <div class="card">
        <div class="card-header">
            Daftar Produk
        </div>
        <div class="card-body">
            <img src="https://placehold.co/600x400" class="img-fluid" alt="...">
            <p>Nama Produk : {{ $produk->nama_produk }}</p>
            <p>Nama Produk : {{ $produk->harga }}</p>
            <p>Nama Produk : {{ $produk->deskripsi_produk }}</p>
            <p>Nama Produk : Alat Elektronik</p>
            <a href="/product" class="btn btn-primary">Kembali ke Produk</a>
        </div>
    </div>
@endsection
