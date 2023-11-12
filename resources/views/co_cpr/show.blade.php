@extends('layout')
@section('content')

<body class="hold-transition skin-blue fixed sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
	
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
				<!-- Default box -->
				<div class="box" style="display:none;">
					<div class="box-header with-border">
						<h4><b>Dashboard</b></h4>
						
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-3 col-6">
							  <!-- small box -->
							  <div class="small-box bg-info">
								<div class="inner">
								  <h3>150</h3>
				  
								  <p>Valid</p>
								  <h3>150</h3>
				  
								  <p>Expired</p>
								</div>
								<div class="icon">
								  <i class="ion-android-boat"></i>
								</div>
								<a href="#" class="small-box-footer">View info <i class="fas fa-arrow-circle-right"></i></a>
							  </div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
							  <!-- small box -->
							  <div class="small-box bg-success">
								<div class="inner">
								  <h3>53<sup style="font-size: 20px">%</sup></h3>
				  
								  <p>Ship Type</p>
								</div>
								<div class="icon">
								  <i class="ion-document-text"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							  </div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
							  <!-- small box -->
							  <div class="small-box bg-warning">
								<div class="inner">
								  <h3>44</h3>
				  
								  <p>Total Passenger</p>
								</div>
								<div class="icon">
								  <i class="ion ion-person-add"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							  </div>
							</div>
							<!-- ./col -->
							<div class="col-lg-3 col-6">
							  <!-- small box -->
							  <div class="small-box bg-danger">
								<div class="inner">
								  <h3>65</h3>
				  
								  <p>Unique Visitors</p>
								</div>
								<div class="icon">
								  <i class="ion ion-pie-graph"></i>
								</div>
								<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							  </div>
							</div>
							<!-- ./col -->
						  </div>
						
					</div>
					<!-- /.box-body -->
				</div>
				<div id="divLoading" class="container"><img id="loading" height="150" src="{{ asset('public/images/loading_vessel.gif')}}"></div>
				<!-- /.box -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		 @include('section.footer')
		 {{-- include '../../modal/admin/modal.php'; --}}
         
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->
	 {{-- require '../../js/admin/script_admin.php'; ?> --}}
     @include('script')
</body>
@endsection
