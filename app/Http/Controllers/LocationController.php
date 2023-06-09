<?php

namespace App\Http\Controllers;

use App\Models\Drone;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
        if (Auth::User()->Role->name === 'admin') {
            $location = Location::create([
                'latitude' => request('latitude'),
                'longitude' => request('longitude'),
                'farm_id' => request('farm_id'),
                'drone_id' => request('drone_id'),
            ]);
        } else {
            return response()->json(['message' => 'No Permission to create location'], 403);
        }
        return response()->json(['message' => 'set location successfully', 'data' => $location], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
