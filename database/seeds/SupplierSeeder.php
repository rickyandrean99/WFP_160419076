<?php

use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [
                'name' => "PT. Supplier A",
                'address' => "Jln. Raya Kalirungkut",
            ],
            [
                'name' => "PT. Supplier B",
                'address' => "Jln. Raya Tenggilis",
            ],
            [
                'name' => "PT. Supplier C",
                'address' => "Jln. Raya Ngagel",
            ]
        ]);
    }
}
