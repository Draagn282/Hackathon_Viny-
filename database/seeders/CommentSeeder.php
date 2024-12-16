<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->insert([
            [
                'description' => 'This is a great blog post!',
                'blogs_id' => 1, // Blog ID from BlogSeeder
                'account_id' => 2, // Jane Smith
            ],
            [
                'description' => 'Thanks for the insights!',
                'blogs_id' => 2, // Blog ID from BlogSeeder
                'account_id' => 1, // John Doe
            ],
        ]);
    }
}
