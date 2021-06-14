<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\imageDt;      

class imageController extends Controller
{
    public function index(Request $request){
        $file = $request->file("file");
        $name = $file->getClientOriginalName();
        $path = 'storage/app/public/'. $name .'';
        $size = \Image::make($file)->filesize();
        $width =\Image::make($file)->width();   
        $height =\Image::make($file)->height();

        if($size>1000000){
            $img=\Image::make($file);
            $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
            $img->save(storage_path('app/public/Original-'. $name .''));

            $img=\Image::make($file);
            $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
            $img->resize($width/3.86, $height/2.18, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
            $img->save(storage_path('app/public/XXLarge-'. $name .''));
    
            $img=\Image::make($file);
            $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
            $img->resize($width/4.5, $height/2.56, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
            $img->save(storage_path('app/public/XLarge-'. $name .''));
    
            $img=\Image::make($file);
            $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
            $img->resize($width/5.48, $height/3.08, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
            $img->save(storage_path('app/public/Large-'. $name .''));
    
            $img=\Image::make($file);
            $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
            $img->resize($width/6.4, $height/3.6, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
            $img->save(storage_path('app/public/Medium-'. $name .''));
         }
         else{
            $img=\Image::make($file);
            $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
            $img->resize($width/1.93, $height/1.09, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
            $img->save(storage_path('app/public/XXLarge-'. $name .''));
    
            $img=\Image::make($file);
            $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
            $img->resize($width/2.25, $height/1.28, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
            $img->save(storage_path('app/public/XLarge-'. $name .''));
    
            $img=\Image::make($file);
            $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
            $img->resize($width/2.74, $height/1.54, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
            $img->save(storage_path('app/public/Large-'. $name .''));
    
            $img=\Image::make($file);
            $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
            $img->resize($width/3.2, $height/1.8, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
            $img->save(storage_path('app/public/Medium-'. $name .''));
    
            $img=\Image::make($file);
            $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
            $img->save(storage_path('app/public/Original-'. $name .''));
         }
        ;
        
        $imageDt = new imageDt();
        $imageDt->name = $name; 
        $imageDt->path = $path;
        $imageDt->save(); 

        return back();                                                                   
    }

    public function getLastImage(){
        $imageDt = imageDt::latest()->first();
        return response()->json($imageDt);
    }  
}
