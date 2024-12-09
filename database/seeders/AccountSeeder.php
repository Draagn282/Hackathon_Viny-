<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('password123'),
                'date_of_birth' => '1990-01-01',
                'created_at' => now(), // Automatically populates the timestamp
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => bcrypt('password123'),
                'date_of_birth' => '1995-05-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
