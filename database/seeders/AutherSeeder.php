<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = ["J.K. Rowling", "Stephen King", "George R.R. Martin", "Jane Austen", "Ernest Hemingway"];
        foreach ($authors as $author) {
            Author::create([
                "name" => $author
            ]);
        }
    }
}
