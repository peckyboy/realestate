<?php

namespace App\Http\Controllers;

use App\Category;
use App\Property;
use App\User;//TODO: maybe remove this
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(){
        return view('home.home',);
    }
    public function pagecontent(){
        $homesettings = DB::table('home_page_settings')->select('home')->where('is_active',1)->first();
        return response()->json($homesettings);
    }


    public function alldata(){
        $data= [
            'cities'=>DB::table('cities')->select(['name','id'])->get(),
            'categories'=>DB::table('categories')->select(['name','id'])->get(),
            'leases'=>DB::table('leases')->select(['name','id'])->get(),
            'types'=>DB::table('types')->select(['name','id'])->get(),
        ];
        return response()->json($data);
    }

    public function propertycategories(){
        $property = Property::findOrFail(request('id'));
        return response()->json([$property->categories]);
    }

    public function categoryproperties(){
        $category_props = Category::findOrFail(request('id'))->properties;
        // if(request('limit'))$category_props = array_rand((array)$category_props,3);
        //TODO: find a way to send only limited amounts
        return response()->json($category_props);
    }
    public function getproperty(){
        $property = Property::findOrFail(request('id'));
        return response()->json($property);
    }

    public function getcounts(){
        $properties = Property::all()->count();
        return response()->json($properties);
    }

}
