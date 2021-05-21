@extends('layout.v_template')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Today's Trending</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <div class="col-lg">
    <div class="card">
      <div class="card-header border-0">
        <div class="d-flex justify-content-between">
          <h1 class="text-bold">Trending</h1>
          <a href="javascript:void(0);">View Report</a>
        </div>
      </div>
      <div class="card-body">
        

        <div class="position-relative mb-4">
          <canvas id="sales-chart" height="200"></canvas>
        </div>

        <div class="d-flex flex-row justify-content-end">
          <span class="mr-2">
            <i class="fas fa-square text-primary"></i> Value 1
          </span>

          <span>
            <i class="fas fa-square text-gray"></i> Value 2
          </span>
        </div>
      </div>
    </div>
    <!-- /.card -->

  </div>
  </div></div>

  </section>
  <!-- /.content -->
</div>
    @endsection
    @section('chart')
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
'use strict'
  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }
  
  
  var mode = 'index'
  var intersect = true
  
  // var val1 = @json($val1)
  // var val2 = @json($val2)
  // console.log(val1)
  var $salesChart = $('#sales-chart')
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: @json($date),
      // labels: ['senin', 'selasa', 'rabu', 'kamis', 'jumat'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor: '#007bff',
          data: @json($val1)
          // data: [2, 6, 9, 7,5]
        },
        {
          backgroundColor: '#ced4da',
          borderColor: '#ced4da',
          data: @json($val2)
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }

              return  value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  })
    </script>
    {{-- <script src="{{asset('/adminjs')}}/dashboard3.js"></script>
    <script src="{{asset('/adminlte')}}/dist/js/demo.js"></script> --}}
   
    
    @endsection