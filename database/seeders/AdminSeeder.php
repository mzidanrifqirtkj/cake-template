<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // Sample data
          DB::table('admin')->insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'admin',
                'phone' => '1234567890',
                'email' => 'admin@example.com',
                'username' => 'admin',
                'password' => bcrypt('password123'), // Store hashed password
                'raw_password' => 'password123', // Store raw password if needed
                'created_at' => now()
            ],
            // Add more sample customers as needed
        ]);
    }
}
