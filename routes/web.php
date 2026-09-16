<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = [
        'nama' => 'Ridwan Maulana',
        'umur' => 23,
        'alamat' => 'Pondok Wonolelo, Widodomartani, Ngemplak, Sleman, Yogyakarta',
    ];
    return view('welcome', $data); // mengarahkan ke folder views di file welcome.blade.php
});

Route::get('/about', function () {
    return view(
        'pages.about',
        [
            'nama' => 'Ridwan Maulana',
            'umur' => 23,
            'alamat' => 'Pondok Wonolelo, Widodomartani, Ngemplak, Sleman, Yogyakarta',
        ]
    ); // mengarahkan ke folder views di file about.blade.php
});

Route::get('/about/{id}', function ($id) {
    return view('pages.detail', [
        'id' => $id
    ]);
});

Route::get('/contact', function () {
    return view('pages.contact'); // mengarahkan ke folder views di file contact.blade.php
});

Route::get('/product', [ProdukController::class, 'index']); //menampilkan data produk yang ada di database dengan menggunakan controller ProdukController dan method index

Route::get('/product/create', [ProdukController::class, 'create']); //menampilkan halaman form data
Route::post('/product', [ProdukController::class, 'store']); //mengelola data yang telah dikirim dari form data
Route::get('/product/{id}', [ProdukController::class, 'show']); //menampilkan detail data produk berdasarkan id

Route::get('/product/{id}/edit', [ProdukController::class, 'edit']);
Route::put('/product/{id}', [ProdukController::class, 'update']);

Route::resource('kategori', KategoriController::class); //membuat routing menggunakan resource controller, sehingga dapat mengakses semua method yang ada di KategoriController
