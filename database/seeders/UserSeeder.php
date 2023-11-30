<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
            'name' => 'Akaia cosmetics',
            'email' => 'akhaiacosmetics@gmail.com',
            'password' => Hash::make('admin123'),
            'is_admin' => 1,
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
