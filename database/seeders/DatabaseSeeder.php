<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'nama' => 'Administrator',
            'email' => 'hop2style@gmail.com',
            'nip_baru' => '123456789',
            'password' => bcrypt('admin123'),
            'password_look' => 'admin123',
        ]);
    }
}
