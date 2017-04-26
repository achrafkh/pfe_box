<div class="side-mini-panel">
	<ul class="mini-nav">
		<div class="togglediv"><a href="javascript:void(0)" id="togglebtn"><i class="ti-menu"></i></a></div>
		<!-- /.Dashboard -->
		<!-- .Widgets -->
		<li class="selected"><a href="javascript:void(0)"><i data-icon="P" class="linea-icon linea-basic fa-fw"></i></a>
		<div class="sidebarmenu" id="nav">
			<!-- Left navbar-header -->
			<h3 class="menu-title">Managment Section</h3>
			<div class="searchable-menu">
				<form role="search" class="menu-search">
					<input type="text" placeholder="Search..." class="form-control">
					<a href=""><i class="fa fa-search"></i></a>
				</form>
			</div>
			@if(Auth::user()->hasRole('op'))
			<ul class="sidebar-menu nav">
				<li><a href="{{ url('/op/dashboard')}} ">Manage Clients </a></li>
			</ul>
			@endif
			@if(Auth::user()->hasRole('com'))
			<ul class="sidebar-menu nav">
				<li><a href="{{ url('/com/clients')}} ">Contacts List</a></li>
				<li><a href="{{ url('/com/appointments')}} ">Manage Appointments</a></li>
				<li><a href="{{ url('/invoices')}} ">Manage Invoices</a></li>
			</ul>
			@endif
			@if(Auth::user()->hasRole('mark'))
			<ul class="sidebar-menu nav">
				<li><a href="{{ url('/mark/dashboard')}} ">Global Statistiques</a></li>
				<li><a href="{{ url('/mark/showrooms')}} ">Showrooms</a></li>
			</ul>
			@endif
			@if(Auth::user()->hasRole('admin'))
			<ul class="sidebar-menu nav">
				<li><a href="{{ url('/admin/users')}} ">Manage Users</a></li>
				<li><a href="{{ url('/admin/appointments')}} ">Manage Appointments</a></li>
				<li><a href="{{ url('/invoices')}} ">Manage Invoices</a></li>
				<li><a href="{{ url('/admin/pages')}} ">Manage Forms</a></li>
			</ul>
			@endif
			<!-- Left navbar-header end -->
		</div>
	</li>

</ul>
</div>