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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <canvas id='myChart'></canvas>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "http://localhost/webshop/public/pieChart",
                dataType: "json",
                success: function (response) {
                    var labels =[];
                    var figures = [];
                    response.forEach(element => {
                        labels.push(element.product_type);
                        figures.push(parseInt(element.figure));
                    });
                    const data = {
                        labels : labels,
                        datasets : [{
                            label : 'My First PieChart',
                            data : figures,
                            backgroundColor :[
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)',
                                'rgb(92, 214, 92)'
                            ],
                            hoverOffset:4,
                            
                        }]
                    };
                    createPieChart(data);   
                 }
            });
        })
        function createPieChart(data){
            let myChart = document.getElementById('myChart').getContext('2d');
            Chart.defaults.global.defaultFontFamily='Lato';
            let PieChart = new Chart(myChart,{
                type :'pie',
                data : data,
                options : {
                    title :{
                        display : true,
                        text:'Number of Products in Shop',
                        fontSize:25,
                        align : 'center',

                    },
                    legend:{
                        display:true,
                        position:'right',
                        labels:{
                            fontColor:'#000',
                            fontSize : 15,
                        }
                        
                    },
                }
            })}
    </script>
  </body>
</html>