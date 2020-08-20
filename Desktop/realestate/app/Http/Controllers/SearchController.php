<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function index(Property $property){
        $property = $property->newQuery();
        $sortvalue = request('sort_field')??'created_at';
        $orderval = request('order')??'asc';
        $numofresults = request('num_results') ?? 10;
        if (request('title')) $property->where('title', 'like', '%' . request('title') . '%')->orWhere('description', 'like', '%' . request('title') . '%');

        if (request('price')) $property->where('price', '<=', request('price'));

        if (request('toilets')) $property->where('toilets', '<=', request('toilets'));

        if (request('bathrooms')) $property->where('bathrooms', '<=', request('bathrooms'));

        if (request('bedrooms')) $property->where('bedrooms', '<=', request('bedrooms'));

        if (request('parking_space')) $property->where('parking_space', '<=', request('parking_space'));

        if (request('lease_id')) $property->where('lease_id', request('lease_id'));

        if (request('type_id')) $property->where('type_id',  request('type_id'));

        return view('search.home',['properties' => $property->orderBy($sortvalue, $orderval)->paginate($numofresults)]);
        return response()->json(['data' => $property->orderBy($sortvalue, $orderval)->paginate($numofresults)])->header('Content-Type', 'Application/json')->setStatusCode(200);
    }



    // public function search(Request $request)
    // {
    //     $sort = $request->sort_field ?? 'created_at';
    //     if ($sort == 'added') $sort = 'created_at';
    //     $searchstr = $request->searchstr;
    //     $order = $request->order ?? 'asc';
    //     $numresults = $request->num_result ?? 5;
    //     if ($searchstr) $properties = Property::where('title', 'like', '%' . $searchstr . '%')->orderBy($sort, $order)->paginate($numresults);
    //     if (!$searchstr) $properties = Property::orderBy($sort, $order)->paginate($numresults);


    //     return response()->json(['properties' => $properties]);
    // }
}
