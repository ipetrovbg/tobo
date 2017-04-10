<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'building';

    public function floors(){
    	// App\Building::with('floors.apartments.images.paths')->with('floors.images.paths')->where('id', 1)->get()

    	return $this->hasMany('App\Floor', 'building_id');

    }

    public function images()
    {
        /*
            get all images with there paths of this user
            App\Building::find(1)->images()->with(['paths'])->get()

        */
        return $this->morphToMany('App\Images', 'imageable');
    }

}
