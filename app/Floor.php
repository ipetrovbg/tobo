<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $table = 'floor';

    public function building(){

    	return $this->belongsTo('App\Building');

    }

    public function images()
    {
        /*
            get all images with there paths of this user
            App\Floor::find(1)->images()->with(['paths'])->get()

        */
        return $this->morphToMany('App\Images', 'imageable');
    }

    public function apartments(){

    	return $this->hasMany('App\Apartment', 'floor_id');
    	
    }
}
