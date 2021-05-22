<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\type_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function baseView(){
        $typeproduct = type_product::all();
        return view('layout/base',compact('typeproduct'));
    }
    public function mainView(){
        $data = product::all();
       /*  $playStationProduct = DB::table('products')
                                ->join('type_products','products.id_type' ,'=','type_products.id')
                                ->where('type_products.name',"PlayStation5")
                                ->select('products.name')
                                ->get(); */
        $typeproduct = type_product::all();
        return view('layout/main',compact('data','typeproduct'));
    
    }
    
}
