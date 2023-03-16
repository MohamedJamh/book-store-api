<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ["Science Fiction", "Mystery", "Romance", "Historical Fiction", "Fantasy", "Biography", "Memoir", "Thriller", "Horror", "Young Adult", "Children's", "Classics", "Poetry", "Cookbooks", "Self-help", "Travel", "Art", "History", "Religion", "Philosophy", "Science", "Business", "Finance", "Politics", "Comics", "Graphic Novels", "Humor", "Sports"];
        foreach ($genres as $gnere) {
            Genre::create([
                'name' => $gnere
            ]);
        }
    }
}
