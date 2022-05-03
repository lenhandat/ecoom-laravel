<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([[
                'name' => 'xuan duc',
                'email' => 'duc@gmail.com',
                'role' => 'user',
                'password' => Hash::make('12345')],
            [
                'name' => 'dat',
                'email' => 'lenhandat@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('12345')]
        ]);
    }
}
