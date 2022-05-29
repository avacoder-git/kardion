<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\LoginRequest;
use App\Http\Requests\Api\V1\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{





    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $data['name'] = $data['first_name']." ". $data['last_name'];

        unset($data['first_name']);
        unset($data['last_name']);

        $data['password'] = Hash::make($data['password']);


        $user     = User::create($data);


        $token = $user->createToken('myapptoken')->plainTextToken;

        $response= [
            'success' => true,
            'user' => $user,
            'token'=> $token,
        ];
        return response()->json($response, 201);


    }


    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (!auth()->attempt($data)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid phone number or password'
            ]);
        }

        $user = User::query()->where('phone_number', $data['phone_number'])->first();

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response= [
            'success' => true,
            'user' => $user,
            'token'=> $token,
        ];
        return response()->json($response, 201);

    }


}
