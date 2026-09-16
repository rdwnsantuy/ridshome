@extends('layouts.main')

@section('content')
    <h1>Halo ini Halaman Detail Kategori</h1>
    <hr>
    <div class="card">
        <div class="card-header">
            Detail Kategori
        </div>
        <div class="card-body">
            <img src="https://placehold.co/600x400" class="img-fluid" alt="...">
            <p>Nama Kategori : {{ $kategori->nama_kategori }}</p>
            <p>Deskripsi : {{ $kategori->deskripisi }}</p>
            <a href="/kategori" class="btn btn-primary">Kembali ke Halaman Kategori</a>
        </div>
    </div>
@endsection
