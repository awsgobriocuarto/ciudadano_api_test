<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CidiController extends Controller
{
    // Simula (vista) Login plataforma CIDI
    public function loginCidiResponse(Request $request) {

        $cidi ="2F2F6E6A322F7349555279656B38666F50684249417170627634343D"; // simula el token devuelto por el cidi 56 caracteres

        $data = (object)[
            "url" => $request->url,
            "cidi" =>$cidi,
        ];

        return view("login_cidi", compact('data'));

    }
}
