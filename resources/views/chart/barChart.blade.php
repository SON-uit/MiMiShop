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
        <canvas id="myChart"></canvas>
    </div>
  </body>
  <script>
    $(document).ready(function () {
        $.ajax({
          type: "GET",
          url: "http://localhost/webshop/public/barChart",
          data: "",
          dataType: "json",
          success: function (response) {
            var labels =[];
            var data = [];
            response.forEach(element => {
                labels.push(getMonth(element.month));
                data.push(parseInt(element.revenue));
                
            });
            let myChart= document.getElementById('myChart').getContext('2d');
              //Option
              Chart.defaults.global.defaultFontFamily='Lato';
              Chart.defaults.global.defaultFontSize = 18;
              Chart.defaults.global.defaultFontColor = '#777';
              let barChart = new Chart(myChart,{
                type:'bar',
                data:{
                  labels : labels,
                  datasets:[{
                    label :'Base On Month in 2021',
                    data : data,
                    backgroundColor :[
                      'rgba(255, 99, 132, 0.5)',
                      'rgba(255, 159, 64, 0.5)',
                      'rgba(255, 205, 86, 0.5)',
                      'rgba(75, 192, 192, 0.5)',
                      'rgba(54, 162, 235, 0.5)',
                      'rgba(153, 102, 255, 0.5)',
                      'rgba(201, 203, 207, 0.5)',
                      'rgba(140, 236, 254, 0.5)',
                      'rgba(231, 83, 143, 0.5)',
                      'rgba(239, 108, 84, 0.5)',
                      'rgba(170, 168, 233, 0.5)',
                      'rgba(248, 27, 62, 0.5)',
                    ],
                    borderColor:[
                      'rgb(255, 99, 132)',
                      'rgb(255, 159, 64)',
                      'rgb(255, 205, 86)',
                      'rgb(75, 192, 192)',
                      'rgb(54, 162, 235)',
                      'rgb(153, 102, 255)',
                      'rgb(201, 203, 207)',
                    ],
                    borderWidth :1,
                    borderColor:'#777',
                    hoverBorderWidth:2,
                    hoverBorderColor:'#000'
                  }]
                },
                options :{
                  title :{
                    display:true,
                    text:'Shop\'s Revenue in 2021 Base on Month',
                    fontSize:25
                  },
                legend:{
                  display:true,
                  position:'right',
                  labels:{
                    fontColor:'#000'
                  }
                },
                layout:{
                  padding:{
                    left:50,
                    right:0,
                    bottom:0,
                    top:0
                  }
                },
                tooltips:{
                  enabled:true
                }
                }
              })
          }
        });
    });
    function getMonth(number){
        const month =['January','February','March','April','May','June','July','August','September','October','November','December'];
        return month[number-1];
    }
  </script>
</html>