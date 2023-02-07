<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlanetsController extends Controller
{
    /**
     * Create a new PlanetsController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function PlanetsAll()
    {
        $response = Http::get('https://swapi.dev/api/planets/');
        $result = json_decode($response);

        return response()->json([
            'planets' => $result->results,
        ]);
    }

    public function PlanetId(Request $request)
    {

        $response = Http::get('https://swapi.dev/api/planets/' . $request->id);

        return response()->json([
            'planet' => $response->json(),
        ]);
    }
}
