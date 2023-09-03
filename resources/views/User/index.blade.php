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
							<a href="#mdlAddUser" data-toggle="modal" class="btn btn-primary btn-sm btn-flat clear_txt" style="margin-top:8px!important;"> NEW USER TYPE</a>
						</div>
					</div>
					<div class="box-body">
						<div id="container_cert_type">
							<table id="tblUser" class="table table-striped table-bordered" >
								<thead style="font-family:calibri;font-size:15px;">
									<th style="background:#367fa9;color:white;width:10%;">ID</th>
									<th style="background:#367fa9;color:white;width:20%;">USERNAME</th>
									<th style="background:#367fa9;color:white;width:20%;">NAME</th>
									<th style="background:#367fa9;color:white;width:20%;">SITE LOCATION</th>
									<th style="background:#367fa9;color:white;width:18%;">USER TYPE</th>
									<th style="background:#367fa9;color:white;width:18%;">STATUS</th>
									<th style="background:#367fa9;color:white;width:2%;">EDIT</th>
									<th style="background:#367fa9;color:white;width:2%;">RESET</th>
								</thead>
								<tbody style="font-family:calibri;font-size:15px;">
                                    @foreach($User as $item)
                                    <tr>
										<td style="width:10%;">{{$item->id}}</td>
										<td style="width:20%;">{{$item->email}}</td>
										<td style="width:20%;">{{$item->name}}</td>
										<td style="width:20%;">{{$item->office->office_desc}}</td>
										<td style="width:18%;">{{$item->role->user_type_desc}}</td>
										<td style="width:20%;">{{$item->status->status_desc}}</td>
										<td style="width:2%;"><button style="background:#367fa9;" class="button btn btn-success btn-sm editbtn btn-flat"><i class="fa fa-edit" style="width:10px;"></i></button></td>
										<td style="width:2%;"><button style="background:#367fa9;" class="button btn btn-success btn-sm resetUser btn-flat" data-id="'.$row['user_id'].'" data-emailaddress="'.$row['email_address'].'"><i class="fas fa-power-off" style="width:10px;"></i></button></td>
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
  
  $(document).on('click','.editbtn',function(){
	$('#editmodal').modal('show');
            $tr = $(this).closest('tr');
  
            var data = $tr.children("td").map(function() {
              return $(this).text();
            }).get();
  
            console.log(data);
  
            $('#id').val(data[0]);
            $('#email').val(data[1]);
            $('#name').val(data[2]);
            $('#office_id').select2().val(data[3]);
            $('#user_type_id').select2().val(data[4]);
            $('#status_id').val(data[5]);
            $('#editForm').attr('action','/User/'+data[0]);
        $('#editmodal').modal('show');
            
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