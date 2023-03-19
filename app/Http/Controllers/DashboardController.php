<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserCollection;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = User::all();
        return response()->json([
            "status" => true,
            "result" => new UserCollection($user)
        ]);
    }
    public function switchUserRole(User $user){
        // $receptionnistRoleId = Role::where('name','Admin')->value('id');
        // switch ($action) {
        //     case 'Attach':
        //         $user->roles()->attach([$adminRoleId]);
        //         break;
        //     default:
        //         $user->roles()->detach([$adminRoleId]);
        //         break;
        // }
        // return redirect()->route('dashboard');
    }
}
