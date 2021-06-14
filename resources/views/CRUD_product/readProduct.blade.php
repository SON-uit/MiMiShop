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
            <h3 class="text-center">CHÀO MỪNG {{ Session::get('admin')->name}}</h3>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    @if(Session::has('product_delete'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ Session::get('product_delete') }}</strong>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <p>DANH SÁCH CÁC SẢN PHẨM</p>
                            <a href="http://localhost/webshop/public/admin/product/create"><button class="btn btn-primary">THÊM SẢN PHẨM MỚI</button></a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 300px">Name</th>
                                        <th style="width: 300px">Discription</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Unit</th>
                                        <th>Classification</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->classification }}</td>
                                        <td class="text-center">
                                            <a href="http://localhost/webshop/public/admin/product/delete/{{ $item->id }}" class="btn btn-danger">Delete</a>
                                            <a href="http://localhost/webshop/public/admin/product/edit/{{ $item->id }}" class="btn btn-success">Edit</a>
                                            <a href="http://localhost/webshop/public/admin/product/addPhotos/{{ $item->id }}" class="btn btn-primary">More Photos</a>
                                        </td>
                                    </tr>
                                       
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {!! $data->links() !!}
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>    
    </section>  
  </body>
</html>