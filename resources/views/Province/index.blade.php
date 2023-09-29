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
						<h4><b>LIST OF PROVINCE</b></h4>
						<div class="box-tools pull-right">
							<a href="#mdlAddProvince" data-toggle="modal" class="btn btn-primary btn-sm btn-flat clear_txt" style="margin-top:8px!important;"> NEW PROVINCE</a>
						</div>
					</div>
					<div class="box-body">
						<div id="container_province">
							<table id="tblProvince" class="table table-striped table-bordered" >
								<thead style="font-family:calibri;font-size:15px;">
									<th style="background:#367fa9;color:white;width:8%;">ID</th>
									<th style="background:#367fa9;color:white;width:58%;">PROVINCE</th>
									<th style="background:#367fa9;color:white;width:28%;">OFFICE</th>
									<th style="background:#367fa9;color:white;width:20%;">STATUS</th>
									<th style="background:#367fa9;color:white;width:2%;">EDIT</th>
								</thead>
								<tbody style="font-family:calibri;font-size:15px;">
                                    @foreach($Province as $item)
                                    <tr>
										<td style="width:8%;">{{$item->id}}</td>
									    <td style="width:50%;">{{$item->province_desc}}</td>
										<td style="width:28%;">{{$item->office->office_abbr}}</td>
										<td style="width:20%;">{{$item->status->status_desc}}</td>
										{{-- <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-id="{{ $item->id }}">Open Modal</a></td> --}}
										<td style="width:2%;"><button style="background:#367fa9;" class="button btn btn-success btn-sm editbtn btn-flat" value="{{$item->id}}"><i class="fa fa-edit" style="width:10px;"></i></button></td>
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
         @include('Province.modal.modal')
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
  
//   $(document).on('click','.editbtn',function(){
// 	$('#editmodal').modal('show');
  
  
  
//             $tr = $(this).closest('tr');
  
//             var data = $tr.children("td").map(function() {
//               return $(this).text();
//             }).get();
  
//             console.log(data);
  
//             $('#id').val(data[0]);
//             $('#province_desc').val(data[1]);
//             $('#editForm').attr('action','/Province/'+data[0]);
//         $('#editmodal').modal('show');
            
//     });

$(document).on('click', '.editbtn', function (e){
	e.preventDefault();
	var id = $(this).val();
	$('#editmodal').modal('show');
	//alert(id);

	$.ajax({
		type: "GET",
		url:"/edit-province/"+id,
		success: function (response) {
			if(response.status == 404)
			{
				alert(response.message);
				$('#editmodal').modal('hide');
			}
			else
			{
				$('#id').val(id);
				$('#province_desc').val(response.province.province_desc);
				$('#office_id').select2().val(response.province.office_id).trigger('change');
				$('#status_id').select2().val(response.province.status_id).trigger('change');
				$('#editForm').attr('action','/Province/'+id);
			}
		}
	});

});


  </script> 
<script>
	$(document).ready(function() {
		fetchtblProvince();
	});
</script>	
<script>
	$('#tblProvince').DataTable({
		responsive: true,
		"bLengthChange": false,
		"iDisplayLength": 10,
		"language": {
		  "emptyTable": "THERE IS NO AVAILABLE DATA FOR SHIP TYPE IN THE DATABASE"
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
			}
		]
	});
	</script>


@endsection