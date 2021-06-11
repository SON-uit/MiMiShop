<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> <!-- link dung ajax trong jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="text-center" style="position: relative;top:300px"><u >THÊM SẢN PHẨM</u></h1>
                </div>
                <div class="col-md-4 mt-5">
                   @if(Session::has('product_add'))
                    <div class="alert alert-success" role="alert">
                      {{ Session::get('product_add') }}
                    </div>  
                  @endif 
                    <b>New Product</b>
                    <form method="POST"  action="{{ route("product_add") }}"  enctype="multipart/form-data" id="productform">
                        @csrf
                        <div class="form-group">
                          <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Tên sản phẩm">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId" placeholder="Mô tả sản phẩm">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="status" id="status" aria-describedby="helpId" placeholder="Tình trạng sản phẩm">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                      </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="price" id="price" aria-describedby="helpId" placeholder="Giá sản phẩm">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                           
                            <input type="text" class="form-control" name="unit" id="unit" aria-describedby="helpId" placeholder="Đơn vị tính">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="link" id="link" aria-describedby="helpId" placeholder="Link youtube của sản phẩm">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                          
                          <input type="text" class="form-control" name="slug" id="slug" aria-describedby="helpId" placeholder="Slug">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>
                        <div class="form-group">
                         <label for="classify">Choose classification</label>
                         <select class="form-control" name="classification" id="classify">
                           <option value="game">Game</option>
                           <option value="máy">Máy</option>
                           <option value ="phụ kiện">Phụ kiện</option>
                         </select>
                        </div>
                        <div class="form-group">
                          <label for="category">Chose Type</label>
                          <select class="form-control" name="type" id="category">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="import">Choose Image</label>
                          <input type="file" class="form-control-file" name="image" id="import"  onchange="previewFile(this)">
                          <img id="previewImg"  width="30%" src="">
                        </div>
                        <button type="submit" class="btn btn-primary">Choose</button>
                    </form>
                </div>
            </div>
        </div>
       </div>
    </section>
    <script>
       function previewFile(input){
         var file=$("input[type=file]").get(0).files[0];
         if(file){
           var reader = new FileReader();
           reader.onload =function(){
             $('#previewImg').attr("src",reader.result);
           }
           reader.readAsDataURL(file);
         }
       }
   
   </script>
  </body>
</html>