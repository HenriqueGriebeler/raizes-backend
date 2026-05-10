<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'CLIENTE'
        ]);

        return response()->json([
            'message' => 'Usuário criado com sucesso',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth()->Auth::attempt($credentials)) {
            return response()->json([
                'error' => 'Credenciais inválidas'
            ], 401);
        }

        return response()->json([
            'accessToken' => $token,
            'tokenType' => 'Bearer'
        ]);
    }
}