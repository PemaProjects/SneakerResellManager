<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){   
        $path = '';
    
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('avatars'), $filename);
            $path = '/public/avatars/' . $filename;
            $request->merge(['avatar' => $filename]);
        }
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'avatar' => $path
        ]);
        
        $token = $user->createToken('snkrs')->plainTextToken;
    
        return response()->json(['message' => 'Usuario creado', 'user' => $user, 'token' => $token], 201);
    }
    
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $token = $user->createToken('snkrs')->plainTextToken;

        return response()->json(['message' => 'Usuario autenticado', 'user' => $user, 'token' => $token], 200);
    }


    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
    }

    public function edit(Request $request){
        $request->user()->update($request->all());
    }

    public function getUserbyToken(Request $request){
        return $request->user();
    }


}
