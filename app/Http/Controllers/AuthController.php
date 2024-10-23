<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Handle user registration.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        try {
            $user = User::create([
                'name' => $validatedData['name'],
                'lastname' => $validatedData['lastname'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
    
            return response()->json([
                'message' => 'User registered successfully.',
                'user' => $user,
            ], 201);
    
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error registering user.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
/**
 * Handle user login.
 *
 * @param Request $request
 * @return \Illuminate\Http\JsonResponse
 * @throws ValidationException
 */
public function login(Request $request)
{
    $validatedData = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if (!Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
        $user = \App\Models\User::where('email', $validatedData['email'])->first();

        if ($user) {
            return response()->json([
                'error' => 'invalid password.',
            ], 401);
        } else {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    }

    $user = Auth::user();

    return response()->json([
        'message' => 'User logged in successfully.',
        'user' => $user,
    ]);
}

    /**
     * Handle user logout.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();

        return response()->json([
            'message' => 'User logged out successfully.',
        ]);
    }
}


