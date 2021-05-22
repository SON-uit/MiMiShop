<?php

namespace App\Http\Controllers;
use App\Models\type_product;
use Illuminate\Http\Request;

class Collection extends Controller
{
    public function slugLink($slug){
        $data = type_product::all()->where('slug', $slug)->first();
        $typeproduct = type_product::all();
        return view('typeproductDetails',compact('data','typeproduct'));
      
    }
}
