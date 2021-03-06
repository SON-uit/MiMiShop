<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-4 offset-md-4">
                @if(Session::has('product_photos'))
                    <div class="alert alert-primary" role="alert">
                        <strong>{{ Session::get('product_photos') }}</strong>
                    </div>
                @endif
                    <form id ="images" method="POST" action="{{ route("product_storePhotos") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <p>Tên sản phẩm <span>{{ $product->name }}</span></p>
                            <p>ID sản phẩm <span id="product_id">{{ $product->id }}</span></p>
                            <h3>Thêm Hình Ảnh Chi Tiết</h3>
                        </div>
                        <input type="number" name="product_id" value={{ $product->id }} hidden>
                        <input type="file" id="files"class ="form-control" name="photos[]" multiple onchange="previewFile(this)">
                        <input type="submit" class="btn btn-primary" value="Upload">  
                        <div id="showImg"></div>  
                    </form>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function previewFile(input){
          var listImg = document.querySelector("#files").files;
          if(listImg){
             for(i =0 ;i < listImg.length ; i++){
               var img = listImg[i];
               if(img){
                 var reader = new FileReader();
                 reader.readAsDataURL(img);
                 reader.onload =function (e) {
                   var imgFile = $("<img>").attr("src",e.target.result);
                   imgFile.css("width" ,"25%");
                   imgFile.appendTo("#showImg");
                 }
               }
             }
          }
         }
         $(document).ready(function () {
            var a= $("#test1").text();
            $("input:text").val(a);
         });
         
    </script>
  </body>
</html>