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
						<h4><b>LIST OF USER</b></h4>
						<div class="box-tools pull-right">
							@can('super-admin')
							<a href="#mdlAddUser" data-toggle="modal" class="btn btn-primary btn-sm btn-flat clear_txt" style="margin-top:8px!important;"> NEW USER</a>
							@endcan
						</div>
					</div>
					<div class="box-body">
						<div id="container_cert_type">
							<table id="tblUser" class="table table-striped table-bordered" >
								<thead style="font-family:calibri;font-size:15px;">
									<th style="background:#367fa9;color:white;width:5%;">ID</th>
									<th style="background:#367fa9;color:white;width:20%;">USERNAME</th>
									<th style="background:#367fa9;color:white;width:20%;">NAME</th>
									<th style="background:#367fa9;color:white;width:35%;">SITE LOCATION</th>
									<th style="background:#367fa9;color:white;width:13%;">USER TYPE</th>
									<th style="background:#367fa9;color:white;width:13%;">STATUS</th>
									<th style="background:#367fa9;color:white;width:2%;">EDIT</th>
									<th style="background:#367fa9;color:white;width:2%;">RESET</th>
								</thead>
								<tbody style="font-family:calibri;font-size:15px;">
                                    @foreach($User as $item)
                                    <tr>
										<td style="width:5%;">{{$item->id}}</td>
										<td style="width:20%;">{{$item->email}}</td>
										<td style="width:20%;">{{$item->name}}</td>
										<td style="width:35%;">{{$item->office->office_desc}}</td>
										<td style="width:13%;">{{$item->role->user_type_desc}}</td>
										<td style="width:13%;">{{$item->status->status_desc}}</td>
										<td style="width:2%;"><button style="background:#367fa9;" class="button btn btn-success btn-sm editbtn btn-flat" value="{{$item->id}}"><i class="fa fa-edit" style="width:10px;"></i></button></td>
										<td style="width:2%;"><button style="background:#367fa9;" class="button btn btn-success btn-sm resetPass btn-flat" value="{{$item->id}}"><i class="fas fa-power-off" style="width:10px;"></i></button></td>
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
         @include('User.modal.modal')
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->
     @include('script')
</body>
<script>

$(document).on('click', '.editbtn', function (e){
	var id = $(this).val();
	e.preventDefault();
	$('#editmodal').modal('show');
	//alert(id);

	$.ajax({
		type: "GET",
		url:"/edit-user/"+id,
		success: function (response) {
			if(response.status == 404)
			{
				alert(response.message);
				$('#editmodal').modal('hide');
			}
			else
			{
				$('#id').val(id);
				$('#updatetxtlastname').val(response.users.last_name);
				$('#updatetxtfirstname').val(response.users.first_name);
				$('#updatetxtmiddleinitial').val(response.users.middle_initial);
				$('#updatetxtname').val(response.users.name);
				$('#email').val(response.users.email);
				$('#office_id').select2().val(response.users.office_id).trigger('change');
				$('#user_type_id').select2().val(response.users.user_type_id).trigger('change');
				$('#status_id').select2().val(response.users.status_id).trigger('change');
				$('#editForm').attr('action','/User/'+id);
			}
		}
	});

});

//RESET PASSWORD MODAL

$(document).on('click', '.resetPass', function (e){
	var ids = $(this).val();
	e.preventDefault();
	$('#ResetModal').modal('show');
	//alert(ids);
				$('#ids').val(ids);
				$('#editForm1').attr('action','/user-reset/'+ids);

});


  </script> 
<script>
	$(document).ready(function() {
	fetchtblUser();
});
</script>
<script>

	//DATATABLE SCRIPT
	$('#tblUser').DataTable({
		responsive: true,
		"bLengthChange": false,
		"iDisplayLength": 10,
		"language": {
		  "emptyTable": "THERE IS NO AVAILABLE DATA FOR USER IN THE DATABASE"
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
			},
			{
				"targets": [ 2 ],
				"visible": true,
				"searchable": true,
				"orderable": true
			},
			{
				"targets": [ 3 ],
				"visible": true,
				"searchable": true,
				"orderable": true
			},
			{
				"targets": [ 4 ],
				"visible": true,
				"searchable": true,
				"orderable": true
			},
			{
				"targets": [ 5 ],
				"visible": true,
				"searchable": true,
				"orderable": true
			},
			{
				"targets": [ 6 ],
				"visible": true,
				"searchable": true,
				"orderable": true
			}
		]
	});
	
	</script>
@endsection