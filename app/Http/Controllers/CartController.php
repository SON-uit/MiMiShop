<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\User;
use App\Models\bill;
use App\Models\customer;
use App\Models\bill_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cart;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\View;
use PhpParser\Node\Stmt\Echo_;

class CartController extends Controller
{
    public function Add_cart(Request $request,$id){
        $product = DB::table('products')->where('id',$id)->first();
        if($product !=null){
            $oldCart = Session('Cart') ? Session('Cart') :null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);
            $request->session()->put('Cart',$newCart);
        }
    return  view('cart');
    }
    public function DeleteItems_Cart(Request $request ,$id){    
        $oldCart = Session('Cart') ? Session('Cart') :null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItem($id);
        if(count ($newCart->products) >0 ) {
            $request->Session()->put('Cart',$newCart);  
        }elseif(count($newCart->products) == 0){
            $request->Session()->put('Cart',$newCart);
        }
        else{
            $request->Session()->forget('Cart');
        }
        return  view('cart');
    }
    public function List_Cart(){
        return view('list-cart');
    }
    public function DeleteListItems_Cart(Request $request ,$id){    
        $oldCart = Session('Cart') ? Session('Cart') :null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItem($id);
        if(count ($newCart->products) >0 ) {
            $request->Session()->put('Cart',$newCart);  
        }elseif(count($newCart->products) == 0){
            $request->Session()->put('Cart',$newCart);
        }
        else{
            $request->Session()->forget('Cart');
        }
        $view = View::make('list-cart');
        $section = $view->renderSections();
        return  $section['ListCart'];
     //  return view('list-cart');
    }
    public function EditListItems_Cart(Request $request , $id ,$quanty){
        $oldCart = Session('Cart') ? Session('Cart') :null;
        $newCart = new Cart($oldCart);
        $newCart->EditItem($id ,$quanty);
        $request->Session()->put('Cart', $newCart);
        $view = View::make('list-cart',compact('newCart'))->renderSections();

        return $view['ListCart']; // chi tra ve section(ListCart) khi ke thua nhieu blade.. (k tra ve <scrip></scrip>)
       
        
      //  return  view('list-cart');
    }
    public function checkout(){
        return View('PayCart');
    }
    public function check_checkout(Request $request){
        $customer = DB::table('users')->select('id')->where('email',$request->email)->get();
        $customer = User::select('id')->where('email',$request->email)->first();
        $newbill = new bill();
        $newbill->phonenumber = $request['phonenumber'];
        $newbill->address = $request['address'];
        $newbill->payment = $request['payment'];
        $newbill->total = $request->session()->get('Cart')->totalPrice;
        $customer->bills()->save($newbill); 
        ////danh sach id san pham trong gio hang
        $list =[];
        $productsInCart = $request->session()->get('Cart')->products;
       foreach($productsInCart as $product=>$val){
            $productID=$val['productinfo']->id;
            $productQuanty = $val['quanty'];
            $productPrice = $val['price'];
            $newbill->products()->attach($productID,[
                'quanty' => $productQuanty,
                'price'  => $productPrice,
                ]);
          $newbill->products()->attach($list,['quanty']);
        }
          return back()->with('bill','Order Successfully!');       
    }
}



