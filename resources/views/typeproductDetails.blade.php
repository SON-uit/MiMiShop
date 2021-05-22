@extends('layout/base')
@section("typeProduct")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <img src="images/{{ $img }}" width="100%">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 ml-5" >
                <div id="classify">
                    <h3>Giá sản phẩm</h3>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="price-classify" id="helo" value="499999" >
                        Dưới 500,000đ
                      </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="price-classify" id="" value="999999" >
                          500,000đ - 1,000,0000đ
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="price-classify" id="" value="1499999" >
                          1,000,000đ - 1,500,000đ
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="price-classify" id="" value="4999999" >
                          2,000,000đ - 5,000,000đ
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="price-classify" id="" value="5000000" >
                          Trên 5,000,000đ
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-8 " >
                <div class="col-md-12 mb-5">
                    <h2>{{ Str::upper( $data[0]->classification )}} PS5</h2>
                </div>
                <div class="row">
                    @foreach ($data as $item)
                        <div class="col-md-3">
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
    </div>
    <script>
        $(document).ready(function () {
            $("input[type=checkbox]").click(function(){
                console.log($(this).val());
            });
        });
    </script>
@endsection