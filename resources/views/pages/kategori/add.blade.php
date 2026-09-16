@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            Tambah Kategori Produk
        </div>
        <div class="card-body">
            <form action="/kategori" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori_form" class="form-control"
                                value="{{ old('nama_kategori_form') }}">
                            @error('nama_kategori_form')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <input type="text" name="deskripisi" class="form-control" value="{{ old('deskripisi') }}">
                            @error('deskripisi')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="deskripsi_produk" placeholder="Leave a comment here" style="height: 100px"></textarea>
                            <label class="form-label">Deskripsi Produk</label>
                            @error('deskripsi_produk')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
