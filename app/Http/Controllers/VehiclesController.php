<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VehiclesController extends Controller
{
    /**
     * Create a new VehiclesController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function VehiclesAll()
    {
        $response = Http::get('https://swapi.dev/api/vehicles/');
        $result = json_decode($response);

        return response()->json([
            'vehicles' => $result->results,
        ]);
    }

    public function VehicleId(Request $request)
    {

        $response = Http::get('https://swapi.dev/api/planets/' . $request->id);

        return response()->json([
            'vehicle' => $response->json(),
        ]);
    }
}
