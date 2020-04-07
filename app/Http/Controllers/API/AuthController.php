<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        // 2
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        /** @var User $user */
        $user = User::firstOrCreate([
            'email'=>$request->email,
        ],[
            'gender'=>$request->gender,
            'lastname'=>$request->lastname,
            'firstname'=>$request->firstname,
            'phone'=>$request->number,
            'pwd'=> Hash::make($request->pwd),
        ]);
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
//        dd($user);
        if (!$user || !Hash::check($request->password, $user->pwd)) {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 422);
        }


        // 3
        return response()->json(['token' => $user->createToken($request->device_name)->plainTextToken]);
        // 4
    }

    public function logout(Request $request)
    {
        $user = $request->user();
//        dd($user);
        $actualToken = $user->currentAccessToken()->id;
        $user->tokens()->where('id', $actualToken)->delete();
        return response()->json(['suppression'=>$actualToken]);
    }

}
