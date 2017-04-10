<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Building;
use Illuminate\Support\Facades\Auth;

class BuildingController extends Controller
{
    public function viewBuildings(){
        
        return view('building');
    }

    public function save(Request $request){
        
        $buildingData           = $request->input('building');
        $building               = new Building;
        $building->name         = $buildingData['name'];
        $building->slug         = str_slug($buildingData['name'], '-');
        $building->description  = $buildingData['description'];
        $building->user_id      = Auth::user()->id;
        $building->status       = true;
        $building->save();
        
        return response()->json($building);

    }
}
