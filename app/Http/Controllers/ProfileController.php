<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdateUserDetails;
use App\Http\Requests\Profile\UpdateUserPassword;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Resources\User\UserResource;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:api','verified']);
    }
    //
    public function index(){
        //retriving user profile info
        $user = User::find(auth()->user()->id);
        return response()->json(new UserResource($user),200);
    }

    public function updateDetails(UpdateUserDetails $request){
        //update user first name or last name or email
        $user = auth()->user();
        $user->update($request->only('name','email'));
        return response()->json([
            "status" => true,
            "message" => "Profile details has been updated",
            "user" => new UserResource($user)
        ]);
    }
    public function updatePassword(UpdateUserPassword $request){
        if(Hash::check($request->input('current_password'),Auth::user()->password)){
            $hashedPassword = Hash::make($request->input('password'));
            Auth::user()->update([
                'password' => $hashedPassword
            ]);
            return response()->json([
                "status" => true,
                "message" => "Your password has been updated"
            ]);
        }
        return response()->json([
            "status" => false,
            "message" => "Your current password does not match"
        ]);
    }
}
