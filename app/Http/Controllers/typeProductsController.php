<?php

namespace App\Http\Controllers;
use Excel;
use App\Models\type_product;
use App\Imports\typeproductImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class typeProductsController extends Controller
{
    public function create(){
        return view('CRUD_type_product/create');
    }
    public function add(request $request){
     /*    $validation =$request->validate([
            'name' =>'required',
            'description' =>'required',
            'original' =>'required',
            'slug' =>'required',
            'image' =>'mimes:jpg,jpeg,png,gif|max:2048'
        ],
        [
            'name.required' =>'Nhap ten' //custom message
        ]); */
        $image= $request->file;
        $imageName =time().'.'.$image->getClientOriginalExtension();//tao file name trong database
        $image->move(public_path('images'),$imageName);//luu image vao trong thu muc public/images/
        $category = new type_product(
            [
                'name'=> $request->name,
                'description' =>$request->description,
                'image'=> $imageName,
                'original' =>$request->original,
                'slug' =>$request->slug
            ]);
        $category->save();   
        return back()->with('typeproduct_store','TypeProduct has been created successfully!');
    }
    public function read(){
        $data =type_product::all();
        return view('CRUD_type_product/read',compact('data'));
     
    }
    public function getbyID($id){
        $data=type_product::where('id',$id)->first();
        return view('CRUD_type_product/readbyID',compact('data'));
   
    }
    public function delete($id){
        type_product::where('id',$id)->delete();
        return back()->with('typeproduct_delete','TypeProduct has been deleted successfully!');
    }
    public function editform($id){
        $data =type_product::where('id',$id)->first();
        return view('CRUD_type_product/edit',compact('data'));
    }
    public function edit(Request $request){
        $image= $request->file;
        $imageName =time().'.'.$image->getClientOriginalExtension();//tao file name trong database
        $image->move(public_path('images/type_products'),$imageName);//luu image vao trong thu muc public/images/type_products
        $category = new type_product(
            [
                'name'=> $request->name,
                'description' =>$request->description,
                'image'=> $imageName,
                'original' =>$request->original,
                'slug' =>$request->slug
            ]);
        $category->save();   
        return redirect('admin/type_product/read')->with('typeproduct_edit','TypeProduct has been changed successfully!');
    }
}
