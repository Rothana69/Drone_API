<?php

namespace App\Http\Controllers;

use App\Http\Resources\InstractionResource;
use App\Models\Instruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::User()->Role->name === 'admin') {
            $instrac = Instruction::all();
        } else {
            return response()->json(['message' => 'No Permission to get plan'], 403);
        }
        return response()->json(['message' => 'Request successful', 'data' => $instrac], 201);
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
            $instrac = Instruction::create([
                'status' => request('status'),
                'drone_id' => request('drone_id'),
                'plan_id' => request('plan_id')
            ]);
        } else {
            return response()->json(['message' => 'No Permission to create instraction'], 403);
        }
        return response()->json(['message' => 'Instraction has been created', 'data' => $instrac], 201);
    }



    public function runModeDrones(Request $request, string $id)
    {
        if (Auth::User()->Role->name === 'admin') {
            $drone = Instruction::find($id);
            if ($drone == null) {
                return response()->json(['message' => 'request not found'], 404);
            }
            $drone->update([
                'status' => request('status'),
            ]);
        } else {
            return response()->json(['message' => 'No Permission to update status Drones'], 403);
        }
        // return "fghj";
        return response()->json(['message' => 'Status has been updated', 'data' => new InstractionResource($drone)], 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(Instruction $instruction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instruction $instruction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instruction $instruction)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instruction $instruction)
    {
        //
    }
}
