@extends('layouts.main')

@section('content')
    <h1>Halo ini Halaman Daftar Produk</h1>
    <hr>
    <div class="card">
        <div class="card-header">
            Daftar Produk
        </div>
        <div class="card-body">
            {{-- {{ dd($produk->gambar) }} --}}
            @if ($produk->gambar == null)
                <p><strong>Gambar tidak ada!</strong></p>
            @else
                <img src="{{ asset('gambar_produk/' . $produk->gambar) }}" class="img-fluid" width="300" alt="...">
            @endif
            <p>Nama Produk : {{ $produk->nama_produk }}</p>
            <p>Harga Produk : {{ $produk->harga }}</p>
            <p>Deskripsi Produk : {{ $produk->deskripisi_produk }}</p>
            <p>Kategori Produk : {{ $produk->kategori_id }}</p>
            <p>Stok Produk : {{ $produk->stok }}</p>
            <a href="/product" class="btn btn-primary">Kembali ke Produk</a>
        </div>
    </div>
@endsection
