<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Floor;
use App\Apartment;
use App;


class CoordinateController extends Controller
{
    public function save(Request $request, $container, $id){

        $coords = $request->input('coords');
        switch($container){
            case 'floor':

                $apartment = new Apartment;
                
                $apartment->user_id = Auth::user()->id;
                $apartment->floor_id = $id;
                $apartment->name = '#1';
                $apartment->slug = '1';
                $apartment->description = 'test';
                $apartment->status = true;
                $apartment->details = $coords;
                $apartment->save();

            return response()->json(['apartment' => $apartment]);

            break;
            case 'building':

            break;
            case 'apartment':

            break;

            default: App::abort(500, 'Undefined container!');
        }
    }

    public function getCoords($container, $id){

         switch($container){
            case 'floor':
            
                $floor = Floor::where('id', $id)->with('apartments')->get();

            return response()->json(['floor' => $floor]);

            break;
            case 'building':

            break;
            case 'apartment':

            break;

            default: App::abort(500, 'Undefined container!');
        }
    }
}
