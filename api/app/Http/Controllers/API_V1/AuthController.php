<?php

namespace App\Http\Controllers\API_V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Hash;
use Log;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        // api inputs validation
        $validator = \Validator::make($request->all(), 
            [
                'email' => 'required|max:100',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            $error_resp = [
                "status" => "error",
                'message' => 'Please validate the form',
                "error" => $validator->errors()
            ];
            return response()->json($error_resp, 200);
        }


        // checkking user availablility
        $user_info = User::where('email',$request->email);
        Log::debug('An informational message.');

        if($user_info->count())
        {
            Log::debug($user_info->count());
            $user_data = $user_info->first();
            Log::debug($user_data);
            if($user_data->password == enDecryption($request->password))
            {
                $resp = [
                    "status" => "success",
                    'message' => 'User validated',
                    "data" => [
                        "id"=>$user_data->id,
                        "name"=>$user_data->name,
                        "email"=>$user_data->email,
                        "user_type"=>$user_data->user_type
                    ],
                    "token" => createJWTtoken([
                        "id"=>$user_data->id,
                        "name"=>$user_data->name,
                        "email"=>$user_data->email,
                        "user_type"=>$user_data->user_type,
                        "created_on"=>date("Y-m-d"),
                        "expired_on"=>date('Y-m-d', strtotime(date("Y-m-d").' + 10 days'))
                    ])                    
                ];
                return response()->json($resp, 200);
            }
            else
            {
                $resp = [
                    "status" => "error",
                    'message' => 'Password is wrong',
                ];
                return response()->json($resp, 200);
            }            
        }
        else
        {
            $resp = [
                "status" => "error",
                'message' => 'Username and password is wrong',
            ];
            return response()->json($resp, 200);
        }
    }


    public function register(Request $request)
    {
        // api inputs validation
        $validator = \Validator::make($request->all(), 
            [
                'name' => 'required|max:100',
                'email' => 'required|unique:users|max:100',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            $error_resp = [
                "status" => "error",
                'message' => 'Please validate the form',
                "error" => $validator->errors()
            ];
            return response()->json($error_resp, 200);
        }

        $model = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => enDecryption($request->password)
        ]);
        if($model)
        {
            $resp = [
                "status" => "success",
                'message' => 'Account created suiccessfully done',
            ];
            return response()->json($resp, 200);
        }
    }
}
