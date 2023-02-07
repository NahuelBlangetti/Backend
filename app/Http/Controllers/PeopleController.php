<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PeopleController extends Controller
{
    /**
     * Create a new PeopleController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function PeopleAll()
    {
        $response = Http::get('https://swapi.dev/api/people/');
        $result = json_decode($response);

        return response()->json([
            'peoples' => $result->results,
        ]);
    }

    public function PeopleId(Request $request)
    {

        $response = Http::get('https://swapi.dev/api/people/' . $request->id);
        
        return response()->json([
            'people' => $response->json(),
        ]);
    }
}