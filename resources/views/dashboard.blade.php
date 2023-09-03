@extends('layout')
@section('content')

<body class="hold-transition skin-blue fixed sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		@include('section.navbar')
		@include('section.menubar')
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
						<div id="container_cert_type">
							
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
<script>
$(document).ready(function() {
	fetchtblCertificateType();
});
</script>

@endsection
