<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneRequest;
use App\Http\Resources\DroneResource;
use Illuminate\Http\Request;
use App\Models\Drone;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


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
        return response()->json(['success' => true, 'data' => $drone], 200);
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
                'status' => request('status'),
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
            return response()->json(['message' => 'No Permission to create Drones'], 403);
        }
        return response()->json(['success' => true, 'data' => $drone], 201);
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
    public function update(Request $request, string $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
