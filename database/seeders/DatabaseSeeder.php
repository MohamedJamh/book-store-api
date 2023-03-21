<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\GenreSeeder;
use Database\Seeders\AutherSeeder;
use Database\Seeders\CollectionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            GenreSeeder::class,
            CollectionSeeder::class,
            AutherSeeder::class,
            PermissonsSeeder::class,
            RoleSeeder::class
        ]);
        User::factory(3)->create()->each(function($user){
            $user->assignRole('client');
        });


    }
}
