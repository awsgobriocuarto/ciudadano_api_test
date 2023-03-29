<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function getAllPatentes(Request $request)
    {
        // detener el proceso unos segundos para simular posible retardo de respuesta
        sleep(rand(1,3));

        $path = getcwd()."/json_files/patentes.json";
        $response = file_get_contents($path);

        return response($response, 200);
    }

    public function getCitizenPatentes(Request $request)
    {
        // detener el proceso unos segundos para simular posible retardo de respuesta
        sleep(rand(1,3));

        $path = getcwd()."/json_files/cuit_patentes.json";

        $data = file_get_contents($path);

        foreach (json_decode($data, 1) as $key => $patente) {
            
            if ($key == $request->cuit) {
                return response($patente, 200);
            }
        }
        
        return response(["message" => "No existen registros asociados al cuit"],204); //404 - 204?
        
    }

    public function getBienIdPatentes(Request $request)
    {
        // detener el proceso unos segundos para simular posible retardo de respuesta
        sleep(rand(1,3));

        $path = getcwd()."/json_files/bien_id_patentes.json";

        $data = file_get_contents($path);

        foreach (json_decode($data, 1) as $key => $patente) {
            
            if ($key == $request->bien_id) {
                return response($patente, 200);
            }
        }
        
        return response(["message" => "No se encuentra el registro asociado al ID de bien"],204); //404 - 204?
        
    }
}
