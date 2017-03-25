@extends('layouts.master')
@section('breadcumbs')
<div class="row bg-title">
	<!-- .page title -->
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Dashboard</h4>
	</div>
	<!-- /.page title -->
	<!-- .breadcrumb -->
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="starter-page.html#">Dashboard</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</div>
	<!-- /.breadcrumb -->
</div>
<!-- .row -->
@endsection
@section('css-top')
<link href="/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<!-- morris CSS -->
<link href="/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
@endsection
@section('css')

@endsection

@section('js')

<script src="/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--Morris JavaScript -->
<script src="/plugins/bower_components/raphael/raphael-min.js"></script>
<script src="/plugins/bower_components/morrisjs/morris.js"></script>

<script src="/js/dashboard1.js"></script>
<!-- Sparkline chart JavaScript -->
<script src="/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
<script src="/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
<script type="text/javascript">


$(document).ready(function() {
    
   var sparklineLogin = function() { 
        $('#sales1').sparkline([20, 40, 30], {
            type: 'pie',
            height: '100',
            resize: true,
            sliceColors: ['#808f8f', '#fecd36', '#f1f2f7']
        });
        $('#sales2').sparkline([6, 10, 9, 11, 9, 10, 12], {
            type: 'bar',
            height: '154',
            barWidth: '4',
            resize: true,
            barSpacing: '10',
            barColor: '#25a6f7'
        });
        
   }
    var sparkResize;
 
        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineLogin, 500);
        });
        sparklineLogin();

});
</script>
@endsection

@section('content1')
<div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
          <div class="white-box">
            <div class="row row-in">
              <div class="col-lg-3 col-sm-6 row-in-br">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic" ></i>
                    <h5 class="text-muted vb">MYNEW CLIENTS</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-danger">23</h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                    <h5 class="text-muted vb">NEW PROJECTS</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-megna">169</h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 row-in-br">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                    <h5 class="text-muted vb">NEW INVOICES</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-primary">157</h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6  b-0">
                <div class="col-in row">
                  <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                    <h5 class="text-muted vb">All PROJECTS</h5>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <h3 class="counter text-right m-t-15 text-success">431</h3>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection


@section('content2')

      <div class="row">
        <div class="col-md-8 col-lg-9 col-sm-6 col-xs-12">
          <div class="white-box">
             <h3 class="box-title">Yearly Sales</h3>
            <ul class="list-inline text-right">
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>iPhone</h5>
              </li>
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #fb9678;"></i>iPad</h5>
              </li>
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #9675ce;"></i>iPod</h5>
              </li>
            </ul>
            <div id="morris-area-chart" style="height: 370px;"></div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
          <div  class="white-box">
            <h3 class="box-title">Total Sites Visit</h3>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                <h1 class="text-warning">$678</h1>
                <p class="text-muted">APRIL 2017</p>
                <b>(150 Sales)</b> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div id="sales1" class="text-center"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
          <div class="white-box">
            <h3 class="box-title">Sales Difference</h3>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                <h1 class="text-info">$447</h1>
                <p class="text-muted">APRIL 2017</p>
                <b>(150 Sales)</b> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div id="sales2" class="text-center"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection



@section('content3')
<div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
          <div class="white-box">
            <h3 class="box-title">Recent sales
              <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                <select class="form-control pull-right row b-none">
                  <option>March 2017</option>
                  <option>April 2017</option>
                  <option>May 2017</option>
                  <option>June 2017</option>
                  <option>July 2017</option>
                </select>
              </div>
            </h3>
            <div class="row sales-report">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <h2>March 2017</h2>
                <p>SALES REPORT</p>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6 ">
                <h1 class="text-right text-success m-t-20">$3,690</h1>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table ">
                <thead>
                  <tr>
                    
                    <th>NAME</th>
                    <th>STATUS</th>
                    <th>DATE</th>
                    <th>PRICE</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    
                    <td class="txt-oflo">Elite admin</td>
                    <td><span class="label label-megna label-rounded">SALE</span> </td>
                    <td class="txt-oflo">April 18</td>
                    <td><span class="text-success">$24</span></td>
                  </tr>
                  <tr>
                    
                    <td class="txt-oflo">Real Homes</td>
                    <td><span class="label label-info label-rounded">EXTENDED</span></td>
                    <td class="txt-oflo">April 19</td>
                    <td><span class="text-info">$1250</span></td>
                  </tr>
                  <tr>
                    
                    <td class="txt-oflo">Medical Pro</td>
                    <td><span class="label label-danger label-rounded">TAX</span></td>
                    <td class="txt-oflo">April 20</td>
                    <td><span class="text-danger">-$24</span></td>
                  </tr>
                  <tr>
                    
                    <td class="txt-oflo">Hosting press</td>
                    <td><span class="label label-megna label-rounded">SALE</span></td>
                    <td class="txt-oflo">April 21</td>
                    <td><span class="text-success">$24</span></td>
                  </tr>
                  <tr>
                    
                    <td class="txt-oflo">Helping Hands</td>
                    <td><span class="label label-success label-rounded">MEMBER</span></td>
                    <td class="txt-oflo">April 22</td>
                    <td><span class="text-success">$24</span></td>
                  </tr>
                  <tr>
                    
                    <td class="txt-oflo">Digital Agency</td>
                    <td><span class="label label-megna label-rounded">SALE</span> </td>
                    <td class="txt-oflo">April 23</td>
                    <td><span class="text-danger">-$14</span></td>
                  </tr>
                  <tr>
                    
                    <td class="txt-oflo">Helping Hands</td>
                    <td><span class="label label-success label-rounded">MEMBER</span></td>
                    <td class="txt-oflo">April 22</td>
                    <td><span class="text-success">$64</span></td>
                  </tr>
                </tbody>
              </table>
              <a href="index.html#">Check all the sales</a> </div>
          </div>
        </div>
      </div>
@endsection


@section('content4')
 <div class="row">
        <div class="col-md-8 col-lg-9 col-sm-12 col-xs-12 pull-right">
          <div class="white-box">
            <h3 class="box-title">Sales Difference</h3>
            <ul class="list-inline text-right">
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Site A View</h5>
              </li>
              <li>
                <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Site B View</h5>
              </li>
            </ul>
            <div id="morris-area-chart2" style="height: 370px;"></div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
          <div class="white-box m-b-15">
            <h3 class="box-title">Sales Difference</h3>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                <h1 class="text-info">$647</h1>
                <p class="text-muted">APRIL 2017</p>
                <b>(150 Sales)</b> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div id="sparkline2dash" class="text-center"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
          <div class="white-box bg-purple m-b-15">
            <h3 class="text-white box-title">VISIT STATASTICS</h3>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                <h1 class="text-white">$347</h1>
                <p class="light_op_text">APRIL 2017</p>
                <b class="text-white">(150 Sales)</b> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div id="sales1" class="text-center"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- row -->
@endsection