<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api','role:admin']);
    }
    public function users(){
        $users = User::with('roles')->get();
        return response()->json([
            "status" => true,
            "result" => new UserCollection($users)
        ]);
    }
    public function switchUserRole(User $user){
        if($user->hasRole('receptionnist')){
            $user->removeRole('receptionnist');
        }else{
            $user->assignRole('receptionnist');
        }
        return response()->json([
            "status" => true,
            "result" => "Role has been switched succeffully !"
        ]);
    }
    public function roles(){
        $roles = Role::all();
        return $roles;
    }
}
