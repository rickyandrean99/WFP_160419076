<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Ricky Andrean',
                'email' => 's160419076@student.ubaya.ac.id',
                'hometown' => "Denpasar",
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Made Yoga',
                'email' => 's160419045@student.ubaya.ac.id',
                'hometown' => "Denpasar",
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Aditya Wijaya',
                'email' => 's160419051@student.ubaya.ac.id',
                'hometown' => "Denpasar",
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
