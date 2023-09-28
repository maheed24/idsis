
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{asset('img/profile.jpg')}}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				{{-- <p>{{Auth::user()->name}}</p> --}}
				<a href="{{url('/change-password')}}"><p>{{Auth::user()->last_name}}, {{Auth::user()->first_name}}</p></a>
				{{Auth::user()->office->office_desc}}
			</div>
		</div>
		<ul class="sidebar-menu" data-widget="tree" style="font-weight:normal!important;">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree" style="font-weight:normal!important;">
			<li class="header">MANAGE</li>
			@can('admin')
							<li><a href="{{ url('/Cert_type') }}"><i class="fas fa-solid fa-certificate"></i><span style="margin-left:10px;">CERTIFICATION TYPE</span></a></li>	
							<li><a href="{{ url('/Hull_material')}}"><i class="fas fa-solid fa-chevron-down"></i><span style="margin-left:10px;">HULL MATERIAL</span></a></li>	
							<li><a href="{{ url('/Ship_Classification')}}"><i class="fas fa-solid fa-sitemap"></i><span style="margin-left:10px;">SHIP CLASSIFICATION</span></a></li>	
							<li><a href="{{ url('/Ship_type')}}"><i class="fas fa-solid fa-ship"></i><span style="margin-left:10px;">SHIP TYPE</span></a></li>
							<li><a href="{{ url('/Ship_classification_type')}}"><i class="fas fa-solid fa-anchor"></i><span style="margin-left:10px;">SHIP CLASSIFICATION TYPE</span></a></li>
							<li><a href="{{ url('/Stem_type')}}"><i class="fas fa-solid fa-underline"></i><span style="margin-left:10px;">STEM TYPE</span></a></li>
							<li><a href="{{ url('/Stern_type')}}"><i class="fas fa-solid fa-wine-glass"></i><span style="margin-left:10px;">STERN TYPE</span></a></li>
							<li><a href="{{ url('/Trading_area')}}"><i class="fas fa-solid fa-handshake"></i><span style="margin-left:10px;">TRADING AREA</span></a></li>
							<li><a href="{{ url('/Office')}}"><i class="fas fa-solid fa-building"></i><span style="margin-left:10px;">OFFICE</span></a></li>
							<li><a href="{{ url('/User_type')}}"><i class="fas fa-solid fa-user-lock"></i><span style="margin-left:10px;">USER TYPE</span></a></li>
							<li><a href="{{ url('/User')}}"><i class="fas fa-solid fa-user"></i><span style="margin-left:10px;">USER</span></a></li>
							<li><a href="{{ url('/Status') }}"><i class="fas fa-solid fa-battery-empty"></i><span style="margin-left:10px;">STATUS</span></a></li>
							<li><a href="{{ url('/Province') }}"><i class="fas fa-map-pin"></i><span style="margin-left:10px;">PROVINCE</span></a></li>
							<li><a href="{{ url('/City_municipality') }}"><i class="fas fa-map"></i><span style="margin-left:10px;">CITY/MUNICIPALITY</span></a></li>
							<li><a href="{{ url('/Rig_type') }}"><i class="fas fa-solid fa-battery-empty"></i><span style="margin-left:10px;">RIG TYPE</span></a></li>
							<li><a href="{{ url('/Operation') }}"><i class="fas fa-paste"></i><span style="margin-left:10px;">OPERATION</span></a></li>
			@endcan
			@can('super-admin')
							<li><a href="{{ url('/Cert_type') }}"><i class="fas fa-solid fa-certificate"></i><span style="margin-left:10px;">CERTIFICATION TYPE</span></a></li>	
							<li><a href="{{ url('/Hull_material')}}"><i class="fas fa-solid fa-chevron-down"></i><span style="margin-left:10px;">HULL MATERIAL</span></a></li>	
							<li><a href="{{ url('/Ship_Classification')}}"><i class="fas fa-solid fa-sitemap"></i><span style="margin-left:10px;">SHIP CLASSIFICATION</span></a></li>	
							<li><a href="{{ url('/Ship_type')}}"><i class="fas fa-solid fa-ship"></i><span style="margin-left:10px;">SHIP TYPE</span></a></li>
							<li><a href="{{ url('/Ship_classification_type')}}"><i class="fas fa-solid fa-anchor"></i><span style="margin-left:10px;">SHIP CLASSIFICATION TYPE</span></a></li>
							<li><a href="{{ url('/Stem_type')}}"><i class="fas fa-solid fa-underline"></i><span style="margin-left:10px;">STEM TYPE</span></a></li>
							<li><a href="{{ url('/Stern_type')}}"><i class="fas fa-solid fa-wine-glass"></i><span style="margin-left:10px;">STERN TYPE</span></a></li>
							<li><a href="{{ url('/Trading_area')}}"><i class="fas fa-solid fa-handshake"></i><span style="margin-left:10px;">TRADING AREA</span></a></li>
							<li><a href="{{ url('/Office')}}"><i class="fas fa-solid fa-building"></i><span style="margin-left:10px;">OFFICE</span></a></li>
							<li><a href="{{ url('/User_type')}}"><i class="fas fa-solid fa-user-lock"></i><span style="margin-left:10px;">USER TYPE</span></a></li>
							<li><a href="{{ url('/User')}}"><i class="fas fa-solid fa-user"></i><span style="margin-left:10px;">USER</span></a></li>
							<li><a href="{{ url('/Status') }}"><i class="fas fa-solid fa-battery-empty"></i><span style="margin-left:10px;">STATUS</span></a></li>
							<li><a href="{{ url('/Province') }}"><i class="fas fa-map-pin"></i><span style="margin-left:10px;">PROVINCE</span></a></li>
							<li><a href="{{ url('/City_municipality') }}"><i class="fas fa-map"></i><span style="margin-left:10px;">CITY/MUNICIPALITY</span></a></li>
							<li><a href="{{ url('/Rig_type') }}"><i class="fas fa-solid fa-battery-empty"></i><span style="margin-left:10px;">RIG TYPE</span></a></li>
							<li><a href="{{ url('/Operation') }}"><i class="fas fa-paste"></i><span style="margin-left:10px;">OPERATION</span></a></li>
			@endcan
			@can('user')
							<li><a href="{{ url('co_cpr')}}"><i class="fas fa-solid fa-registered"></i><span style="margin-left:10px;">CO/CPR/LICENSE</span></a></li>
							<li><a href="{{ url('change_homeport')}}"><i class="fas fa-solid fa-registered"></i><span style="margin-left:10px;">CHANGE HOMEPORT</span></a></li>
			@endcan
					{{-- <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span style="margin-left:10px;">SEAFARER</span></a></li>
							 <li><a href="transaction.php"><i class="fas fa-tachometer-alt"></i><span style="margin-left:10px;">APPLICATION</span></a></li> --}}
							
				
		</ul>
    </section>
    <!-- /.sidebar -->
</aside>