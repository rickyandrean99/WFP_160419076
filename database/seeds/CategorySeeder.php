<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'nama' => "Pudding Murah"
            ],
            [
                'nama' => "Pudding Menengah"
            ],
            [
                'nama' => "Pudding Mahal"
            ]
        ]);
    }
}
