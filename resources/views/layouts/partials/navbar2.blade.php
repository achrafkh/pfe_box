<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
        @if(Auth::user()->hasRole('op'))
       	 <li> 
       	 	<a href="{{ url('/op/dashboard')}}" class="waves-effect active">
       	 		<i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
       	 		<span class="hide-menu"> Manage Clients <span class="fa arrow"></span> </span>
       	 	</a>
        </li>
        @endif

        @if(Auth::user()->hasRole('com'))
       	 <li> 
       	 	<a href="{{ url('/com/clients')}}" class="waves-effect active">
       	 		<i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
       	 		<span class="hide-menu"> Contacts List <span class="fa arrow"></span> </span>
       	 	</a>
        </li>

        <li> 
       	 	<a href="{{ url('/com/appointments')}}" class="waves-effect active">
       	 		<i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
       	 		<span class="hide-menu"> Manage Appointments <span class="fa arrow"></span> </span>
       	 	</a>
        </li>

        <li> 
       	 	<a href="{{ url('/invoices')}}" class="waves-effect active">
       	 		<i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
       	 		<span class="hide-menu"> Manage Invoices <span class="fa arrow"></span> </span>
       	 	</a>
        </li>
        @endif

        @if(Auth::user()->hasRole('mark'))
       	 <li> 
       	 	<a href="{{ url('/mark/dashboard')}}" class="waves-effect active">
       	 		<i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
       	 		<span class="hide-menu"> Global Stats <span class="fa arrow"></span> </span>
       	 	</a>
        </li>

       	 <li> 
       	 	<a href="{{ url('/mark/showrooms')}}" class="waves-effect active">
       	 		<i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
       	 		<span class="hide-menu"> Showrooms <span class="fa arrow"></span> </span>
       	 	</a>
        </li>
        @endif

        @if(Auth::user()->hasRole('admin'))
       	<li> 
       	 	<a href="{{ url('/admin/users')}}" class="waves-effect active">
       	 		<i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
       	 		<span class="hide-menu"> Manage Users <span class="fa arrow"></span> </span>
       	 	</a>
        </li>
		<li> 
       	 	<a href="{{ url('/admin/appointments')}}" class="waves-effect active">
       	 		<i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
       	 		<span class="hide-menu"> Manage Appointments <span class="fa arrow"></span> </span>
       	 	</a>
        </li> 

        <li> 
       	 	<a href="{{ url('/invoices')}}" class="waves-effect active">
       	 		<i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
       	 		<span class="hide-menu"> Manage Invoices <span class="fa arrow"></span> </span>
       	 	</a>
        </li>

        <li> 
       	 	<a href="{{ url('/admin/pages')}}" class="waves-effect active">
       	 		<i class="linea-icon linea-basic fa-fw" data-icon="v"></i>
       	 		<span class="hide-menu"> Manage Forms <span class="fa arrow"></span> </span>
       	 	</a>
        </li>       
        @endif

       
    </ul>
</div>
</div>