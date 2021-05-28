<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class ApiController extends Controller
{
    public function obtenerGeneros(){
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.deezer.com/genre',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "x-rapidapi-host: deezerdevs-deezer.p.rapidapi.com",
                "xrapidapi-key: SIGN-UP-FOR-KEY"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if($err){
            echo "cURL Error #:" . $err;
        } else {
            $objeto = json_decode($response);
            foreach ($objeto -> data as $genero){
                echo json_encode($genero);
                $ngenero = Genero::where('name','==',$genero->name)->first();
                if(!$ngenero)
                    $ngenero = new Genero();
                
                $ngenero->name = $genero->name;
                $ngenero->type = $genero->type;
                $ngenero->picture = $genero->picture;
                $ngenero->save();
            }
        }
    }

    public function mostrarRegistros(){
        $generos = Genero::all();
        foreach ($generos as $genero){
            $genero->type = "Hola";
            $genero->delete();
        }
    }
}
