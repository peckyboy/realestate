<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request){
        $property = Property::where('url_string',$request->url_string)->first();
        if(is_null($property)) return abort(404);
        return view('property.property', ['property'=>$property]);
    }
}
