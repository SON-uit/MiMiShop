<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\type_product;
use App\Models\bill_details;
use Aapp\Models\bill;
use App\Models\bill as ModelsBill;
use App\Models\Usser;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

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
    //bestSeller Product Query
    public function bestsellerProduct1(Request $request){
        $newProduct = product::where('status','new')->limit(3)->get();
        return $newProduct;
    }
    // Query of BarChart Data
    public function barChartData(){
        $data = DB::select('SELECT month(created_at) as month , SUM(total) as revenue  FROM bills GROUP BY month(created_at)');
        return $data;
    }
    public function showBarChart(){
        return view('chart/barChart');
    }
    //Query of PieChart Data
    public function pieChartData(){
        $data = DB::table('type_products')->join('products','type_products.id','products.id_type')
                ->select('type_products.name as product_type',DB::raw('count(products.id)as figure'))
                ->groupBy('id_type','type_products.name')
                ->get();
        return $data;
    }
    public function showPieChart(){
        return view('chart/pieChart');
    }
    
}
