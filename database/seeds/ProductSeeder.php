<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'nama' => "Almond Jelly Pudding",
                'stok' => 10,
                'harga_jual' => 5000,
                'harga_produksi' => 4000,
                'category_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama' => "Bread Pudding",
                'stok' => 20,
                'harga_jual' => 7000,
                'harga_produksi' => 5600,
                'category_id' => 1,
                'supplier_id' => 2
            ],
            [
                'nama' => "Cantonese Pudding",
                'stok' => 30,
                'harga_jual' => 6000,
                'harga_produksi' => 4700,
                'category_id' => 1,
                'supplier_id' => 3
            ],
            [
                'nama' => "Danish Apple Pudding",
                'stok' => 40,
                'harga_jual' => 9000,
                'harga_produksi' => 7600,
                'category_id' => 1,
                'supplier_id' => 1
            ],
            [
                'nama' => "Flummery Pudding",
                'stok' => 50,
                'harga_jual' => 17500,
                'harga_produksi' => 14900,
                'category_id' => 2,
                'supplier_id' => 2
            ],
            [
                'nama' => "Gooey Chocolate Pudding",
                'stok' => 60,
                'harga_jual' => 21500,
                'harga_produksi' => 18000,
                'category_id' => 2,
                'supplier_id' => 3
            ],
            [
                'nama' => "Lemon Pudding",
                'stok' => 70,
                'harga_jual' => 15000,
                'harga_produksi' => 11300,
                'category_id' => 2,
                'supplier_id' => 1
            ],
            [
                'nama' => "Malva Pudding",
                'stok' => 80,
                'harga_jual' => 17500,
                'harga_produksi' => 14900,
                'category_id' => 2,
                'supplier_id' => 2
            ],
            [
                'nama' => "Pannacotta Pudding",
                'stok' => 90,
                'harga_jual' => 29000,
                'harga_produksi' => 24000,
                'category_id' => 3,
                'supplier_id' => 3
            ],
            [
                'nama' => "Silky Pudding",
                'stok' => 100,
                'harga_jual' => 32000,
                'harga_produksi' => 27500,
                'category_id' => 3,
                'supplier_id' => 1
            ],
            [
                'nama' => "Sussex Pond Pudding",
                'stok' => 110,
                'harga_jual' => 29000,
                'harga_produksi' => 25000,
                'category_id' => 3,
                'supplier_id' => 2
            ],
            [
                'nama' => "Yorkshire Pudding",
                'stok' => 120,
                'harga_jual' => 25000,
                'harga_produksi' => 22000,
                'category_id' => 3,
                'supplier_id' => 3
            ],
        ]);
    }
}
