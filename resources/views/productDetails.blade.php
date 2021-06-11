@extends('layout/base')
@section('product')
    <link rel ="stylesheet"  href="{{ URL::asset('css/detailsProduct.css') }}">
    <script src="{{ URL::asset('js/detailsProduct.js') }}"></script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1 mt-5">
                <img class="subphoto"src ="images/products/store/{{ $product->image }}" width="100%">
                @foreach($photos as $items)
                <img class="subphoto"src ="images/products/store/{{ $items->fileName}}" width="100%">
                @endforeach
            </div>
            <div class="col-md-4 mt-3" style="height: 530px" >
                <img id="mainphoto"src ="images/products/store/{{ $product->image }}" width="100%">
            </div>
            <div class="col-md-7 mt-3">
                <h2><b>{{ $product->name }}</b></h2>
                <hr width="800px">
                <h3 style="color:red">{{ number_format($product->price) }}đ</h3>
                <hr width="800px">
                <button type="button" class="btn btn-outline-danger"><a onclick="cartdropdown({{$product->id }})"  href="javascript:">Thêm vào giỏ hàng</a></button>
                <h4 class="mt-3 mb-3">Mô tả sản phẩm </h4>
                <h5>{{ $product->description }}</h5>
                @if(($product->link)!=null)
                <iframe width="900" height="506" src="https://www.youtube.com/embed/{{ $product->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
                
            
            </div>
            </div>
        </div>
    </div>
@endsection
 