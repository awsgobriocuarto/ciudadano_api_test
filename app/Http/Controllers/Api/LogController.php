<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Response;

class LogController extends Controller
{
    public function login(Request $request)
    {
        
        # Validar tipo de datos ingresados 
        $validate_rules = [
            'email' => 'required|email',
            'password' => 'required',
            'token_name' => 'required',
        ];

        $validate_messages = [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no tiene un formato válido',
            'password.required' => 'El password es obligatorio',
            'token_name.required' => 'El nombre del token es obligatorio'
        ];
        
        $validator = Validator::make($request->all(), $validate_rules, $validate_messages);


        if ($validator->fails()) {  

            $errors = $validator->errors()->getMessages();

            return response()->json(['errors'=> $errors], Response::HTTP_BAD_REQUEST);

        }
        
        if(Auth::attempt($request->only(['email', 'password'])))
        {            
            auth()->user()->tokens()->delete();

            return response()->json([
                'token' => $request->user()->createToken($request->token_name)->plainTextToken,
                'message' => "Success"
            ]);
        }

        return response()->json([
            'message' => "Unauthorized"
        ], 401);
    }


    public function logout(Request $request)
    {

        if(auth()->user()->tokens()->delete())
        {
            return response()->json([
                'message' => "Logged Out OK"
            ]);

        }

        return response()->json([
            'message' => "Logged Out Fail"
        ], 500);
    }
}
