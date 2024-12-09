<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'header' => 'Introduction to Laravel',
                'description' => 'This blog post is all about getting started with Laravel.',
                'account_id' => 1, // Assuming this corresponds to 'John Doe' in AccountSeeder
            ],
            [
                'header' => 'Advanced Laravel Tips',
                'description' => 'Some advanced tips for working with Laravel efficiently.',
                'account_id' => 2, // Assuming this corresponds to 'Jane Smith' in AccountSeeder
            ],
        ]);
    }
}
