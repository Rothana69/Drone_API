<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\FarmResource;
use App\Models\Farm;
use App\Models\Map;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maps = Map::all();
        if (count($maps) == 0) {
            return response()->json(['message' => "request succesfully"], 200);
        } else {
            return response()->json(['message' => "request succesfully", 'data' => $maps], 200);
        }
    }

    public function getMapOfFarm($province, $id)
    {
        $image = [];
        $maps = Map::all();
        $bb = null;

        foreach ($maps as $map) {
            if ($map->farm_id == $id) {
                $farms = Farm::find($id);
                $bb = new FarmResource($farms);
                $ID =   $bb['province_id'];
                $provinceGet = Province::find($ID);
                $name = $provinceGet->name;
                if ($name == $province) {
                    array_push($image, $map->image);
                }
            }
        }

        if ($image == null) {
            return response()->json(['message' => "Image not found"], 404);
        }
        return response()->json(['message' => "Request image successful", 'data ' => $image], 201);
    }
    public function deleteMapOfFarm($province, $id)
    {
        if (Auth::User()->Role->name === 'admin') {
            $maps = Map::all();
            $bb = null;
            for ($i = 0; $i < count($maps); $i++) {
                if ($maps[$i]->farm_id == $id) {
                    $farms = Farm::find($id);
                    $bb = new FarmResource($farms);
                    $ID =   $bb['province_id'];
                    $provinceGet = Province::find($ID);
                    $name = $provinceGet->name;
                    // return $name.$province;
                    if ($name == $province) {
                        $maps[$i]->delete();
                    }
                }
            };
        } else {
            return response()->json(['message' => 'No Permission to delete image'], 202);
        }
        return response()->json(['message' => 'Delete successful'], 201);
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
    public function createMapOfFarm(Request $request, $province, $id)
    {
        if (Auth::User()->Role->name === 'admin') {
            $maps = Map::all();
            $bb = null;
            for ($i = 0; $i < count($maps); $i++) {
                if ($maps[$i]->farm_id == $id) {
                    $farms = Farm::find($id);
                    $bb = new FarmResource($farms);
                    $ID =   $bb['province_id'];
                    $provinceGet = Province::find($ID);
                    $name = $provinceGet->name;

                    if ($name == $province) {
                        $validator = validator::make($request->all(), [
                            'drone_id' => "required",
                            'image' => "required",
                        ]);
                        if ($validator->fails()) {
                            return $validator->errors();
                        } else {
                            $map = Map::create([
                                'drone_id' => request('drone_id'),
                                'farm_id' => $id,
                                'image' => request('image'),
                            ]);
                        }
                        return response()->json(['message' => "Map has been created", 'data' => $maps], 201);
                    }
                }
            }
        } else {
            return response()->json(['message' => 'No Permission to create map'], 403);
        }
        return response()->json(['message' => 'Farm not found'], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(Map $map)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Map $map)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Map $map)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $map)
    {
        //
    }
}
