@extends('layout.main')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
  
    <div class="container-fluid">
      <div class="row">
        <!--BOX TOTAL KECAMATAN-->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body" style="background-color: #60c1e7; color: white;">
              <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                <div class="text-center">
                  <p class="mb-0">Total Kecamatan</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium mb-0">{{ $jmlkecamatan }}</h3>
                  </div>
                </div>
                <div class="float-left">
                  <i class="fas fa-city"></i>
                </div>
              </div>
              <p class="mt-3 mb-0 text-left text-md-center text-xl-left">
                <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>Kecamatan
              </p>
            </div>
          </div> 
        </div>

         <!--BOX TOTAL LAKI-LAKI-->
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body" style="background-color: rgb(123, 64, 219); color: white;">
              <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                <div class="text-center">
                  <p class="mb-0">Total Laki-Laki</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium mb-0">{{ $jmlLakiLaki }}</h3>
                  </div>
                </div>
                <div class="float-left">
                  <i class="fas fa-male"></i>
                </div>
              </div>
              <p class="mt-3 mb-0 text-left text-md-center text-xl-left">
                <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>Laki-Laki
              </p>
            </div>
          </div> 
        </div>

         <!--BOX TOTAL PEREMPUAN-->
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body" style="background-color: rgb(207, 126, 207); color: white;">
              <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                <div class="text-center">
                  <p class="mb-0">Total Perempuan</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium mb-0">{{ $jmlPerempuan }}</h3>
                  </div>
                </div>
                <div class="float-left">
                  <i class="fas fa-female"></i>
                </div>
              </div>
              <p class="mt-3 mb-0 text-left text-md-center text-xl-left">
                <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>Perempuan
              </p>
            </div>
          </div> 
        </div>

         <!--BOX TOTAL PENGANGGURAN TERBUKA-->
         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
            <div class="card-body" style="background-color: rgb(230, 65, 65); color: white;">
              <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
                <div class="text-center">
                  <p class="mb-0">Total Pengangguran</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium mb-0">{{ $jmlpengangguran }}</h3>
                  </div>
                </div>
                <div class="float-left">
                  <i class="fas fa-user-slash"></i>
                </div>
              </div>
              <p class="mt-3 mb-0 text-left text-md-center text-xl-left">
                <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>Total Pengangguran
              </p>
            </div>
          </div> 
        </div>
      </div>
    </div>

    <!-- GRAFIK -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-chart-bar mr-1"></i>
          Grafik Tingkat Pengangguran Terbuka
        </h3>
      </div>
      <div class="card-body">
        <div class="tab-content p-0">
      <style>
      #chartdiv {
        width: 100%;
        height: 500px;
      }
      </style>
  
        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
        
        <!-- Chart code -->
        <script>
        am5.ready(function() {
        
        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");
        
        
        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
          am5themes_Animated.new(root)
        ]);
        
        
        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
          panX: true,
          panY: true,
          wheelX: "panX",
          wheelY: "zoomX",
          pinchZoomX: true
        }));
        
        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);
        
        
        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
        xRenderer.labels.template.setAll({
          rotation: -90,
          centerY: am5.p50,
          centerX: am5.p100,
          paddingRight: 15
        });
        
        xRenderer.grid.template.setAll({
          location: 1
        })
        
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
          maxDeviation: 0.3,
          categoryField: "country",
          renderer: xRenderer,
          tooltip: am5.Tooltip.new(root, {})
        }));
        
        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
          maxDeviation: 0.3,
          renderer: am5xy.AxisRendererY.new(root, {
            strokeOpacity: 0.1
          })
        }));
        
        
        // Create series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
          name: "Series 1",
          xAxis: xAxis,
          yAxis: yAxis,
          valueYField: "value",
          sequencedInterpolation: true,
          categoryXField: "country",
          tooltip: am5.Tooltip.new(root, {
            labelText: "{valueY}"
          })
        }));
        
        series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5, strokeOpacity: 0 });
        series.columns.template.adapters.add("fill", function(fill, target) {
          return chart.get("colors").getIndex(series.columns.indexOf(target));
        });
        
        series.columns.template.adapters.add("stroke", function(stroke, target) {
          return chart.get("colors").getIndex(series.columns.indexOf(target));
        });
        
        
        // Set data
        var data = [{
          country: "USA",
          value: 2025
        }, {
          country: "China",
          value: 1882
        }, {
          country: "Japan",
          value: 1809
        }, {
          country: "Germany",
          value: 1322
        }, {
          country: "UK",
          value: 1122
        }, {
          country: "France",
          value: 1114
        }, {
          country: "India",
          value: 984
        }, {
          country: "Spain",
          value: 711
        }, {
          country: "Netherlands",
          value: 665
        }, {
          country: "South Korea",
          value: 443
        }, {
          country: "Canada",
          value: 441
        }];
        
        xAxis.data.setAll(data);
        series.data.setAll(data);
        
        
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear(1000);
        chart.appear(1000, 100);
        
        }); // end am5.ready()
        </script>
  
        <!-- HTML -->
        <div id="chartdiv"></div> 
            <div class="chart tab-pane active" id="revenue-chart"
            style="position: relative; height: 300px;">
            <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
            </div>
          <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
            <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
          </div>
        </div>
        </div><!-- /.card-body -->
      </div>
  </section>
    <!-- /.content -->
  </div>
@endsection