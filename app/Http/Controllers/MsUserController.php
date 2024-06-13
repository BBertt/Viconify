<?php

namespace App\Http\Controllers;

use App\Models\MsPost;
use App\Models\MsProduct;
use App\Models\MsUser;
use App\Models\MsVideo;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MsUserController extends Controller
{
    // Profile Page -> Add Item/Video/Post/Short/CRUD
    public function show()
    {
        $user = Auth::user();
        $videos = $user->videos;
        $products = $user->products;
        $posts = MsPost::with('pictures')->where('UserID', $user->UserID)->get();
        $transactionHeader = TransactionHeader::with('transactionDetails')->get();
        return view('profile', compact('user', 'videos', 'products', 'posts', 'transactionHeader'));
    }

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

    public function updateBalance(int $total) {
        $user = MsUser::where('UserID', auth()->id())->first();
        $user->Balance -= $total;
        $user->save();
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

    public function update(Request $request)
    {
        $user = Auth::user();
        if ($user->Role == 'user') {
            $request->validate([
                'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'address' => 'required',
            ]);

            $user->Name = $request->name;
            $user->email = $request->email;
            $user->Address = $request->address;
            $user->PhoneNumber = $request->phone_number;

            $path = null;
            if ($request->hasFile('profile_image')) {
                $uploadedFile = $request->file('profile_image');
                if ($uploadedFile && $uploadedFile->isValid()) {
                    $path = $uploadedFile->store('users', 'public');
                }
            }

            $user->ProfileImage = $path ? 'storage/' . $path : $user->ProfileImage;

            $user->save();
        }
        else{
            $this->updateSeller($request);
        }

        return redirect()->route('profile.update')->with('success', 'Profile updated successfully');
    }

    public function updateSeller(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',

            'StoreName' => 'required',
            'StoreDescription' => 'required',
            'StoreStartTime' => 'required',
            'StoreEndTime' => 'required',
        ]);

        $user->Name = $request->name;
        $user->email = $request->email;
        $user->Address = $request->address;
        $user->PhoneNumber = $request->phone_number;

        auth()->user()->StoreDescription = $request->StoreDescription;
        auth()->user()->StoreName = $request->StoreName;
        auth()->user()->StoreStartTime = $request->StoreStartTime;
        auth()->user()->StoreEndTime = $request->StoreEndTime;

        $path = null;
        if ($request->hasFile('profile_image')) {
            $uploadedFile = $request->file('profile_image');
            if ($uploadedFile && $uploadedFile->isValid()) {
                $path = $uploadedFile->store('users', 'public');
            }
        }

        $user->ProfileImage = $path ? 'storage/' . $path : $user->ProfileImage;

        $user->save();
    }

    public function registerShop(Request $request) {
        // dd($request);
        $request->validate([
            'StoreName' => 'required',
            'StoreDescription' => 'required',
            'StoreStartTime' => 'required',
            'StoreEndTime' => 'required',
        ]);

        auth()->user()->StoreDescription = $request->StoreDescription;
        auth()->user()->StoreName = $request->StoreName;
        auth()->user()->StoreStartTime = $request->StoreStartTime;
        auth()->user()->StoreEndTime = $request->StoreEndTime;
        auth()->user()->Role = 'seller';

        auth()->user()->save();


        return redirect()->route('HomePage');
    }

    public function showUser(MsUser $user) {
        $videos = MsVideo::with('user')->where('UserID', $user->UserID)->get();
        $products = MsProduct::with('pictures')->where('UserID', $user->UserID)->get();
        return view('userPage', compact('user', 'videos', 'products'));
    }
}
