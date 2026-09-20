@extends('layouts.main')
@section('title', 'Daftar Kategori')

@section('content')
    {{-- Tombol tambah kategori --}}
    <a href="/kategori/create" class="btn btn-primary mb-3">
        Tambah Kategori
    </a>

    {{-- Menampilkan pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-primary">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        {{-- Header --}}
        <div class="card-header d-flex justify-content-between align-items-center">

            Tabel Kategori

            {{-- Form pencarian --}}
            <form class="input-group" style="width:350px">

                @if (Request()->keyword != '')
                    <a href="/kategori" class="btn btn-info">
                        Reset
                    </a>
                @endif

                <input type="text" class="form-control" name="keyword" placeholder="Cari data kategori"
                    value="{{ Request()->keyword }}">

                <button class="btn btn-success" type="submit" id="button-addon2">
                    Search Data
                </button>

            </form>
        </div>

        {{-- Body --}}
        <div class="card-body">

            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($data_kategori as $item)
                        <tr>

                            {{-- Nomor --}}
                            <th scope="row">
                                {{ $loop->iteration }}
                            </th>

                            {{-- Nama kategori --}}
                            <td>
                                {{ $item->nama_kategori }}
                            </td>

                            {{-- Deskripsi --}}
                            <td>
                                {{ $item->deskripsi }}
                            </td>

                            {{-- Aksi --}}
                            <td>

                                {{-- Form Hapus --}}
                                <form action="/kategori/{{ $item->id_kategori }}" method="POST" style="display: inline;">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        Delete
                                    </button>

                                </form>

                                {{-- Tombol Edit --}}
                                <a href="/kategori/{{ $item->id_kategori }}/edit" class="btn btn-warning">
                                    Edit
                                </a>

                                {{-- Tombol Detail --}}
                                <a href="/kategori/{{ $item->id_kategori }}" class="btn btn-info">
                                    Detail
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
    </div>
@endsection