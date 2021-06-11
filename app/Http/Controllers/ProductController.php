<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\type_product;
use App\Models\productPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\View;
class ProductController extends Controller
{
    public function create(){
        $category =type_product::select('id','name')->get();
        return view('CRUD_product/create',compact('category'));
    }
    public function add(Request $request){
        
        $type = type_product::where('id',$request->type)->first(); 
        $image =$request->file('image');
        $imageName =time().'.'. $image->getClientOriginalExtension();
        $image->move(public_path('images/products/store'),$imageName);
        $product = new product();
        $product->name =$request->name;
        $product->description = $request->description;
        $product->status =$request->status;
        $product-> price =  $request->price;
        $product ->unit =$request->unit;
        $product->classification =$request->classification;
        $product->image = $imageName;
        $product->link = $request->link;
        $product->slug = $request->slug; 
        $type->products()->save($product);
        return back()->with('product_add','TypeProduct has been created successfully!'); 
    }       
    public function read(){
        $data =product::all();
        return view('CRUD_product/readProduct',compact('data'));
    }
    public function editform(){
        $category =type_product::select('id','name')->get();
        return view('CRUD_product/editProduct',compact('category'));
    }
    public function edit(Request $request){
        $type = type_product::where('id',$request->type)->first(); 
        $image =$request->file('image');
        $imageName =time().'.'. $image->getClientOriginalExtension();
        $image->move(public_path('images/products/store'),$imageName);
        $product = new product();
        $product->name =$request->name;
        $product->description = $request->description;
        $product->status =$request->status;
        $product-> price =  $request->price;
        $product ->unit =$request->unit;
        $product->classification =$request->classification;
        $product->image = $imageName;
        $product->slug = $request->slug; 
        $type->products()->save($product);
        return back()->with('product_edit','TypeProduct has been edited successfully!');
    }
    public function delete($id){
        product::where('id' ,$id)->delete();
        return back()->with('product_delete','Product has been deleted successfully!');
    }
    public function addPhotos($id){
        $product = product::select('name','id')->where('id',$id)->first();
        return view('CRUD_product/addPhotos',compact('product'));
    }
    public function storePhotos(Request $request){
      
        $product = product::find($request->product_id);
        $files =$request->file('photos');
         if($request->hasfile('photos')){
            foreach($files as $photo){
                $productPhotos = new productPhotos();
                $photoName =$photo->getClientOriginalName();
                $photo->move(public_path('images/products/store'),$photoName);
                $productPhotos->fileName= $photoName;
                $product->photos()->save($productPhotos);   
            }
        } 
     return back()->with('product_photos', count($request->photos).' photos has been edited successfully!');
    }
    public function autocomplete(Request $request){
        $data =product::select('name','image')
                        ->where("name","LIKE","%{$request['term']}%")
                        ->get();
        return response()
        ->json($data);

    }//productDetails
    public function slugView($slug){
        $product = product::where('slug', $slug)->first();
       $photos = DB::table('products')->join('product_photos','products.id','=','product_photos.id_product')
                        ->where('slug',$slug)
                        ->select('product_photos.fileName')
                        ->get();
            return view('productDetails',compact('product','photos'));
    }
    public function classify(Request $request){
        $temp = $request->categories;
         $type = $request->type;
         if($type=='phụ'){
            $type = 'phụ kiện';
        }  
        $temp = $temp[count($temp)-1];
        $minPrice = (int)$temp['min'];
        $maxPrice = (int)$temp['max'];
        $data = DB::table('products')->join('type_products','products.id_type','=','type_products.id')
                                    ->where([
                                        ['type_products.name',"PlayStation5"],
                                        ['products.classification',$type],
                                        ['price',"<",$maxPrice],
                                        ['price','>',$minPrice]
                                    ])
                                    ->select('products.name','products.image','price','products.slug','products.id','products.classification',)
                                    ->get();
        if(count($data)===0){
            return 1;
        }  
        else{ 
            return $data;
        }
    }
    public function searchProduct(Request $request){
        $name = $request->name;
        $temp1= explode('-',$name); 
        $temp2= implode(' ',$temp1);
        $data = product::where('name',$temp2)->select('slug')->get();
        return $data;
    }
    
}