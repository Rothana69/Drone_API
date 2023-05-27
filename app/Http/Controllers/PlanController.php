<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::User()->Role->name === 'admin') {
            $plans = Plan::all();
            if (count($plans) == 0) {
                return response()->json(['message' => 'request successful'], 200);
            } else {
                return response()->json(['message' => 'request successful', 'data' => $plans], 200);
            }
        } else {
            return response()->json(['message' => 'No Permission to create ma'], 403);
        }
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
        if (Auth::User()->Role->name === 'admin') {
            $plan = Plan::create([
                'name' => request('name'),
                'date_time' => request('date_time'),
                'area' => request('area'),
                'altitude' => request('altitude'),
                'user_id' => request('user_id'),
            ]);
        } else {
            return response()->json(['message' => 'No Permission to create ma'], 403);
        }
        return response()->json(['message' => "Plan has been created", 'data' => $plan], 201);
    }

    public function getPlaneByname($name){
        $plans = Plan::all();
        foreach ($plans as $plan){
            if ($plan->name ==$name){
                return (new PlanResource($plan));
            }
        }
        return "not found this plane name";
        
        // return response()->json(['message' => "Create Successfully", 'data' => $plans], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
