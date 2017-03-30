<div class="side-mini-panel">
	<ul class="mini-nav">
		<div class="togglediv"><a href="javascript:void(0)" id="togglebtn"><i class="ti-menu"></i></a></div>
		<!-- .Dashboard -->
		{{--<li class="">
			<a href="javascript:void(0)"><i class="linea-icon linea-basic" data-icon="v"></i></a>
			<div class="sidebarmenu">
				<!-- Left navbar-header -->
				<h3 class="menu-title">Dashboard</h3>
				<div class="searchable-menu">
					<form role="search" class="menu-search">
						<input type="text" placeholder="Search..." class="form-control">
						<a href=""><i class="fa fa-search"></i></a>
					</form>
				</div>
				<ul class="sidebar-menu">
					<li><a href="index.html">Minimalistic</a></li>
				</ul>
				<!-- Left navbar-header end -->
			</div>
		</li> --}}
		<!-- /.Dashboard -->
		<!-- .Widgets -->
		<li class="selected"><a href="javascript:void(0)"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i></a>
		<div class="sidebarmenu">
			<!-- Left navbar-header -->
			<h3 class="menu-title">Managment Section</h3>
			<div class="searchable-menu">
				<form role="search" class="menu-search">
					<input type="text" placeholder="Search..." class="form-control">
					<a href=""><i class="fa fa-search"></i></a>
				</form>
			</div>
			@if(Auth::user()->hasRole('op'))
			<ul class="sidebar-menu">
				<li><a href="{{ url('/op')}} ">Manage Clients  </a></li>
			</ul>
			@endif
			@if(Auth::user()->hasRole('com'))
			<ul class="sidebar-menu">
				<li><a href="{{ url('/com')}} ">Manage Appointments</a></li>
			</ul>
			@endif
			@if(Auth::user()->hasRole('mark'))
			<ul class="sidebar-menu">
				<li><a href="{{ url('/mark')}} ">Check Stats</a></li>
			</ul>
			@endif
			@if(Auth::user()->hasRole('admin'))
			<ul class="sidebar-menu">
				<li><a href="{{ url('/admin/users')}} ">Manage Users</a></li>
				<li><a href="{{ url('/admin')}} ">View Appointments</a></li>
			</ul>
			@endif
			<!-- Left navbar-header end -->
		</div>
	</li>
	<!-- /.Widgets -->
{{--<li class=""><a href="javascript:void(0)"><i data-icon="&#xe006;" class="linea-icon linea-basic fa-fw"></i></a>
<div class="sidebarmenu">
	<!-- Left navbar-header -->
	<h3 class="menu-title">Charts</h3>
	<div class="searchable-menu">
		<form role="search" class="menu-search">
			<input type="text" placeholder="Search..." class="form-control">
			<a href=""><i class="fa fa-search"></i></a>
		</form>
	</div>
	<ul class="sidebar-menu">
		<li><a href="flot.html">Flot Charts</a> </li>
	</ul>
	<!-- Left navbar-header end -->
</div>
</li>
<!-- .Ui Elemtns -->
<li><a href="javascript:void(0)"><i data-icon="/" class="linea-icon linea-basic"></i></a>
<div class="sidebarmenu">
<!-- Left navbar-header -->
<h3 class="menu-title">UI Elements</h3>
<div class="searchable-menu">
	<form role="search" class="menu-search">
		<input type="text" placeholder="Search..." class="form-control">
		<a href=""><i class="fa fa-search"></i></a>
	</form>
</div>
<ul class="sidebar-menu">
	<li><a href="panels-wells.html">Panels and Wells</a></li> <li><a href="panel-ui-block.html">Panels With BlockUI</a></li>
	
</ul>
<!-- Left navbar-header end -->
</div>
</li>--}}
</ul>
</div>