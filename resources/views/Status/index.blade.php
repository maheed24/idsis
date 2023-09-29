@extends('layout')
@section('content')
@include('section.header')
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
						<h4><b>LIST OF STATUS</b></h4>
						<div class="box-tools pull-right">
							<a href="#mdlAddStatus" data-toggle="modal" class="btn btn-primary btn-sm btn-flat clear_txt" style="margin-top:8px!important;"> NEW STATUS</a>
						</div>
					</div>
					<div class="box-body">
						<div id="container_cert_type">
							<table id="tblStatus" class="table table-striped table-bordered" >
								<thead style="font-family:calibri;font-size:15px;">
									<th style="background:#367fa9;color:white;width:2%;">ID</th>
									<th style="background:#367fa9;color:white;width:96%;">STATUS</th>
									<th style="background:#367fa9;color:white;width:2%;">EDIT</th>
								</thead>
								<tbody style="font-family:calibri;font-size:15px;">
                                    @foreach($Status as $item)
                                    <tr>
                                        <td style="width:2%;">{{$item->id}}</td>
                                        <td style="width:96%;">{{$item->status_desc}}</td>
										<td style="width:2%;"><button style="background:#367fa9;" class="button btn btn-success btn-sm editbtn btn-flat" data-id=""><i class="fa fa-edit" style="width:10px;"></i></button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
         @include('Status.modal.modal')
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->
     @include('script')
</body>
@if (session()->has('flash_message'))
<script>
	// Display a Toastr notification
	toastr.success("{{ session('flash_message') }}");
</script>
@endif
@if (session()->has('update_message'))
<script>
	// Display an "info" Toastr notification
	toastr.info("{{ session('update_message') }}");
</script>
@endif
<script>
  
    $(document).ready(function(){
      $('.editbtn').on('click', function(){
  
  
  
            $tr = $(this).closest('tr');
  
            var data = $tr.children("td").map(function() {
              return $(this).text();
            }).get();
  
            console.log(data);
  
            $('#id').val(data[0]);
            $('#status_desc').val(data[1]);
            $('#editForm').attr('action','/Status/'+data[0]);
        $('#editmodal').modal('show');
            
      });
  
    });
  </script> 
<script>
$(document).ready(function() {
	fetchtblCertificateType();
});
</script>
<script>

	//DATA TABLE
	$('#tblStatus').DataTable({
		responsive: true,
		"bLengthChange": false,
		"iDisplayLength": 5,
		"language": {
			"emptyTable": "THERE IS NO AVAILABLE DATA FOR STATUS IN THE DATABASE"
		},
		"columnDefs": [
			{
				"targets": [ 0 ],
				"visible": true,
				"searchable": true,
				"orderable": true
			},
			{
				"targets": [ 1 ],
				"visible": true,
				"searchable": true,
				"orderable": true
			}
		]
	});
	</script>
@endsection