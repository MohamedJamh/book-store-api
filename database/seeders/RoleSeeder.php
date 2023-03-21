<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;


use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $receptionnist = Role::create([
            'name' => 'receptionnist',
        ]);
        $receptionnist->syncPermissions('show books');
        $receptionnist->givePermissionTo('add books');
        $receptionnist->givePermissionTo('edit books');
        $receptionnist->givePermissionTo('delete books');

        $admin = Role::create([
            'name' => 'admin',
        ]);
        $admin->givePermissionTo('show genres');
        $admin->givePermissionTo('add genres');
        $admin->givePermissionTo('edit genres');
        $admin->givePermissionTo('delete genres');

        
        $client = Role::create([
            'name' => 'client',
        ]);
        $client->givePermissionTo('show books');
    }
}
