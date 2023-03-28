<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CidiController extends Controller
{
    // Simula (vista) Login plataforma CIDI
    public function loginCidiResponse(Request $request) {

        $cidi ="12345678910111213141516"; // simula el token devuelto por el cidi

        $data = (object)[
            "url" => $request->url,
            "cidi" =>$cidi,
        ];

        return view("login_cidi", compact('data'));

    }
}
