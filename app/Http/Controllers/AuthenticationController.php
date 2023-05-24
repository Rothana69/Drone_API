<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller

{

    public function register(AuthenticationRequest $request){
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'role_id' => request('role_id'),
            'password' => Hash::make($request->password)
        ]);
        $ID =  $user->role_id;
        $value = Roles::find($ID);

        $token = null;

        if ($value['name'] === 'admin') {
            $token = $user->createToken('ADMIN-TOKEN', ['select', 'create', 'update', 'delete']);
        } 
        else {
            $token = $user->createToken("USER-TOKEN", ['select']);
        }


        return response()->json(['success' =>'successfully', 'data' => $user,'token' => $token],201);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // dd($user->createToken('API Token')->plainTextToken);
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);

    }
    
}
