@extends('layouts.main')

@section('title', 'Daftar Produk')

@section('content')
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
                    <th scope="col">Nomor</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Kode Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col" style="width: 200px;">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </thead>
                <tbody>
                    @forelse ($data_produk as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->kode_produk }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->deskripisi_produk }}</td>
                            <td>
                                <!-- Tombol Delete -->
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModal{{ $item->id_produk }}">
                                    Delete
                                </button>

                                <!-- Tombol Edit -->
                                <a href="/product/{{ $item->id_produk }}/edit" class="btn btn-warning">
                                    Edit
                                </a>

                                <!-- Tombol Detail -->
                                <a href="/product/{{ $item->id_produk }}" class="btn btn-info">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteModal{{ $item->id_produk }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel{{ $item->id_produk }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $item->id_produk }}">
                                            Konfirmasi Hapus
                                        </h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        Apakah kamu yakin ingin menghapus produk
                                        <strong>{{ $item->nama_produk }}</strong>?
                                    </div>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Batal
                                        </button>

                                        <form action="/product/{{ $item->id_produk }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
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
