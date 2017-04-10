<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartment';

    public function building(){

    	return $this->belongsTo('App\Floor');

    }

    public function images()
    {
        /*
            get all images with there paths of this user
            App\Apartment::find(1)->images()->with(['paths'])->get()

        */
        return $this->morphToMany('App\Images', 'imageable');
    }
}
