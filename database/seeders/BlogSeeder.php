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
                'header' => 'Vinyls and you',
                'description' => 'This blog post is all about getting started with Laravel.',
                'account_id' => 1, // Assuming this corresponds to 'John Doe' in AccountSeeder
            ],
            [
                'header' => 'top 10 Weekly Vote',
                'description' => 'Some advanced tips for working with Laravel efficiently.',
                'account_id' => 2, // Assuming this corresponds to 'Jane Smith' in AccountSeeder
            ],
        ]);
    }
}
