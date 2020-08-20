<?php

namespace App\Http\Controllers;

use App\Lease;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    public function index(){
        return view('lease.home',);
    }
    public function lease(){
        $name = request('leasename');
        $name = str_replace("_", " ", $name);
        $order = request('order');
        $properties = Lease::where('name',$name)->first()->properties()->paginate(5);
        
        return view('lease.lease',['properties'=>$properties,'name'=>$name]);
    }
}
