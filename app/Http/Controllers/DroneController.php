<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneRequest;
use App\Http\Requests\DroneUpdateRequest;
use App\Http\Requests\InstractionRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\DroneUpdateResource;
use App\Http\Resources\InstractionResource;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;
use App\Models\Drone;
use App\Models\Instruction;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use App\Models\Location;
use Illuminate\Database\Eloquent\Collection;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $drone = Drone::all();
        $drone = DroneResource::collection($drone);
        return response()->json(['message' => 'Request successful', 'data' => $drone], 200);
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
    public function store(DroneRequest $request)
    {
        //
        if (Auth::User()->Role->name === 'admin') {
            $drone = Drone::create([
                'name' => request('name'),
                'type' => request('type'),
                'battery_life' => request('battery_life'),
                'weight' => request('weight'),
                'payload' => request('payload'),
                'max_speed' => request('max_speed'),
                'max_altitude' => request('max_altitude'),
                'user_id' => request('user_id'),
                'plan_id' => request('plan_id'),
            ]);
        } else {
            return response()->json(['message' => 'No Permission to add Drone'], 403);
        }
        return response()->json(['message' => 'Drone has been added', 'data' => $drone], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {
        //
        $drone = Drone::where("name", "like", "%{$name}%"); //
        $drone = new DroneResource($drone);
        return response()->json(['success' => true, 'data' => $drone], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DroneUpdateRequest $request, string $name)
    {
        //
        if (Auth::User()->Role->name === 'admin') {
            $drone = Drone::where('name', $name)
                ->update([
                    'battery_life' => request('battery_life'),
                    'weight' => request('weight'),
                    'payload' => request('payload'),
                    'max_altitude' => request('max_altitude'),
                ]);
        } else {
            return response()->json(['message' => 'No Permission to update Drone'], 403);
        }
        return response()->json(['message' => 'Drone has been updated', 'data' => new DroneUpdateResource(Drone::find($drone))], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function ShowCurrent(string $name)
    {
        if (Auth::User()->Role->name === 'admin' || Auth::User()->Role->name === 'user') {

            $drone = Drone::where('name', '=', $name)->get()->first()->value('id');
            $location = Location::where('drone_id', '=', $drone)->get()->first();
            $location = new LocationResource($location);
        } else {
            return response()->json(['message' => 'No Permission to show current location of drone'], 403);
        }
        return response()->json(['message' => "Request successful", 'data' => $location], 200);;
    }
}
