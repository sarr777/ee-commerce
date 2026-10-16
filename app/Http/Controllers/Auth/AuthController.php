<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. INSCRIPTION (REGISTER)
    public function register(Request $request): JsonResponse
    {
        // Validation des champs envoyés par le formulaire Angular
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Création de l'utilisateur en base de données
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Chiffrement du mot de passe
        ]);

        // Génération du token Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;

        // On renvoie la réponse au format attendu par le AuthResponse d'Angular
        return response()->json([
            'token' => $token,
            'user' => $user
        ], 201);
    }

    // 2. CONNEXION (LOGIN)
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Tentative de connexion
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Email ou mot de passe incorrect.'
            ], 401); // Erreur 401 interceptée par votre Angular
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ], 200);
    }

    // 3. DÉCONNEXION (LOGOUT)
    public function logout(Request $request): JsonResponse
    {
        // Supprime le jeton actuel dans la base de données Laravel pour révoquer l'accès
        $request->user()->currentAccessToken()->delete();

        return response()->json(null, 204);
    }
}
