@extends('layout/base')
@section('product')
    <link rel ="stylesheet"  href="{{ URL::asset('css/detailsProduct.css') }}">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <img src ="images/products/store/{{ $product->image }}" width="100%">
            </div>
            <div class="col-md-7">
                <h2><b>{{ $product->name }}</b></h2>
                <h3>{{ number_format($product->price) }}đ</h3>
                <button type="button" class="qtyminus btn btn-danger" >-</button>
                    <input type='text'name='quanty' id=""value='4'/>
                <button type="button" class="qtyplus btn btn-success" >+</button> 
                <br><br>
                <button type="button" class="btn btn-outline-danger"><a onclick="cartdropdown({{$product->id }})"  href="javascript:">Thêm vào giỏ hàng</a></button>
            </div>
            </div>
        </div>
    </div>
@endsection
 