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
        DB::table('tb_produk')->insert([
            [
                'nama_produk' => 'TV Samsung 32 inch A',
                'harga' => 3000000,
                'deskripisi_produk' => 'TV Samsung 32 inch dengan kualitas gambar yang jernih, cocok untuk menonton film dan bermain game.',
                'kategori_id' => 1,
                'created_at' => now(),
            ],
            [
                'nama_produk' => 'TV Samsung 32 inch B',
                'harga' => 3000000,
                'deskripisi_produk' => 'TV Samsung 32 inch dengan kualitas gambar yang jernih, cocok untuk menonton film dan bermain game.',
                'kategori_id' => 2,
                'created_at' => now(),
            ],
            [
                'nama_produk' => 'TV Samsung 32 inch C',
                'harga' => 3000000,
                'deskripisi_produk' => 'TV Samsung 32 inch dengan kualitas gambar yang jernih, cocok untuk menonton film dan bermain game.',
                'kategori_id' => 3,
                'created_at' => now(),
            ],
        ]);
    }
}
