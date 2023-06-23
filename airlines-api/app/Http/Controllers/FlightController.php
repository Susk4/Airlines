<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlightRequest;
use App\Http\Requests\UpdateFlightRequest;
use App\Models\Flight;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flights = Flight::all();
        return response()->json($flights);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFlightRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($flightId)
    {
        $flight = Flight::find($flightId);
        $tickets = $flight->tickets;
        $economy = $tickets->where('type','economy')->count();
        $business = $tickets->where('type','business')->count();
        $first_class = $tickets->where('type','first_class')->count();

        $aircraft = Flight::find($flightId)->aircraft;

        $data = [
            'data' => [
                'flight' => $flight,
                'economy' => $aircraft->economy - $economy,
                'business' => $aircraft->business - $business,
                'first_class' => $aircraft->first_class - $first_class
            ]
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFlightRequest $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        //
    }
}
