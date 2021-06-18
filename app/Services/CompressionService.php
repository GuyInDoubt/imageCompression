<?php

namespace App\Services;

use Illuminate\Http\Request;
use Image;

class CompressionService {
    public static function Compression(Request $request){
        foreach($request->file("file") as $file){
            $name = $file->getClientOriginalName();
            $path = 'storage/app/public/'. $name .'';
            $size = Image::make($file)->filesize();
            $width =Image::make($file)->width();   
            $height =Image::make($file)->height();

            if($size>1000000){
                $img=Image::make($file);
                $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
                $img->storeAs('Original-'. $name .'', 's3');

                $img=Image::make($file);
                $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
                $img->resize($width/3.86, $height/2.18, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
                $img->storeAs('XXLarge-'. $name .'', 's3');
        
                $img=Image::make($file);
                $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
                $img->resize($width/4.5, $height/2.56, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
                $img->storeAs('XLarge-'. $name .'', 's3');
        
                $img=Image::make($file);
                $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
                $img->resize($width/5.48, $height/3.08, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
                $img->storeAs('Large-'. $name .'', 's3');
        
                $img=Image::make($file);
                $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
                $img->resize($width/6.4, $height/3.6, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
                $img->storeAs('Medium-'. $name .'', 's3');
            }
            else{
                $img=Image::make($file);
                $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
                $img->resize($width/1.93, $height/1.09, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
                $img->storeAs('XXLarge-'. $name .'', 's3');
        
                $img=Image::make($file);
                $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
                $img->resize($width/2.25, $height/1.28, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
                $img->storeAs('XLarge-'. $name .'', 's3');
        
                $img=Image::make($file);
                $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
                $img->resize($width/2.74, $height/1.54, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
                $img->storeAs('Large-'. $name .'', 's3');
        
                $img=Image::make($file);
                $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
                $img->resize($width/3.2, $height/1.8, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
                $img->storeAs('Medium-'. $name .'', 's3');
        
                $img=Image::make($file);
                $img->insert('public/Frame-134.png', 'bottom-right', 10, 10);
                $img->storeAs('Original-'. $name .'', 's3');
            };
        }                                            
    }
}