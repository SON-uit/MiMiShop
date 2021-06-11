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
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-4 mb-3 mt-5">
                <h2>SẢN PHẨM NỔI BẬT THÁNG 6</h2>
            </div>
        </div>
        <div class="row">
           @foreach ($instockProduct as $item)
               <div class="col-md-2dot4">
                   <div class="card">
                       <div class="col-md-12">
                        <a href=" {{ url('product/'. $item->slug )}}"><img src="images/products/store/{{ $item->image  }}" alt="{{ $item->name }}" width="100%"></a>
                       </div>
                       <div class="card-body">
                           <p class="pro-name">{{ $item->name }}</p>
                           <p class="pro-price">{{ number_format($item->price) }}đ</p>
                       </div>
                       <button type="submit" class="btn btn-outline-danger"><a onclick="cartdropdown({{ $item->id }})"  href="javascript:">Thêm vào giỏ hàng</a></button>
                   </div>
               </div>   
           @endforeach
        </div>
    <div class="row">
        <div class="col-md-4 offset-4 mb-5">
            <h2>TOP SẢN PHẨM BÁN CHẠY</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2 mb-5">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <a href="{{ url('product/'. $bestsellerProduct[0]->slug )}}"><img class="d-block " src="images/products/store/{{ $bestsellerProduct[0]->image  }}" alt="{{ $bestsellerProduct[0]->name }}"width="100%" height="600px"></a>
                  </div>
                  <div class="carousel-item">
                    <a href="{{ url('product/'. $bestsellerProduct[1]->slug )}}"><img class="d-block " src="images/products/store/{{ $bestsellerProduct[1]->image  }}" alt="{{ $bestsellerProduct[1]->name }}"width="100%" height="600px"></a>
                  </div>
                  <div class="carousel-item">
                    <a href="{{ url('product/'. $bestsellerProduct[2]->slug )}}"><img class="d-block " src="images/products/store/{{ $bestsellerProduct[2]->image  }}" alt="{{ $bestsellerProduct[2]->name }}"width="100%" height="600px"></a>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-4 mb-3 mt-5">
            <h2>HÀNG MỚI VỀ HÔM NAY</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($newProduct as $item)
            <div class="col-md-2dot4">
                <div class="card">
                    <div class="col-md-12">
                     <a href=" {{ url('product/'. $item->slug )}}"><img src="images/products/store/{{ $item->image  }}" alt="{{ $item->name }}" width="100%"></a>
                    </div>
                    <div class="card-body">
                        <p class="pro-name">{{ $item->name }}</p>
                        <p class="pro-price">{{ number_format($item->price) }}đ</p>
                    </div>
                    <button type="submit" class="btn btn-outline-danger"><a onclick="cartdropdown({{ $item->id }})"  href="javascript:">Thêm vào giỏ hàng</a></button>
                </div>
            </div>   
        @endforeach
    </div>
</div>
@endsection

