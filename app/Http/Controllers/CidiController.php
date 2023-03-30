<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CidiController extends Controller
{
    // Simula (vista) Login plataforma CIDI
    public function loginCidi(Request $request) {

        $data = (object)[
            "url" => $request->url,
        ];

        return view("login_cidi", compact('data'));

    }

    public function setCidiResponse(Request $request)
    {
        $validate_array =  [
            'token' => 'required',
            'url' => 'required',
          
        ];

        $validate_messages = [
            'token.required' => 'El campo Token es obligatorio',
        ];
        
        $validatedData = $request->validate($validate_array, $validate_messages);

        return redirect()->away("$request->url?cidi=$request->token");

    }
}
