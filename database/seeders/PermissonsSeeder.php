<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'show books']);
        Permission::create(['name' => 'add books']);
        Permission::create(['name' => 'edit books']);
        Permission::create(['name' => 'delete books']);

        Permission::create(['name' => 'show generes']);
        Permission::create(['name' => 'add generes']);
        Permission::create(['name' => 'edit generes']);
        Permission::create(['name' => 'delete generes']);
        
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'edit users']);
    }
}
