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
						<h4><b>LIST OF OFFICE</b></h4>
						<div class="box-tools pull-right">
							<a href="#mdlAddOffice" data-toggle="modal" class="btn btn-primary btn-sm btn-flat clear_txt" style="margin-top:8px!important;"> NEW OFFICE</a>
						</div>
					</div>
					<div class="box-body">
						<div id="container_cert_type">
							<table id="tblOffice" class="table table-striped table-bordered" >
								<thead style="font-family:calibri;font-size:15px;">
									<th style="background:#367fa9;color:white;width:10%;">ID</th>
									<th style="background:#367fa9;color:white;width:16%;">NAME</th>
									<th style="background:#367fa9;color:white;width:14%;">ABBR</th>
									<th style="background:#367fa9;color:white;width:14%;">PLACE</th>
									<th style="background:#367fa9;color:white;width:14%;">ADDRESS</th>
									<th style="background:#367fa9;color:white;width:14%;">CODE</th>
									<th style="background:#367fa9;color:white;width:16%;">STATUS</th>
									<th style="background:#367fa9;color:white;width:2%;">EDIT</th>
								</thead>
								<tbody style="font-family:calibri;font-size:15px;">
                                    @foreach($Office as $item)
                                    <tr>
										<td style="width:10%;">{{$item->id}}</td>
										<td style="width:18%;">{{$item->office_desc}}</td>
										<td style="width:14%;">{{$item->office_abbr}}</td>
										<td style="width:14%;">{{$item->office_place}}</td>
										<td style="width:14%;">{{$item->office_address}}</td>
										<td style="width:14%;">{{$item->office_code}}</td>		
										<td style="width:20%;">{{$item->status->status_desc}}</td>
										<td style="width:2%;"><button style="background:#367fa9;" class="button btn btn-success btn-sm editbtn btn-flat"><i class="fa fa-edit" style="width:10px;"></i></button></td>
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
         @include('Office.modal.modal')
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
            $('#office_desc').val(data[1]);
            $('#office_abbr').val(data[2]);
            $('#office_place').val(data[3]);
            $('#office_address').val(data[4]);
            $('#office_code').val(data[5]);
            $('#editForm').attr('action','/Office/'+data[0]);
        $('#editmodal').modal('show');
            
      });
  
  </script> 
<script>
	$(document).ready(function() {
	fetchtblOffice();
});
</script>
<script>

	//DATA TABLE
	$('#tblOffice').DataTable({
		responsive: true,
		"bLengthChange": false,
		"iDisplayLength": 5,
		"language": {
		  "emptyTable": "THERE IS NO AVAILABLE DATA FOR OFFICE IN THE DATABASE"
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
			},
			{
				"targets": [ 7 ],
				"visible": true,
				"searchable": true,
				"orderable": true
			}
		]
	});
	</script>
@endsection