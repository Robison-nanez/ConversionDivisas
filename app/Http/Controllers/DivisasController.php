<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DivisasController extends Controller
{

    // Simbolos
    public function Symbols(){
        $client = new Client();
        $datos = $this->HeaderApi();
        try{
            $response=$client->request('GET',$datos['url'].'symbols',
                array(
                    'headers'=>$datos['Cabezera'],
                )
            );
            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);
        }
        catch(\GuzzleHttp\Exception\BadResponseException $e){
            // Manejar excepciones o errores de API
            print_r($e->getMessage());
        }
    }

    // Conversor

    public function Convert($to = 'USD', $from = 'COP', $amount = 1){
        $client = new Client();
        $datos = $this->HeaderApi();
        try{
            $response=$client->request('GET',$datos['url'].'convert?to='.$to.'&from='.$from.'&amount='.$amount,
                array(
                    'headers'=>$datos['Cabezera'],
                )
            );
            $response = json_decode($response->getBody()->getContents());
            return response()->json($response);
        }
        catch(\GuzzleHttp\Exception\BadResponseException $e){
            // Manejar excepciones o errores de API
            print_r($e->getMessage());
        }
    }


    public function HeaderApi(){

        $header = array(
            "Content-Type"=>"text/plain",
            "apikey"=> env('API_DIVISAS'),
        );

        $url = 'https://api.apilayer.com/exchangerates_data/';

        return ['Cabezera'=>$header, 'url'=>$url];
    }
}
