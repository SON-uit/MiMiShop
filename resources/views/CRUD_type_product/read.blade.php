<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="http://localhost/webshop/public/">
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
              <div class="col-md-12">
                @if(Session::has('typeproduct_delete'))
                  <div class="alert alert-success" role="alert">
                      {{ Session::get('typeproduct_delete') }}
                  </div>
                @endif
                <div class="card">
                  <div class="card-header">
                    All Type Product <a href="http://localhost/webshop/public/admin/type_product/create" class="btn btn-success">Add</a>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped">
                      <thead class="thead-light">
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Image_path</th>
                          <th>Original</th>
                          <th>Slug</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($data as $item)
                            <tr>
                              <td>{{ $item->id }}</td>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->description }}</td>
                              <td>{{ $item->image }}</td>
                              <td>{{ $item->original }}</td>
                              <td>{{ $item->slug }}</td>
                              <td>
                                <a href="http://localhost/webshop/public/admin/type_product/detail/{{ $item->id }}" class="btn btn-primary">Detail</a>
                                <a href="http://localhost/webshop/public/admin/type_product/delete/{{ $item->id }}" class="btn btn-danger">Delete</a>
                                <a href="http://localhost/webshop/public/admin/type_product/edit/{{ $item->id }}" class="btn btn-success">Edit</a>
                              </td>
                            </tr>
                          @endforeach
                      </tbody>
                      <tfoot>
                        
                      </tfoot>
                    </table>
                  </div>
                  <div class="card-footer">
                    Footer
                  </div>
                </div>    
              </div>          

            </div>
      
        </div>
       
    </section>
  </body>
</html>