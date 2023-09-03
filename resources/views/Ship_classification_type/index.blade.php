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
						<h4><b>LIST OF SHIP CLASSIFICATION TYPE</b></h4>
						<div class="box-tools pull-right">
							<a href="#mdlAddShipClassification" data-toggle="modal" class="btn btn-primary btn-sm btn-flat clear_txt" style="margin-top:8px!important;"> NEW SHIP CLASSIFICATION</a>
						</div>
					</div>
					<div class="box-body">
						<div id="container_cert_type">
							<table id="tblShipClassification" class="table table-striped table-bordered" >
								<thead style="font-family:calibri;font-size:15px;">
									<th style="background:#367fa9;color:white;width:10%;">ID</th>
									<th style="background:#367fa9;color:white;width:39%;">SHIP CLASSIFICATION</th>
									<th style="background:#367fa9;color:white;width:39%;">SHIP TYPE</th>
									<th style="background:#367fa9;color:white;width:20%;">STATUS</th>
									<th style="background:#367fa9;color:white;width:2%;">EDIT</th>
								</thead>
								<tbody style="font-family:calibri;font-size:15px;">
                                    @foreach($Ship_classification_type as $item)
                                    <tr>
										<td style="width:10%;">{{$item->id}}</td>
										<td style="width:39%;">{{$item->Ship_classification[0]->ship_classification_desc}}</td>
										<td style="width:39%;">{{$item->Ship_type[0]->ship_type_desc}}</td>
										<td style="width:20%;">{{$item->status->status_desc}}</td>
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
         @include('Ship_classification_type.modal.modal')
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->
     @include('script')
</body>
<script>
  
//   $(document).on('click','.editbtn',function(){
// 	$('#editmodal').modal('show');
//             $tr = $(this).closest('tr');
  
//             var data = $tr.children("td").map(function() {
//               return $(this).text();
//             }).get();
  
//             console.log(data);
  
//             $('#id').val(data[0]);
//             $('#ship_classification_desc').val(data[1]);
//             $('#ship_type_desc').select().val(data[2]);
//             $('#editForm').attr('action','/Ship_classification_type/'+data[0]);
//         $('#editmodal').modal('show');
            
//       });

$(document).on('click', '.editbtn', function (e){
	e.preventDefault();
	var id = $(this).val();
	$('#editmodal').modal('show');
	//alert(id);

	$.ajax({
		type: "GET",
		url:"/edit-ship/"+id,
		success: function (response) {
			if(response.status == 404)
			{
				alert(response.message);
				$('#editmodal').modal('hide');
			}
			else
			{
				$('#id').val(id);
				$('#ship_classification_id').select2().val(response.ship_classification_type.ship_classification_id).trigger('change');
				$('#ship_type_desc').select2().val(response.ship_classification_type.ship_type_id).trigger('change');
				$('#status_id').select2().val(response.ship_classification_type.status_id).trigger('change');
				$('#editForm').attr('action','/Ship_classification_type/'+id);
			}
		}
	});

});



// $(function(){
//   $('.editbtn').click(function(e){
//     e.preventDefault();
//     $('#editmodal').modal('show');
//     var id = $(this).data('id');
//     getRow(id);
//   });

//   $('.delete').click(function(e){
//     e.preventDefault();
//     $('#delete').modal('show');
//     var id = $(this).data('id');
//     getRow(id);
//   });

//   $('.photo').click(function(e){
//     e.preventDefault();
//     var id = $(this).data('id');
//     getRow(id);
//   });

// });


// function getRow(id){
//   $.ajax({
//     type: 'POST',
//     url: "Ship_classification_type.show",
//     data: {id:id},
//     dataType: 'json',
//     success: function(response){
//       $('#id').val(response.id);     
//       $('#updateddlshipclassificationid').val(response.ship_classification_id).html(response.ship_classification_desc);
//       $('#ship_type_desc').val(response.ship_type_id).html(response.ship_type_id);
//       $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
//     }
//   });
// }

  </script> 
<script>
	$(document).ready(function() {
		fetchtblShipClassification();
	});
</script>
<script>
	$('#tblShipClassification').DataTable({
		responsive: true,
		"bLengthChange": false,
		"iDisplayLength": 10,
		"language": {
		  "emptyTable": "THERE IS NO AVAILABLE DATA FOR SHIP CLASSIFICATION IN THE DATABASE"
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