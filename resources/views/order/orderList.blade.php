<!doctype html>
<html lang="en">
  <head>
    <title>OrderList</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-4">
                <h3>Danh sách các đơn đặt hàng</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <table class="table table-striped table-light">
                    <thead>
                        <tr class="table-info">
                            <th>ID Bill </th>
                            <th>UserName</th>
                            <th>PhoneNumber</th>
                            <th>Address</th>
                            <th>PayMent</th>
                            <th>Bill total</th>
                            <th>Date</th>
                            <td>Bill details</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $query as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phonenumber }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->payment }}</td>
                                <td>{{number_format($item->total) }}đ</td>
                                <td>@php echo date("d/m/Y", strtotime($item->date)) @endphp</td>
                                <td><a  class="btn btn-primary" href="http://localhost/webshop/public/admin/bill_details/{{ $item->id }}">Details</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $query->links() !!}
        </div>
    </div> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>