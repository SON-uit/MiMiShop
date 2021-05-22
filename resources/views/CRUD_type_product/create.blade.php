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
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                  @if(Session::has('typeproduct_store'))
                      <div class="alert alert-success" role="alert">
                          {{ Session::get('typeproduct_store') }}
                      </div>
                  @endif
                    <form action="{{ route("typeproduct_add") }}"method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Help text</small>
                          @error('name')
                              <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="">Description</label>
                          <input type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Help text</small>
                          @error('description')
                              <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="">Original</label>
                          <input type="text" name="original" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Help text</small>
                          @error('original')
                              <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="">Slug</label>
                          <input type="text" name="slug" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          <small id="helpId" class="text-muted">Help text</small>
                          @error('slug')
                              <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label for="import">ChooseFile</label>
                          <input type="file" name="file" id="import" class="form-control" onchange="previewFile(this)">
                          <img id="previewImg"  width="30%" src="">
                          @error('image')
                              <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                        </div>
                       <button type="submit" class="btn btn-primary">Choose</button>
                    </form>
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