<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

        $validation =  Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if ($validation->fails()) {
            return $this->sendError('validation Error', $validation->errors());
        }

        $user = new User;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Successfully Resister',
            'data' => $user
        ], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation fails',
                'error' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $token = $user->createToken('auth-token')->plainTextToken;
                return response()->json([
                    'message' => 'Login Successfully',
                    'token'=> $token,
                    'data' => $user
                ],200);
            }

            else{
                return response()->json([
                    'errors' => $validator->errors()
                ],400);
            }
        }

        else{
            return response()->json([
                'errors' => $validator->errors()
            ],400);
        }
    }
}
