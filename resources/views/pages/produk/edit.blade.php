@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            Update Data Produk
        </div>
        <div class="card-body">
            <form action="/product/{{ $data->id_produk }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk_form" class="form-control"
                                value="{{ $data->nama_produk }}">
                            @error('nama_produk_form')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Harga Produk</label>
                            <input type="number" name="harga_produk" class="form-control" value="{{ $data->harga }}">
                            @error('harga_produk')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="deskripsi_produk" placeholder="Leave a comment here" style="height: 100px"></textarea>
                            <label class="form-label">{{ $data->deskripsi_produk }}</label>
                            @error('deskripsi_produk')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
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
