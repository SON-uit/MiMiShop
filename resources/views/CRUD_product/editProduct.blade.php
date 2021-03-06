<!doctype html>
<html lang="en">
  <head>
    <title>Edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                  @if(Session::has('product_edit'))
                    <div class="alert alert-success" role="alert">
                      {{ Session::get('product_edit') }}
                    </div>  
                  @endif
                    <form method="POST" action="{{ route("product_edit") }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Tên sản phẩm" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="description" id="" aria-describedby="helpId" placeholder="Mô tả sản phẩm" required>  
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="status" id="" aria-describedby="helpId" placeholder="Tình trạng sản phẩm" required>
                      </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="price" id="" aria-describedby="helpId" placeholder="Giá sản phẩm" required> 
                        </div>
                        <div class="form-group">             
                            <input type="text" class="form-control" name="unit" id="" aria-describedby="helpId" placeholder="Đơn vị tính" required>                     
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control" name="link" id="link" aria-describedby="helpId" placeholder="Link youtube của sản phẩm" required>
                        </div>
                        <div class="form-group">                  
                          <input type="text" class="form-control" name="slug" id="" aria-describedby="helpId" placeholder="Slug" required>
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