@extends('voyager::master')

@section('content')
    <div class="page-content">
        @include('voyager::alerts')
        @include('voyager::dimmers')
        <div class="analytics-container">
            

         


<div class="col-md-3">


       

        <!-- ./col -->
  <div class="col-md-12">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $servicioshoy }}</h3>

              <p>Servicios del dia</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            
          </div>
  </div>
        <!-- ./col -->

  <div class="col-md-12">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $cancelados }}</h3>

              <p>Servicios cancelados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
           
          </div>
  </div>

  <div class="col-md-12">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3> S/ {{ $total }}</h3>

              <p>Ingreso del día</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          
          </div>
  </div>

</div>
<div class="col-md-8">
<div class="box box-primary">
  <div class="box-header with-border">
      <h3>Servicios Taxi</h3>
  </div>
  <div class="box-body">
      <div class="chart4">
          <!-- Sales Chart Canvas -->
          <canvas id="salesChart4" height="180" style="height: 540px;"></canvas>
      </div>
  </div>
</div>
</div>
    </div>
@stop

@section('javascript')
        <script src="/plugins/chartjs-old/Chart.min.js"></script>
        <script src="/js/raphael-min.js"></script>
        <script src="/plugins/morris/morris.min.js"></script>
        <script>
                try {
    

                    var salesChartCanvas4 = $('#salesChart4').get(0).getContext('2d')
                        // This will get the first returned node in the jQuery collection.
                    var salesChart4 = new Chart(salesChartCanvas4)
                
                    var salesChartData4 = {
                        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul','Ago','Set','Oct','Nov','Dic'],
                        datasets: [{
                                label: 'Electronics',
                                fillColor: '#dee2e6',
                                strokeColor: '#ced4da',
                                pointColor: '#ced4da',
                                pointStrokeColor: '#c1c7d1',
                                pointHighlightFill: '#fff',
                                pointHighlightStroke: 'rgb(220,220,220)',
                                data: [ {{ $meses['enero'] }},{{ $meses['febrero'] }},{{ $meses['marzo'] }},{{ $meses['abril'] }},{{ $meses['mayo'] }},{{ $meses['junio'] }},{{ $meses['julio'] }},{{ $meses['agosto'] }},{{ $meses['setiembre'] }},{{ $meses['octubre'] }},{{ $meses['noviembre'] }},{{ $meses['diciembre'] }}]
                            },
                
                        ]
                    }
                
                    var salesChartOptions4 = {
                            //Boolean - If we should show the scale at all
                            showScale: true,
                            //Boolean - Whether grid lines are shown across the chart
                            scaleShowGridLines: false,
                            //String - Colour of the grid lines
                            scaleGridLineColor: 'rgba(0,0,0,.05)',
                            //Number - Width of the grid lines
                            scaleGridLineWidth: 1,
                            //Boolean - Whether to show horizontal lines (except X axis)
                            scaleShowHorizontalLines: true,
                            //Boolean - Whether to show vertical lines (except Y axis)
                            scaleShowVerticalLines: true,
                            //Boolean - Whether the line is curved between points
                            bezierCurve: true,
                            //Number - Tension of the bezier curve between points
                            bezierCurveTension: 0.3,
                            //Boolean - Whether to show a dot for each point
                            pointDot: false,
                            //Number - Radius of each point dot in pixels
                            pointDotRadius: 4,
                            //Number - Pixel width of point dot stroke
                            pointDotStrokeWidth: 1,
                            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                            pointHitDetectionRadius: 20,
                            //Boolean - Whether to show a stroke for datasets
                            datasetStroke: true,
                            //Number - Pixel width of dataset stroke
                            datasetStrokeWidth: 2,
                            //Boolean - Whether to fill the dataset with a color
                            datasetFill: true,
                            //String - A legend template
                            legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%=datasets[i].label%></li><%}%></ul>',
                            //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                            maintainAspectRatio: false,
                            //Boolean - whether to make the chart responsive to window resizing
                            responsive: true
                        }
                        //Create the line chart
                    salesChart4.Line(salesChartData4, salesChartOptions4)
                
                   
                } catch (error) {
                    console.log("inicialice..");
                }
            </script>

@stop
