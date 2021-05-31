@extends('layout/base')
@section("typeProduct")
<section>
    <script  src="{{ URL::asset('js/classify.js') }}"></script>
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
                        <input type="checkbox" class="form-check-input" name="price-classify[]" id="" data-min="0" data-max="500000">
                        Dưới 500,000đ
                      </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="price-classify[]" id="" data-min="500000" data-max="1000000">
                          500,000đ - 1,000,0000đ
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="price-classify[]" id="" data-min="1000000" data-max="2000000">
                          1,000,000đ - 2,000,000đ
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="price-classify[]" id="" data-min="2000000" data-max="5000000">
                          2,000,000đ - 5,000,000đ
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="price-classify[]" id="" data-min="5000000" data-max="1000000000">
                          Trên 5,000,000đ
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-8 " >
                <div class="col-md-12 ">
                    <h2 id="type" value={{( $data[0]->classification )}}>{{ Str::upper( $data[0]->classification )}}<span> PS5</span></h2>
                </div>
                <div class="row pricesort">
                    @foreach ($data as $item)
                        <div class="col-md-3" style="margin:15px 0">
                            <div class="card">
                                <div class="col-md-12">
                                    <a href=" {{ url('product/'. $item->slug )}}"><img src="images/products/store/{{ $item->image  }}" alt="{{ $item->name }}" width="100%"></a>
                                </div>
                                <div class="card-body">
                                    <p class="pro-name">{{ $item->name }}</p>
                                    <p class="pro-price">{{ number_format($item->price)}}đ</p>
                                </div>
                                <button type="submit" class="btn btn-outline-danger"><a onclick="cartdropdown({{ $item->id }})"  href="javascript:">Thêm vào giỏ hàng</a></button>
                            </div>
                        </div> 
                    @endforeach  
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
