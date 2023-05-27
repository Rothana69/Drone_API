<?php

namespace App\Http\Controllers;

use App\Http\Resources\FarmResource;
use App\Http\Resources\MapResource;
use App\Models\Farm;
use App\Models\Map;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                // return $name.$province;
                if ($name==$province){
                    $maps[$i]->delete();
                    // DB::table('users')->where('id', $i+1)->delete();
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
    public function store(Request $request)
    {
        //
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
