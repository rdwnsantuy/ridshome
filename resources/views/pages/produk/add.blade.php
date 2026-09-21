@extends('layouts.main')
@section('title', 'Tambah Produk')

@section('content')
    <div class="card">
        <div class="card-header">
            Tambah Data Produk
        </div>
        <div class="card-body">
            <form action="/product" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Foto Produk</label>
                            <input type="file" name="gambar" class="form-control" value="{{ old('gambar') }}">
                            @error('gambar')
                                <div id="gambar" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk_form" class="form-control"
                                value="{{ old('nama_produk_form') }}">
                            @error('nama_produk_form')
                                <div id="nama_produk_form" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Harga Produk</label>
                            <input type="number" name="harga_produk" class="form-control"
                                value="{{ old('harga_produk') }}">
                            @error('harga_produk')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="custom-select" aria-label="Default select example" name="kategori">
                                <option value="" selected>Pilih di sini</option>
                                @foreach ($data as $item)
                                    <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{ old('stok') }}">
                            @error('stok')
                                <div id="stok" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <label class="form-label">Deskripsi Produk</label>
                            <textarea class="form-control" name="deskripisi_produk" style="height: 100px">{{ old('deskripisi_produk') }}</textarea>
                            @error('deskripisi_produk')
                                <div id="deskripisi_produk" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
