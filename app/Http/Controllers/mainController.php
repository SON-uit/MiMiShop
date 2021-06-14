<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\type_product;
use App\Models\bill_details;
use App\Models\Usser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function baseView(){
        $typeproduct = type_product::all();
        return view('layout/base',compact('typeproduct'));
    }
    public function mainView(){
        $instockProduct = product::where('status','còn hàng')->limit(15)->get();
        $newProduct = product::where('status','new')->limit(10)->get();
        $typeproduct = type_product::all();
        $bestsellerProduct=$this->bestsellerProduct();
        return view('layout/main',compact('instockProduct','typeproduct','newProduct','bestsellerProduct'));
    }
    public function bestsellerProduct(){
        
        $bestseller= DB::table('products')->join('bill_details','bill_details.id_product','=','products.id')
                                        ->selectRaw('products.image,products.slug,products.name,sum(bill_details.quanty) as amount')
                                        ->groupBy('bill_details.id_product','products.image','products.slug','products.name')
                                        ->orderByDesc('amount')
                                        ->limit(3)
                                         ->get();
        return $bestseller;
        
    }
    public function bestsellerProduct1(Request $request){
        $newProduct = product::where('status','new')->limit(3)->get();
        return $newProduct;
    }
}
