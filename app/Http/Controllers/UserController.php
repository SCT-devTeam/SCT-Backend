<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login (Request $request) {

        $usr = User::where('email', $request->email)->first();
        if ($usr || Hash::check($request->pwd, $usr->pwd))
        {
            return response()->json($usr->api_token);
        }
    }

    public function signup (Request $request) {

        $usr = User::firstOrCreate([
            'email'=>$request->email,
        ],[
            'gender'=>$request->gender,
            'lastname'=>$request->lastname,
            'firstname'=>$request->firstname,
            'phone'=>$request->number,
            'pwd'=> Hash::make($request->pwd),
            'api_token'=>Str::random(80)
        ]);

        return response()->json($usr->api_token);
    }
}
