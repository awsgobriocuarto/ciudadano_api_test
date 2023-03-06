<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
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


    // Simula respuesta pedido de datos DE USUARIO al CIDI
    public function getCitizenData() {

        // Detener el proceso unos segundos para simular posible retardo de respuesta
        sleep(rand(1,5));

        $path = getcwd()."/json_files/citizen_cidi.json";
        $response = file_get_contents($path);

        return response($response, 200);

    }
}
