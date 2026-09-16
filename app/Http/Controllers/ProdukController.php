<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        })->get();
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
        return view('pages.produk.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk_form' => 'required|min:8|max:255',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
        ], [
            'nama_produk_form.min' => 'wajib diisi minimal 8 karakter',
            'nama_produk_form.max' => 'wajib diisi maksimal 255 karakter',
            'nama_produk_form.required' => 'wajib diisi',
            'harga_produk.required' => 'wajib diisi',
            'deskripsi_produk.required' => 'wajib diisi',
        ]);

        produk::create([
            'nama_produk' => $request->nama_produk_form,
            'harga' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'kategori_id' => '1',
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
        return view('pages.produk.edit', [
            'data' => $data,
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama_produk_form' => 'required|min:8|max:255',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
        ], [
            'nama_produk_form.min' => 'wajib diisi minimal 8 karakter',
            'nama_produk_form.max' => 'wajib diisi maksimal 255 karakter',
            'nama_produk_form.required' => 'wajib diisi',
            'harga_produk.required' => 'wajib diisi',
            'deskripsi_produk.required' => 'wajib diisi',
        ]);

        produk::where('id_produk', $id)->update(
            [
                'nama_produk' => $request->nama_produk_form,
                'harga' => $request->harga_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
            ]
        );

        return redirect('/product')->with('success', 'Data Produk Berhasil Diupdate!');
    }
}
