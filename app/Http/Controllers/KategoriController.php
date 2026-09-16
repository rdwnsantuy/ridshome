<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $toko = [
        //     'nama_toko' => 'Ridshome',
        //     'alamat_toko' => 'Pondok Wonolelo, Widodomartani, Ngemplak, Sleman, Yogyakarta',
        //     'type_toko' => 'Toko Online',
        // ];

        $search = $request->keyword;

        $kategori = Kategori::when($search, function ($query, $search) {
            return $query->where('nama_kategori', 'like', "%{$search}%");
        })->get();
        // $eloquent = produk::get();
        // $queryBuilder = DB::table('tb_produk')->get();
        // dd($queryBuilder);
        return view('pages.kategori.show', [
            'data_kategori' => $kategori,
        ]); // mengarahkan ke folder views di file produk.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_form' => 'required|min:8|max:255',
            'deskripisi' => 'required',
        ], [
            'nama_kategori_form.min' => 'wajib diisi minimal 8 karakter',
            'nama_kategori_form.max' => 'wajib diisi maksimal 255 karakter',
            'nama_kategori_form.required' => 'wajib diisi',
            'deskripisi.required' => 'wajib diisi',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori_form,
            'deskripisi' => $request->deskripisi,
            'id_kategori' => '1',
        ]);
        // dd($request->all());

        // produk::create([
        //     'nama_produk' => 'laptop terbaru',
        //     'harga' => 999,
        //     'deskripsi_produk' => 'laptop baru banget',
        //     'kategori_id' => '1',
        // ]);

        return redirect('/kategori')->with('success', 'Data Kategori Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $data = kategori::findOrFail($id);
        return view(
            'pages.kategori.detail',
            [
                'kategori' => $data
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = kategori::findOrFail($id);
        return view('pages.kategori.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nama_kategori_form' => 'required|min:8|max:255',
            'deskripisi' => 'required',
        ], [
            'nama_kategori_form.min' => 'wajib diisi minimal 8 karakter',
            'nama_kategori_form.max' => 'wajib diisi maksimal 255 karakter',
            'nama_kategori_form.required' => 'wajib diisi',
            'deskripisi.required' => 'wajib diisi',
        ]);

        kategori::where('id_kategori', $id)->update(
            [
                'nama_kategori' => $request->nama_kategori_form,
                'deskripisi' => $request->deskripisi,
            ]
        );

        return redirect('/kategori')->with('success', 'Data Kategori Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect('/kategori')
            ->with('success', 'Data Kategori Berhasil Dihapus!');
    }
}
