<?php

namespace App\Http\Controllers\APi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CidiController extends Controller
{


    // Simula respuesta pedido de datos DE USUARIO al CIDI
    public function getCitizenData() {

        // Detener el proceso unos segundos para simular posible retardo de respuesta
        sleep(rand(1,3));

        $path = getcwd()."/json_files/citizen_cidi.json";
        $response = file_get_contents($path);

        return response($response, 200);

    }
}
