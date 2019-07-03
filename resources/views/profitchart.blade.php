@extends('layout')

@section('title')
  <h1 class='title appTitle'>Pharmacy Profit</h1>
  <div class='is-hidden-print' style='margin-bottom: 1rem'>
  <div class='columns is-vcentered'>
    <div class='column is-narrow'>
      <h3>Choose year: </h3>
    </div>
    <div class='column is-narrow'>
      <form action='/profit' method='GET'>
        <div class="select">
          <select name='year' aria-label='Year' onchange='this.form.submit()'>
            @for($y = $max_year; $y >= $min_year; $y--)
              <option value='{{ $y }}' {{ $y == $year ? 'selected' : '' }}>
                {{ $y }}
              </option>
            @endfor
          </select>
        </div>
      </form>
    </div>
    <div class='is-narrow'>
      <button class='button is-warning is-hidden-print' onclick='window.print()'>
        <span class='icon is-small'>
          <i class='fas fa-print'></i>
        </span>
        <span>Print</span>
      </button>
    </div>
  </div>
  </div>
<h1 class='title appTitle'>Profits for {{ $year }} year</h1>
@endsection
@section('content')
<div class='box appForm-container'>
    @foreach($months as $index => $month)
      @if($year == $max_year && $index > $current_month)
      @else
        <section class="hero is-warning is-small">
          <div class="hero-body">
            <div class="container">
              <h3 class="title">
                {{ $month }}
              </h3>
            </div>
          </div>
        </section>
              <?php $j=0;  ?>
              <?php $i=0;?>
                  @foreach($sales->drugs as $drug)
                      <?php $j+= $drug->pivot->amount * $drug->price ; ?>
                    <?php $i+=$drug->OrginalPrice * $drug->balance ; ?>
                  @endforeach
            <?php echo $j-$i ; ?>
      @endif
    @endforeach
  </div>
  <title>Gender Chart</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <style type="text/css">
   .box{
    width:800px;
    margin:0 auto;
   }
  </style>
  <script type="text/javascript">
   var analytics = <?php echo $j-$i; ?>

   google.charts.load('current', {'packages':['corechart']});

   google.charts.setOnLoadCallback(drawChart);

   function drawChart()
   {
    var data = google.visualization.arrayToDataTable(analytics);
    var options = {
     title : 'Percentage of Gender User'
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
    chart.draw(data, options);
   }
  </script>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Gender Chart</h3><br />
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Percentage of Gender</h3>
    </div>
    <div class="panel-body" align="center">
     <div id="pie_chart" style="width:750px; height:450px;">
     </div>
    </div>
   </div>
   
  </div>
 </body>
  @endsection