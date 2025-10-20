<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    // Register API [name, email, profile_image, password, password_confirmation]
    public function register(Request $request) {
        $data =$request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed",
            "profile_image" => "nullable|image"
        ]);

        // Check Image Available
        if ($request->hasFile("profile_image")) {
            $data["profile_image"] = $request->file("profile_image")->store("users", "public");
        }

        User::create($data);

        return response()->json([
            "status" => true,
            "message" => "User registered successfully"
        ]);
    }

    // Login API [email, password]
    public function login() {

    }

    // Profile API
    public function profile() {

    }

    // Refresh Token API
    public function refreshToken() {

    }

    // Logout API
    public function logout() {

    }
}
