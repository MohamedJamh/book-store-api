<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = ["The Lord of the Rings Trilogy", "The Harry Potter Series", "The Chronicles of Narnia", "The Hitchhiker's Guide to the Galaxy Series", "The Hunger Games Trilogy"];
        foreach ($collections as $collection) {
            Collection::create([
                'name' => $collection
            ]);
        }
    }
}
