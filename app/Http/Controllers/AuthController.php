<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create() {
         return view('auth/signin');
    }
    public function registration(Request $request) {
        $request->validate([
            'name' => 'required',
            // 'email' => 'required|email|unique:App\Models\User',
            'password' => 'required|min:6',
        ]);

        return response()->json([
            'name' => request('name'),
            'email' => request('email'),
        ]);
    }
}
