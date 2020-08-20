<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index(){
        return view('type.home',);
    }
    public function type(){
        $name = request('typename');
        $name = str_replace("_", " ", $name);
        $order = request('order');
        $type = Type::where('name',$name)->first();
        if(is_null($type)) return abort(404);
        $properties = $type->properties()->paginate(5);
        
        return view('type.type',['properties'=>$properties,'name'=>$name]);
    }
}
