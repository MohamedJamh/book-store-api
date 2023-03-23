<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\RoleRequest;
use App\Http\Resources\Role\RoleCollection;
use App\Http\Resources\Role\RoleResource;
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
        $this->middleware(['auth:api','role:admin','verified']);
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
            "message" => "Role has been switched succeffully !"
        ]);
    }
    public function roles(){
        $roles = Role::with('permissions')->get();
        return response()->json([
            "status" => true,
            "result" => new RoleCollection($roles)
        ]);
    }
    public function storeRolePermission(Role $role,RoleRequest $request){
        $role->givePermissionTo($request->all());
        return response()->json([
            "status" => true,
            "message" => "permission has been autorised succeffully",
            "result" => new RoleResource($role)
        ]);
    }
    public function DestroyRolePermission(Role $role,RoleRequest $request){
        $role->revokePermissionTo($request->all());
        return response()->json([
            "status" => true,
            "message" => "permission has been revoked succeffully",
            "result" => new RoleResource($role)
        ]);
    }
}
