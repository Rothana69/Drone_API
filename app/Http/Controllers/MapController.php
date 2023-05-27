<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Resources\FarmResource;
use App\Models\Farm;
use App\Models\Map;
use App\Models\Province;
use Illuminate\Http\Request;


class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maps = Map::all();
        if (count($maps)==0){
            return response()->json(['message' => "request succesfully"], 200);
        }else{
            return response()->json(['message' => "request succesfully" ,'data'=>$maps], 200);
        }
    }

    public function getMapOfFarm($province, $id)
    {
        $image = [];
        $maps = Map::all();
        $bb=null;

        foreach ($maps as $map){
            if ($map->farm_id==$id){
                $farms = Farm::find($id);
                $bb = new FarmResource($farms);
                $ID =   $bb['province_id'];
                $provinceGet = Province::find($ID);
                $name = $provinceGet->name;
                if ($name==$province){
                    array_push($image,$map->image);
                }
            }
        }
        return $image;
    }
    public function deleteMapOfFarm( $province, $id)
    {
        $maps = Map::all();
        $bb=null;
        for ($i = 0; $i < count($maps); $i++) {
            if ($maps[$i]->farm_id==$id){
                $farms = Farm::find($id);
                $bb = new FarmResource($farms);
                $ID =   $bb['province_id'];
                $provinceGet = Province::find($ID);
                $name = $provinceGet->name;
                if ($name==$province){
                    $maps[$i]->delete();
                }
            }
            return $maps;
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
    public function createMapOfFarm(Request $request, $province, $id)
    {
        $maps = Map::all();
        $bb=null;
        for ($i = 0; $i < count($maps); $i++) {
            if ($maps[$i]->farm_id==$id){
                $farms = Farm::find($id);
                $bb = new FarmResource($farms);
                $ID =   $bb['province_id'];
                $provinceGet = Province::find($ID);
                $name = $provinceGet->name;

                if ($name==$province){
                    $validator = validator::make($request->all(),[
                        'drone_id'=>"required",
                        'image'=>"required",
                    ]);                            
                    if ($validator->fails()) {
                        return $validator->errors();
                    }else{
                        $map = Map::create([
                            'drone_id' => request('drone_id'),
                            'farm_id' => $id,
                            'image' => request('image'),
                        ]);
                    }
                    return response()->json(['message' => "Create Successfully", 'data' => $maps], 201);
      
                }
            }
        }
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
