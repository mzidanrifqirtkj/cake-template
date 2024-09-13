<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            [
                'uuid' => Str::uuid(),
                'username' => 'johnny',
                'password' => bcrypt('password123'), // Hashed password
                'raw_password' => 'password123', // Raw password (optional, not recommended for production)
                'created_at' => now(), // Current timestamp
            ],
            // Add more entries if needed
        ]);
    }
}
