<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $toko = [
            'nama_toko' => 'Ridshome',
            'alamat_toko' => 'Pondok Wonolelo, Widodomartani, Ngemplak, Sleman, Yogyakarta',
            'type_toko' => 'Toko Online',
        ];

        $search = $request->keyword;

        $produk = produk::when($search, function ($query, $search) {
            return $query->where('nama_produk', 'like', "%{$search}%");
        })
            ->join('tb_kategori', 'tb_produk.kategori_id', "=", 'tb_kategori.id_kategori')
            ->get();
        // $eloquent = produk::get();
        // $queryBuilder = DB::table('tb_produk')->get();
        // dd($queryBuilder);
        return view('pages.produk.show', [
            'data_toko' => $toko,
            'data_produk' => $produk,
        ]); // mengarahkan ke folder views di file produk.blade.php
    }

    public function create()
    {
        $data_kategori = Kategori::get();
        return view(
            'pages.produk.add',
            [
                'data' => $data_kategori
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk_form' => 'required|min:8|max:255',
            'harga_produk' => 'required',
            'deskripisi_produk' => 'required',
            'stok' => 'required',
            'kategori' => 'required',
        ], [
            'nama_produk_form.min' => 'wajib diisi minimal 8 karakter',
            'nama_produk_form.max' => 'wajib diisi maksimal 255 karakter',
            'nama_produk_form.required' => 'wajib diisi',
            'harga_produk.required' => 'wajib diisi',
            'deskripisi_produk.required' => 'wajib diisi',
        ]);

        produk::create([
            'kode_produk' => Str::random(10),
            'nama_produk' => $request->nama_produk_form,
            'harga' => $request->harga_produk,
            'deskripisi_produk' => $request->deskripisi_produk,
            'kategori_id' => $request->kategori,
            'stok' => $request->stok,
        ]);
        // dd($request->all());

        // produk::create([
        //     'nama_produk' => 'laptop terbaru',
        //     'harga' => 999,
        //     'deskripsi_produk' => 'laptop baru banget',
        //     'kategori_id' => '1',
        // ]);

        return redirect('/product')->with('success', 'Data Produk Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        $data = produk::findOrFail($id);
        return view(
            'pages.produk.detail',
            [
                'produk' => $data
            ]
        );
    }

    public function edit($id)
    {
        $data = produk::findOrFail($id);
        $data_kategori = Kategori::get();

        return view('pages.produk.edit', [
            'data' => $data,
            'kategori' => $data_kategori,
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama_produk_form' => 'required|min:8|max:255',
            'harga_produk' => 'required',
            'deskripisi_produk' => 'required',
            'stok' => 'required',
            'kategori' => 'required',
        ], [
            'nama_produk_form.min' => 'wajib diisi minimal 8 karakter',
            'nama_produk_form.max' => 'wajib diisi maksimal 255 karakter',
            'nama_produk_form.required' => 'wajib diisi',
            'harga_produk.required' => 'wajib diisi',
            'deskripisi_produk.required' => 'wajib diisi',
        ]);

        produk::where('id_produk', $id)->update(
            [
                'nama_produk' => $request->nama_produk_form,
                'harga' => $request->harga_produk,
                'deskripisi_produk' => $request->deskripisi_produk,
                'stok' => $request->stok,
                'kategori_id' => $request->kategori,
            ]
        );

        return redirect('/product')->with('success', 'Data Produk Berhasil Diupdate!');
    }
}
