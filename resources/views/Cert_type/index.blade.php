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
						<h4><b>LIST OF CERTIFICATION TYPE</b></h4>
						<div class="box-tools pull-right">
							<a href="#mdlAddCertificateType" data-toggle="modal" class="btn btn-primary btn-sm btn-flat clear_txt" style="margin-top:8px!important;"> NEW CERTIFICATION TYPE</a>
						</div>
					</div>
					<div class="box-body">
						<div id="container_cert_type">
							<table id="tblCertificateType" class="table table-striped table-bordered" >
                                <thead style="font-family:calibri;font-size:15px;">
                                    <th style="background:#367fa9;color:white;width:10%;">ID</th>
                                    <th style="background:#367fa9;color:white;width:26%;">CERTIFICATE TYPE</th>
                                    <th style="background:#367fa9;color:white;width:22%;">CERTIFICATE ABBR</th>
                                    <th style="background:#367fa9;color:white;width:20%;">CERTIFICATE CODE</th>
                                    <th style="background:#367fa9;color:white;width:20%;">STATUS</th>
                                    <th style="background:#367fa9;color:white;width:2%;">EDIT</th>
                                </thead>
                                <tbody style="font-family:calibri;font-size:15px;">
                                    @foreach($Cert_type as $item)
                                    <tr>
                                        <td style="width:10%;">{{$item->id}}</td>
                                        <td style="width:26%;">{{$item->cert_type_desc}}</td>
                                        <td style="width:22%;">{{$item->cert_type_abbr}}</td>
                                        <td style="width:20%;">{{$item->certype_code}}</td>
                                        <td style="width:20%;">{{$item->status->status_desc}}</td>
                                        <td style="width:2%;"><button style="background:#367fa9;" class="button btn btn-success btn-sm updateCertificateType btn-flat editbtn" data-id="'.$row['cert_type_id'].'"><i class="fa fa-edit" style="width:10px;"></i></button></td>
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
         @include('Cert_type.modal.modal')
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
  
  $('#cert_type_abbr, #certificate_type_desc, #addtxtstatusdesc, #status_desc, #addtxtcertificatetypedesc, #addtxtcertificatetypeabbr, #cert_type_desc').keyup(function(){
  $(this).val($(this).val().toUpperCase());
});


  $(document).on('click','.editbtn',function(){
	$('#editmodal').modal('show');
            $tr = $(this).closest('tr');
  
            var data = $tr.children("td").map(function() {
              return $(this).text();
            }).get();
  
            console.log(data);
  
            $('#id').val(data[0]);
            $('#cert_type_desc').val(data[1]);
            $('#cert_type_abbr').val(data[2]);
            $('#cert_type_code').val(data[3]);
            $('#editForm').attr('action','/Cert_type/'+data[0]);
        $('#editmodal').modal('show');
            
      });
  
  </script> 
<script>
    //DATA TABLE
    $('#tblCertificateType').DataTable({
        responsive: true,
        "bLengthChange": false,
        "iDisplayLength": 10,
        "language": {
          "emptyTable": "THERE IS NO AVAILABLE DATA FOR CERTIFICATE TYPE IN THE DATABASE"
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
            }
        ]
    });
    </script>
<script>
$(document).ready(function() {
	fetchtblCertificateType();
});
</script>

@endsection