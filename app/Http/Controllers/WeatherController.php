<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    //
    public function index(Request $request) {

        $weatherResponse = [];
        if($request->isMethod("post")){
            $cityName = $request->city;

           $response =  Http::withHeaders([
                "x-rapidapi-host" => "open-weather13.p.rapidapi.com",
                "x-rapidapi-key" => "25379cf9c9msh06ad3086755ad1ap10f448jsn1066ec1756bf"
            ])->get("https://open-weather13.p.rapidapi.com/city/{$cityName}/EN");

            $weatherResponse = $response->json();
        }
        return view("weather", [
            "data" => $weatherResponse
        ]);
    }
}
