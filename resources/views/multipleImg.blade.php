<!doctype html>
<html lang="en">
  <head>
    <title>Multiple Image</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <form id ="images" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="productImg">Product</label>
            <input id="productImg" class="form-control" type="text" name="name">
        </div>
        <input type="file" id="files"class ="form-control" name="photo[]" multiple onchange="previewFile(this)">
        <img id="previewImg"  width="" src="">
        <input type="submit" class="btn btn-primary" value="Upload">    
    </form>
    <div id ="test"></div>
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
                  imgFile.css("width" ,"20%");
                  imgFile.appendTo("#test");
                }
              }
            }
         }
        }
    </script>
  </body>
</html>