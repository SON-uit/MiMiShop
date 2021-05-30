@extends('layout/base')
@section('mainBody')
<div class="container-fluid" id="space-top">
    <div class="row">
        <div class="col-md-12">
           <a href="http://localhost/webshop/public/collection/may-ps-5"><img src="images/banner.jpg" width="100%"></a>
        </div>
    </div>
    <div>
        <div class="banner-item"><img src="images/slideshow/top_banner_ps.jpg" class="img1"></div>
        <div class="banner-item"><img src="images/slideshow/top_banner_sw.jpg"class="img2"></div>
        <div class="banner-item"><img src="images/slideshow/top_banner_xb.jpg"class="img3"></div>
        {{-- @if(Session::has('user')!=null)
            <p>{{Session::get('user')}} </p>
        @endif --}}
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-4 mb-3 mt-5">
                <h2>SẢN PHẨM NỔI BẬT THÁNG 4</h2>
            </div>
        </div>
        <div class="row">
           @foreach ($data as $item)
               <div class="col-md-2dot4">
                   <div class="card">
                       <div class="col-md-12">
                        <a href=" {{ url('product/'. $item->slug )}}"><img src="images/products/store/{{ $item->image  }}" alt="{{ $item->name }}" width="100%"></a>
                       </div>
                       <div class="card-body">
                           <p class="pro-name">{{ $item->name }}</p>
                           <p class="pro-price">{{ number_format($item->price) }}</p>
                       </div>
                       <button type="submit" class="btn btn-outline-danger"><a onclick="cartdropdown({{ $item->id }})"  href="javascript:">Thêm vào giỏ hàng</a></button>
                   </div>
               </div>   
           @endforeach
        </div>
    </div>
</div>
@endsection

