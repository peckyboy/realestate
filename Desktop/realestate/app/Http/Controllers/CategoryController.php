<?php

namespace App\Http\Controllers;

use App\Category;
use App\Property;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        // $categories = Category::orderBy('created_at','desc')->paginate(10);
        return view('category.home',);
    }
    public function category(){
        $name = request('categoryname');
        $id = request('id');
        // if(is_null($id)) return abort(404);
        $order = request('order');
        $properties = Category::findOrFail($id)->properties()->paginate(5);
        return view('category.category',['properties'=>$properties,'category'=>$name]);
    }
}
