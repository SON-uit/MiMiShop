<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\type_product;
use App\Models\productPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class ProductController extends Controller
{
    public function create(){
        $category =type_product::select('id','name')->get();
        return view('CRUD_product/create',compact('category'));
    }
    public function add(Request $request){
        $type = type_product::where('id',$request->type)->first(); 
        $validation = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
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
        $validation = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
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
        foreach($request->photos as $photo){
            $productPhotos = new productPhotos();
            $photoName =time().'.'. $photo->getClientOriginalExtension();
            $photo->move(public_path('images/products/store'),$photoName);
            $productPhotos->fileName= $photoName;
            $product->photos()->save($productPhotos);
            
        }
        return back()->with('product_photos', count($request->photos).' photos has been edited successfully!');

    }
    //test ajax su dung json
   /*  public function testjson(Request $request){
        $product = new product();
        $product->name = $request->name;
        $product->id_type = 1;
        $product->description =$request->description;
        $product->price = $request->price;
        $product->status =$request->status;
        $product->image ="image";
        $product->unit = $request->unit;
        $product->slug = "slug";
        $product->classification ="game";
        $product->save();
        return response()->json($product);

    } */
    public function autocomplete(Request $request){
        $data =product::select('name')
                        ->where("name","LIKE","%{$request['query']}%")
                        ->get();
        return $data;
    }
    public function slugView($slug){
        $product = product::where('slug', $slug)->first();
        return view('productDetails',compact('product'));
    }
    public function testImg(){
        return view('multipleImg');
    }
}