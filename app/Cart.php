<?php
namespace App;
class Cart{
    public $products = [];
    public $totalPrice = 0;
    public $totalQuanty = 0;
    public function __construct($cart){
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }
    public function AddCart($product,$id){
        $newProduct = ['quanty' => 0 ,'price' => $product->price, 'productinfo' =>$product];
        if($this->products){
            if(array_key_exists($id, $this->products)){
                $newProduct  = $this->products[$id];
            }
        }   
        $newProduct['quanty']++;
        $newProduct['price'] =$newProduct['quanty'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->price;
        $this->totalQuanty++;
    }
    public function DeleteItem($id){
        if($this->products){
            if(array_key_exists($id,$this->products)){
                $this->totalQuanty -= $this->products[$id]['quanty'];
                $this->totalPrice  -= $this->products[$id]['price'];
                unset($this->products[$id]);
            }
        }
    }
    public function EditItem($id ,$quanty){
        if($this->products){
            if(array_key_exists($id,$this->products)){ 
                $this->totalQuanty -= $this->products[$id]['quanty'];
                $this->totalPrice  -= $this->products[$id]['price'];
                
                $this->products[$id]['quanty'] = $quanty;
                $this->products[$id]['price'] = $quanty * $this->products[$id]['productinfo']->price;

                $this->totalQuanty += $this->products[$id]['quanty'];
                $this->totalPrice  += $this->products[$id]['price'];
            }
        }
    }
}
?>
