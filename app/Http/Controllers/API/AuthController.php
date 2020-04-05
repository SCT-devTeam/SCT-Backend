<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        // 2
        $input = $request->all();
        $input['password'] = bcrypt($input['password']); //hash et non bcrypt
        /** @var User $user */
        $user = User::firstOrCreate($input); // a réécrtire
        // 3
        $token = $user->createToken($input->device_name)->plainTextToken;
        // 4
        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ]);
        // 1
/** @var User $user */
        $user = User::where('email', $request->email)->first();
        // 2

        if (!$user || !Hash::check($request->password, $user->pwd)) {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 422);
        }

        // 3

        return response()->json(['token' => $user->createToken($request->device_name)->plainTextToken]);
        // 4
    }

}
