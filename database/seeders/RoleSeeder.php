<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $guard = config('auth.defaults.guard');<

        $receptionnist = Role::create([
            'name' => 'receptionnist',
            'guard_name' => $guard
        ]);
        $receptionnist->givePermissionTo('show books');
        $receptionnist->givePermissionTo('add books');
        $receptionnist->givePermissionTo('edit books');
        $receptionnist->givePermissionTo('delete books');

        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => $guard
        ]);
        $admin->givePermissionTo('show genres');
        $admin->givePermissionTo('add genres');
        $admin->givePermissionTo('edit genres');
        $admin->givePermissionTo('delete genres');

        
        $client = Role::create([
            'name' => 'client',
            'guard_name' => $guard
        ]);
        $client->givePermissionTo('show books');
    }
}
