<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    protected $table = 'category_news';

    public function category()
    {
        return $this->belongsToMany('App\Category');
    }

    public function images()
    {
    	/*
			get all images with there paths of this news
			App\News::find(1)->images()->with(['paths'])->get()

    	*/
        return $this->morphToMany('App\Images', 'imageable');
    }
}
