<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('tb_kategori')->insert([
            [
                'nama_kategori' => "Elektronik 1",
                'deskripsi' => "barang barang mantap",
            ],
            [
                'nama_kategori' => "Elektronik 2",
                'deskripsi' => "barang barang bagus",
            ],
        ]);

        DB::table('tb_produk')->insert([
            [
                'kode_produk' => "A0001",
                'nama_produk' => 'TV Samsung 32 inch A',
                'harga' => 3000000,
                'deskripisi_produk' => 'TV Samsung 32 inch dengan kualitas gambar yang jernih, cocok untuk menonton film dan bermain game.',
                'stok' => 100,
                'kategori_id' => 1,
                'created_at' => now(),
            ],
            [
                'kode_produk' => "A0002",
                'nama_produk' => 'Charger TV Samsung 32 inch A',
                'harga' => 150000,
                'deskripisi_produk' => 'Charger TV Samsung 32 inch dengan kualitas gambar yang jernih, cocok untuk menonton film dan bermain game.',
                'stok' => 99,
                'kategori_id' => 2,
                'created_at' => now(),
            ],
        ]);
    }
}
