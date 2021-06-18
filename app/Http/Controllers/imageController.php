<?php

namespace App\Http\Controllers;

use App\Services\CompressionService;
use Illuminate\Http\Request;

class imageController extends Controller
{
    public function create(){
        return view('imageUpload');
    }

    public function index(Request $request){
       CompressionService::Compression($request);               
    }

    public function getLastImage(){
        $imageDt = imageDt::latest()->first();
        return response()->json($imageDt);
    }  
}
