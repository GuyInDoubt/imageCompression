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

        $img=\Image::make($file);
        $img->text('Rovae', 120, 100, function($font) {$font->file(public_path('Fonts/CVFont.ttf')); $font->size(90);});
        $img->resize(999, 999, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
        $img->save(storage_path('app/public/XXLarge-'. $name .''));

        $img=\Image::make($file);
        $img->text('Rovae', 120, 100, function($font) {$font->file(public_path('Fonts/CVFont.ttf')); $font->size(90);});
        $img->resize(850, 850, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
        $img->save(storage_path('app/public/XLarge-'. $name .''));

        $img=\Image::make($file);
        $img->text('Rovae', 120, 100, function($font) {$font->file(public_path('Fonts/CVFont.ttf')); $font->size(90);});
        $img->resize(700, 700, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
        $img->save(storage_path('app/public/Large-'. $name .''));

        $img=\Image::make($file);
        $img->text('Rovae', 120, 100, function($font) {$font->file(public_path('Fonts/CVFont.ttf')); $font->size(90);});
        $img->resize(600, 600, function ($constraint) {$constraint->aspectRatio(); $constraint->upsize();});
        $img->save(storage_path('app/public/Medium-'. $name .''));

        $img=\Image::make($file);
        $img->text('Rovae', 120, 100, function($font) {$font->file(public_path('Fonts/CVFont.ttf')); $font->size(90);});
        $img->save(storage_path('app/public/Original-'. $name .''));
        
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
