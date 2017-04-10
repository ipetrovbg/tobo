<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Images;
use App\Paths;
use App\User;
use Illuminate\Support\Facades\Auth;

class ImagesController extends Controller
{
    public function index(Request $request)
    {
		
		$datePath = $this->determineDatePath();
		$file = $request->file('file');

		if ($request->hasFile('file') && $request->file('file')->isValid()){
			
			$uploadedFile = Storage::disk('uploads')->put($datePath, $file);

			$realPath = $this->realPath($uploadedFile);

			$image = new Images;
			$paths = new Paths;

			$image->title = 'test';
			$image->description = 'test description ' .  $realPath->basename;
			$image->user_id = Auth::user()->id;
			$image->save();

			$paths->image_path = $realPath->fullPath;
			$paths->size_key = 'origin';
			$image->paths()->save($paths);


		}else{
			return response()->json("No file");
		}


		return response()->json( $realPath->fullPath );
    }

    public function getAllImages(Request $request)
    {
    	$images = Images::where('id', '>', 0)->with('paths')->get();
    	return response()->json($images);
    }

    public function images(){
        return view('images');
    }

    public function determineDatePath(){
    	$dt 	= Carbon::now();    	
    	return $dt->year . '/' . $dt->month . '/' . $dt->day;
    }

    public function realPath($file){
    	$info 					= pathinfo( url('/uploads') . '/' . $file );
    	$app 					= app();
    	$realPath 				= $app->make('stdClass');
    	$realPath->fullPath 	= $info['dirname'] . '/' .$info['basename'];
    	$realPath->dirname 		= $info['dirname'];
    	$realPath->basename 	= $info['basename'];

		return $realPath;
    }
}