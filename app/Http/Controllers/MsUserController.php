<?php

namespace App\Http\Controllers;

use App\Models\MsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class MsUserController extends Controller
{
    // Untuk register
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'username' => 'required|string|max:50',
                'email' => 'required|string|email|unique:ms_users',
                'password' => 'required|string|min:8|confirmed',
                'phonenumber' => 'required|string|max:20',
                'homeaddress' => 'required|string|max:200',
            ]);
            $validatedData['password'] = Hash::make($validatedData['password']);
            $user = MsUser::create([
                'Name' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'PhoneNumber' => $validatedData['phonenumber'],
                'Address' => $validatedData['homeaddress'],
                'Role' => 'user', // Default role
                'Balance' => 0,
                'LockedBalance' => 0,
            ]);
            return response()->json($user, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'User registration failed', 'details' => $e->getMessage()], 500);
        }
    }

    public function findById($id)
    {
        $user = MsUser::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $remembers = $request->remember;
        Log::info('Remember Me: ', ['remember' => $remembers]);
        if (Auth::attempt($validatedData, $remembers)) {
            return response()->json(['message' => 'Login successful'], 200);
        } else {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('HomePage');
    }

    public function processTopUp(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
        $user = Auth::user();
        $user->Balance += $request->input('amount');
        $user->save();
        return redirect()->route('topup.form')->with('success', 'Top-up successful! Your new balance is Rp.' . $user->Balance);
    }

}
