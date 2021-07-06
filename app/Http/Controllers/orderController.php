<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\type_product;
use App\Models\bill_details;
use App\Models\bill;
use App\Models\bill as ModelsBill;
use App\Models\User;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class orderController extends Controller
{
    public function listUser(){
        $query = DB::table('users')->join('bills','users.id','bills.id_user')
                ->select('bills.id','users.name','phonenumber','address','payment','total',DB::raw('DATE(bills.created_at) as date'))
                ->orderBy(('bills.id'),'DESC')
                ->paginate(13);
        return view('order/orderList',compact('query'));
    }
    public function billDetails($id){
        $query = DB::table('bill_details')->join('bills','bill_details.id_bill','bills.id')
                ->join('products','bill_details.id_product','products.id')
                ->where('bills.id',$id)
                ->select('products.*','bill_details.quanty','bill_details.price as totalPrice','bills.id as ID_bill')
                ->orderBy(('bills.id'))
                ->get();
        return view('order/billDetails',compact('query'));
       // return $query;
        
    }

}
