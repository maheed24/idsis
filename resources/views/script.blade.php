<!-- jQuery 3 -->
<script src="{{asset('libraries/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{asset('libraries/bootstrap/dist/css/bootstrap.min.css')}}">
<script src="{{asset('libraries/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('libraries/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('libraries/font-awesome/css/font-awesome.min.css')}}">
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('libraries/bootstrap-daterangepicker/daterangepicker.css')}}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('libraries/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('libraries/iCheck/all.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{asset('libraries/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{asset('libraries/timepicker/bootstrap-timepicker.min.css')}}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('libraries/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('libraries/select2/dist/css/select2.min.css')}}">
<script src="{{asset('libraries/select2/dist/js/select2.full.min.js')}}"></script>
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('public/css/dist/css/AdminLTE.min.css')}}">
<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{asset('public/css/dist/css/skins/_all-skins.min.css')}}">
<!-- DataTables -->
<script src="{{asset('libraries/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libraries/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('libraries/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('libraries/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/css/dist/js/adminlte.min.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<!-- Include Toastr JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>

//******************************************* STATUS SCRIPT ********************************************//

//STATUS TABLE
function fetchtblStatus(){
	$.ajax({
		url:'../../tables/admin/tbl_status.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_status").html(data);
		}
	});
}

//ADD NEW STATUS
$('#AddStatusForm').submit(function(e){
	e.preventDefault();
	var AddStatusForm = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/status.php',
		data: AddStatusForm,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddStatusForm').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_status_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddStatusForm')[0].reset();
				$('#add_status_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				$('#AddStatusForm')[0].reset();
				fetchtblStatus();
			}
			$('#AddStatusForm').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_status_msg').html('').empty;
	}, 5000);
});

//GET STATUS
function getRowStatus(status_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/status.php',
		data: {status_id:status_id, action:action},
		dataType: 'json',
		success: function(status){
			$('#updatetxtstatusid').val(status[0].status_id);
			$('#updatetxtstatusdesc').val(status[0].status_desc);
		}
	});
}

//VIEW STATUS MODAL
$(function(){
	$(document).on('click', '.updateDetails', function(e){
		e.preventDefault();
		var details_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateStatus').modal('show');
		getRowStatus(status_id, action);
	});
});

//UPDATE STATUS
$('#UpdateFormStatus').submit(function(e){
	e.preventDefault();
	var UpdateFormStatus = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/status.php',
		data: UpdateFormStatus,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormStatus').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_status_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_status_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormStatus')[0].reset();
				fetchtblStatus();
			}
			$('#UpdateFormStatus').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_status_msg').html('').empty;
	}, 5000);
});


//******************************************* CERTIFICATE TYPE SCRIPT ********************************************//

//CERTIFICATE TYPE TABLE
function fetchtblCertificateType(){
	$.ajax({
		url:'../../tables/admin/tbl_certificate_type.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_cert_type").html(data);
		}
	});
}

//ADD NEW CERTIFICATE TYPE
$('#AddFormCertificateType').submit(function(e){
	e.preventDefault();
	var AddFormCertificateType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/cert_type.php',
		data: AddFormCertificateType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormCertificateType').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_certificate_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormCertificateType')[0].reset();
				$('#add_certificate_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				$('#AddFormCertificateType')[0].reset();
				fetchtblCertificateType();
			}
			$('#AddFormCertificateType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_certificate_type_msg').html('').empty;
	}, 5000);
});

//GET CERTIFICATE TYPE
function getRowCertificateType(cert_type_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/cert_type.php',
		data: {cert_type_id:cert_type_id, action:action},
		dataType: 'json',
		success: function(cert_type){
			$('#updatetxtcertificatetypeid').val(cert_type[0].cert_type_id);
			$('#updatetxtcertificatetypedesc').val(cert_type[0].cert_type_desc);
			$('#updatetxtcertificatetypeabbr').val(cert_type[0].cert_type_abbr);
			$('#updatetxtcertificatetypecode').val(cert_type[0].cert_type_code);
			$('#updateddlstatusidcertificatetype').select2().val(cert_type[0].status_id).trigger('change');
		}
	});
}

//VIEW CERTIFICATE TYPE MODAL
$(function(){
	$(document).on('click', '.updateCertificateType', function(e){
		e.preventDefault();
		var cert_type_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateCertificateType').modal('show');
		getRowCertificateType(cert_type_id, action);
	});
});

//UPDATE CERTIFICATE TYPE
$('#UpdateFormCertificateType').submit(function(e){
	e.preventDefault();
	var UpdateFormCertificateType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/cert_type.php',
		data: UpdateFormCertificateType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormCertificateType').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_certificate_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_certificate_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblCertificateType();
			}
			$('#UpdateFormCertificateType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_certificate_type_msg').html('').empty;
	}, 5000);
});


//******************************************* HULL MATERIAL SCRIPT ********************************************//

//HULL MATERIAL TABLE
function fetchtblHullMaterial(){
	$.ajax({
		url:'../../tables/admin/tbl_hull_material.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_hull_material").html(data);
		}
	});
}

//ADD NEW HULL MATERIAL
$('#AddFormHullMaterial').submit(function(e){
	e.preventDefault();
	var AddFormHullMaterial = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/hull_material.php',
		data: AddFormHullMaterial,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormHullMaterial').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_hull_material_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormHullMaterial')[0].reset();
				$('#add_hull_material_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				$('#AddFormHullMaterial')[0].reset();
				fetchtblHullMaterial();
			}
			$('#AddFormHullMaterial').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_hull_material_msg').html('').empty;
	}, 5000);
});

//GET HULL MATERIAL
function getRowHullMaterial(hull_material_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/hull_material.php',
		data: {hull_material_id:hull_material_id, action:action},
		dataType: 'json',
		success: function(hull_material){
			$('#updatetxthullmaterialid').val(hull_material[0].hull_material_id);
			$('#updatextxhullmaterialdesc').val(hull_material[0].hull_material_desc);
			$('#updateddlstatusidhullmaterial').select2().val(hull_material[0].status_id).trigger('change');
		}
	});
}

//VIEW CERTIFICATE TYPE MODAL
$(function(){
	$(document).on('click', '.updateHullMaterial', function(e){
		e.preventDefault();
		var hull_material_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateHullMaterial').modal('show');
		getRowHullMaterial(hull_material_id, action);
	});
});

//UPDATE CERTIFICATE TYPE
$('#UpdateFormHullMaterial').submit(function(e){
	e.preventDefault();
	var UpdateFormHullMaterial = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/hull_material.php',
		data: UpdateFormHullMaterial,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormHullMaterial').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_hull_material_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_hull_material_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblHullMaterial();
			}
			$('#UpdateFormHullMaterial').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_hull_material_msg').html('').empty;
	}, 5000);
});


//******************************************* SHIP CLASSIFICATION SCRIPT ********************************************//

//SHIP CLASSIFICATION TABLE
function fetchtblShipClassification(){
	$.ajax({
		url:'../../tables/admin/tbl_ship_classification.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_ship_classification").html(data);
		}
	});
}

//ADD NEW SHIP CLASSIFICATION
$('#AddFormShipClassification').submit(function(e){
	e.preventDefault();
	var AddFormShipClassification = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/ship_classification.php',
		data: AddFormShipClassification,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormShipClassification').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_ship_classification_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormShipClassification')[0].reset();
				$('#add_ship_classification_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				$('#AddFormShipClassification')[0].reset();
				fetchtblShipClassification();
			}
			$('#AddFormShipClassification').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_ship_classification_msg').html('').empty;
	}, 5000);
});

//GET SHIP CLASSIFICATION
function getRowShipClassification(ship_classification_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/ship_classification.php',
		data: {ship_classification_id:ship_classification_id, action:action},
		dataType: 'json',
		success: function(ship_classification){
			$('#updatetxtshipclassificationid').val(ship_classification[0].ship_classification_id);
			$('#updatetxtshipclassificationdesc').val(ship_classification[0].ship_classification_desc);
			$('#updateddlstatusidshipclassification').select2().val(ship_classification[0].status_id).trigger('change');
		}
	});
}

//VIEW CERTIFICATE TYPE MODAL
$(function(){
	$(document).on('click', '.updateShipClassification', function(e){
		e.preventDefault();
		var ship_classification_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateShipClassification').modal('show');
		getRowShipClassification(ship_classification_id, action);
	});
});

//UPDATE CERTIFICATE TYPE
$('#UpdateFormShipClassification').submit(function(e){
	e.preventDefault();
	var UpdateFormShipClassification = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/ship_classification.php',
		data: UpdateFormShipClassification,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormShipClassification').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_ship_classification_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_ship_classification_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblShipClassification();
			}
			$('#UpdateFormShipClassification').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_ship_classification_msg').html('').empty;
	}, 5000);
});


//******************************************* SHIP TYPE SCRIPT ********************************************//

//SHIP TYPE TABLE
function fetchtblShipType(){
	$.ajax({
		url:'../../tables/admin/tbl_ship_type.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_ship_type").html(data);
		}
	});
}

//ADD NEW SHIP TYPE
$('#AddFormShipType').submit(function(e){
	e.preventDefault();
	var AddFormShipType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/ship_type.php',
		data: AddFormShipType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormShipType').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_ship_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormShipType')[0].reset();
				$('#add_ship_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				$('#AddFormShipType')[0].reset();
				fetchtblShipType();
			}
			$('#AddFormShipType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_ship_type_msg').html('').empty;
	}, 5000);
});

//GET SHIP TYPE
function getRowShipType(ship_type_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/ship_type.php',
		data: {ship_type_id:ship_type_id, action:action},
		dataType: 'json',
		success: function(ship_type){
			$('#updatetxtshiptypeid').val(ship_type[0].ship_type_id);
			$('#updatetxtshiptypedesc').val(ship_type[0].ship_type_desc);
			$('#updateddlstatusidshiptype').select2().val(ship_type[0].status_id).trigger('change');
		}
	});
}

//VIEW CERTIFICATE TYPE MODAL
$(function(){
	$(document).on('click', '.updateShipType', function(e){
		e.preventDefault();
		var ship_type_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateShipType').modal('show');
		getRowShipType(ship_type_id, action);
	});
});

//UPDATE CERTIFICATE TYPE
$('#UpdateFormShipType').submit(function(e){
	e.preventDefault();
	var UpdateFormShipType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/ship_type.php',
		data: UpdateFormShipType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormShipType').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_ship_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_ship_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblShipType();
			}
			$('#UpdateFormShipType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_ship_type_msg').html('').empty;
	}, 5000);
});


//******************************************* STEM TYPE SCRIPT ********************************************//

//STEM TYPE TABLE
function fetchtblStemType(){
	$.ajax({
		url:'../../tables/admin/tbl_stem_type.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_stem_type").html(data);
		}
	});
}

//ADD NEW STEM TYPE
$('#AddFormStemType').submit(function(e){
	e.preventDefault();
	var AddFormStemType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/stem_type.php',
		data: AddFormStemType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormStemType').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_stem_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormStemType')[0].reset();
				$('#add_stem_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				$('#AddFormStemType')[0].reset();
				fetchtblStemType();
			}
			$('#AddFormStemType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_stem_type_msg').html('').empty;
	}, 5000);
});

//GET STEM TYPE
function getRowStemType(stem_type_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/stem_type.php',
		data: {stem_type_id:stem_type_id, action:action},
		dataType: 'json',
		success: function(stem_type){
			$('#updatetxtstemtypeid').val(stem_type[0].stem_type_id);
			$('#updatetxtstemtypedesc').val(stem_type[0].stem_type_desc);
			$('#updateddlstatusidstemtype').select2().val(stem_type[0].status_id).trigger('change');
		}
	});
}

//VIEW STEM TYPE MODAL
$(function(){
	$(document).on('click', '.updateStemType', function(e){
		e.preventDefault();
		var stem_type_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateStemType').modal('show');
		getRowStemType(stem_type_id, action);
	});
});

//UPDATE STEM TYPE
$('#UpdateFormStemType').submit(function(e){
	e.preventDefault();
	var UpdateFormStemType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/stem_type.php',
		data: UpdateFormStemType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormStemType').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_stem_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_stem_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblStemType();
			}
			$('#UpdateFormStemType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_stem_type_msg').html('').empty;
	}, 5000);
});


//******************************************* STERN TYPE SCRIPT ********************************************//

//STERN TYPE TABLE
function fetchtblSternType(){
	$.ajax({
		url:'../../tables/admin/tbl_stern_type.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_stern_type").html(data);
		}
	});
}

//ADD NEW STERN TYPE
$('#AddFormSternType').submit(function(e){
	e.preventDefault();
	var AddFormSternType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/stern_type.php',
		data: AddFormSternType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormSternType').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_stern_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormSternType')[0].reset();
				$('#add_stern_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				$('#AddFormSternType')[0].reset();
				fetchtblSternType();
			}
			$('#AddFormSternType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_stern_type_msg').html('').empty;
	}, 5000);
});

//GET STERN TYPE
function getRowSternType(stern_type_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/stern_type.php',
		data: {stern_type_id:stern_type_id, action:action},
		dataType: 'json',
		success: function(stern_type){
			$('#updatetxtsterntypeid').val(stern_type[0].stern_type_id);
			$('#updatetxtsterntypedesc').val(stern_type[0].stern_type_desc);
			$('#updateddlstatusidsterntype').select2().val(stern_type[0].status_id).trigger('change');
		}
	});
}

//VIEW STEM TYPE MODAL
$(function(){
	$(document).on('click', '.updateSternType', function(e){
		e.preventDefault();
		var stern_type_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateSternType').modal('show');
		getRowSternType(stern_type_id, action);
	});
});

//UPDATE STERN TYPE
$('#UpdateFormSternType').submit(function(e){
	e.preventDefault();
	var UpdateFormSternType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/stern_type.php',
		data: UpdateFormSternType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormSternType').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_stern_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_stern_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblSternType();
			}
			$('#UpdateFormSternType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_stern_type_msg').html('').empty;
	}, 5000);
});


//******************************************* TRADING AREA SCRIPT ********************************************//

//TRADING AREA TABLE
function fetchtblTradingArea(){
	$.ajax({
		url:'../../tables/admin/tbl_trading_area.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_trading_area").html(data);
		}
	});
}

//ADD NEW TRADING AREA
$('#AddFormTradingArea').submit(function(e){
	e.preventDefault();
	var AddFormTradingArea = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/trading_area.php',
		data: AddFormTradingArea,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormTradingArea').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_trading_area_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormTradingArea')[0].reset();
				$('#add_trading_area_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				fetchtblTradingArea();
			}
			$('#AddFormTradingArea').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_trading_area_msg').html('').empty;
	}, 5000);
});

//GET STERN TYPE
function getRowSternType(stern_type_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/stern_type.php',
		data: {stern_type_id:stern_type_id, action:action},
		dataType: 'json',
		success: function(stern_type){
			$('#updatetxtsterntypeid').val(stern_type[0].stern_type_id);
			$('#updatetxtsterntypedesc').val(stern_type[0].stern_type_desc);
			$('#updateddlstatusidsterntype').select2().val(stern_type[0].status_id).trigger('change');
		}
	});
}

//VIEW STEM TYPE MODAL
$(function(){
	$(document).on('click', '.updateSternType', function(e){
		e.preventDefault();
		var stern_type_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateSternType').modal('show');
		getRowSternType(stern_type_id, action);
	});
});

//UPDATE STERN TYPE
$('#UpdateFormSternType').submit(function(e){
	e.preventDefault();
	var UpdateFormSternType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/stern_type.php',
		data: UpdateFormSternType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormSternType').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_stern_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_stern_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblSternType();
			}
			$('#UpdateFormSternType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_stern_type_msg').html('').empty;
	}, 5000);
});


//******************************************* SHIP CLASSIFICATION TYPE SCRIPT ********************************************//

//SHIP CLASSIFICATION TYPE TABLE
function fetchtblShipClassificationType(){
	$.ajax({
		url:'../../tables/admin/tbl_ship_classification_type.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_ship_classification_type").html(data);
		}
	});
}

//ADD NEW SHIP CLASSIFICATION TYPE
$('#AddFormShipClassificationType').submit(function(e){
	e.preventDefault();
	var AddFormShipClassificationType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/ship_classification_type.php',
		data: AddFormShipClassificationType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormShipClassificationType').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_ship_classification_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormShipClassificationType')[0].reset();
				$('#add_ship_classification_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				fetchtblShipClassificationType();
			}
			$('#AddFormShipClassificationType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_ship_classification_type_msg').html('').empty;
	}, 5000);
});

//GET SHIP CLASSIFICATION TYPE
function getRowShipClassificationType(ship_classification_type_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/ship_classification_type.php',
		data: {ship_classification_type_id:ship_classification_type_id, action:action},
		dataType: 'json',
		success: function(ship_classification_type){
			$('#updatetxtshipclassificationtypeid').val(ship_classification_type[0].ship_classification_type_id);
			$('#updateddlshipclassificationid').select2().val(ship_classification_type[0].ship_classification_id).trigger('change');
			$('#updateddlshiptypeid').select2().val(ship_classification_type[0].ship_type_id).trigger('change');
			$('#updateddlstatusidshipclassificationtype').select2().val(ship_classification_type[0].status_id).trigger('change');
		}
	});
}

//VIEW STEM TYPE MODAL
$(function(){
	$(document).on('click', '.updateShipClassifcationType', function(e){
		e.preventDefault();
		var ship_classification_type_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateShipClassificationType').modal('show');
		getRowShipClassificationType(ship_classification_type_id, action);
	});
});

//UPDATE SHIP CLASSIFICATION TYPE
$('#UpdateFormShipClassificationType').submit(function(e){
	e.preventDefault();
	var UpdateFormShipClassificationType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/ship_classification_type.php',
		data: UpdateFormShipClassificationType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormShipClassificationType').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#update_ship_classification_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#update_ship_classification_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblShipClassificationType();
			}
			$('#UpdateFormShipClassificationType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#update_ship_classification_type_msg').html('').empty;
	}, 5000);
});


//******************************************* OFFICE SCRIPT ********************************************//

//OFFICE TABLE
function fetchtblOffice(){
	$.ajax({
		url:'../../tables/admin/tbl_office.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_office").html(data);
		}
	});
}

//ADD NEW SHIP CLASSIFICATION TYPE
$('#AddFormOffice').submit(function(e){
	e.preventDefault();
	var AddFormOffice = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/office.php',
		data: AddFormOffice,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormOffice').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_office_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormOffice')[0].reset();
				$('#add_office_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				fetchtblSOffice();
			}
			$('#AddFormOffice').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_office_msg').html('').empty;
	}, 5000);
});

//GET OFFICE
function getRowOffice(office_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/office.php',
		data: {office_id:office_id, action:action},
		dataType: 'json',
		success: function(office){
			$('#updatetxtofficeid').val(office[0].office_id);
			$('#updatetxtofficedesc').val(office[0].office_desc);
			$('#updatetxtofficecode').val(office[0].office_code);
			$('#updatetxtofficeabbr').val(office[0].office_abbr);
			$('#updatetxtofficeplace').val(office[0].office_place);
			$('#updatetxtofficeaddress').val(office[0].office_address);
			$('#updateddlstatusidoffice').select2().val(office[0].status_id).trigger('change');
		}
	});
}

//VIEW STEM TYPE MODAL
$(function(){
	$(document).on('click', '.updateOffice', function(e){
		e.preventDefault();
		var office_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateOffice').modal('show');
		getRowOffice(office_id, action);
	});
});

//UPDATE OFFICE
$('#UpdateFormOffice').submit(function(e){
	e.preventDefault();
	var UpdateFormOffice = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/office.php',
		data: UpdateFormOffice,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormOffice').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_office_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_office_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblOffice();
			}
			$('#UpdateFormOffice').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_office_msg').html('').empty;
	}, 5000);
});


//******************************************* USER TYPE SCRIPT ********************************************//

//USER TYPE TABLE
function fetchtblUserType(){
	$.ajax({
		url:'../../tables/admin/tbl_user_type.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_user_type").html(data);
		}
	});
}

//ADD NEW USER TYPE
$('#AddFormUserType').submit(function(e){
	e.preventDefault();
	var AddFormUserType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/user_type.php',
		data: AddFormUserType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormUserType').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_user_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormUserType')[0].reset();
				$('#add_user_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				fetchtbUserType();
			}
			$('#AddFormUserType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_user_type_msg').html('').empty;
	}, 5000);
});

//GET USER TYPE
function getRowUserType(user_type_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/user_type.php',
		data: {user_type_id:user_type_id, action:action},
		dataType: 'json',
		success: function(user_type){
			$('#updatetxtusertypeid').val(user_type[0].user_type_id);
			$('#updatextusertypedesc').val(user_type[0].user_type_desc);
			$('#updateddlstatusidusertype').select2().val(user_type[0].status_id).trigger('change');
		}
	});
}

//VIEW USER TYPE MODAL
$(function(){
	$(document).on('click', '.updateUserType', function(e){
		e.preventDefault();
		var user_type_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateUserType').modal('show');
		getRowUserType(user_type_id, action);
	});
});

//UPDATE USER TYPE
$('#UpdateFormUserType').submit(function(e){
	e.preventDefault();
	var UpdateFormUserType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/user_type.php',
		data: UpdateFormUserType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormUserType').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_user_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_user_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblHullMaterial();
			}
			$('#UpdateFormUserType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_user_type_msg').html('').empty;
	}, 5000);
});


//******************************************* USER SCRIPT ********************************************//

//USER TABLE
function fetchtblUser(){
	$.ajax({
		url:'../../tables/admin/tbl_user.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_user").html(data);
		}
	});
}


//ADD NEW USER
$('#btnAddUser').click(function(){
	var last_name 						= 	$('#addtxtlastname').val();
	var first_name 						= 	$('#addtxtfirstname').val();
	var middle_initial 					= 	$('#addtxtmiddleinitial').val();
	var suffix 							= 	$('#addtxtsuffix').val();
	var email_address 					= 	$('#addtxtemailaddress').val();
	var office_id 						= 	$('#addddlofficeuser').val();
	var user_type_id 					= 	$('#addddlusertypeiduser').val();
	var action							=	'add';
	
	$('#btnAddUser').prop('disabled', true);
	
	if(last_name!='' && first_name!=''  && email_address!=''){
		$.ajax({
			type: 'POST',
			url:  '../../command/admin/user.php',
			data: {user_type_id:user_type_id, office_id:office_id, email_address:email_address, suffix:suffix, last_name:last_name, first_name:first_name, middle_initial:middle_initial, action:action},
			success:function(user){
				alert(user);
				$('#btnAddUser').prop('disabled', false);
				if (user == 'error'){
					$('#add_user_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Email Address/Name is already exist. </div>"));
				}
				else{
					fetchtblUser();
					$('.clear').val('');
					$('.select2').select2().val('').trigger('change');
					$('#add_user_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Email Address: <b>" + email_address + "</b> has been successfully saved. </div>"));
				}
			},
            error: function(err) {
				$('#add_user_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>" + err + "</b> </div>"));
            }
		});
		setInterval(function(){
			$('#add_user_msg').html('').empty;
		}, 5000);
	}
	else{
		$('#add_user_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Please fill out the required fields. </div>"));
	}	
});

//GET USER
function getRowUser(user_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/user.php',
		data: {user_id:user_id, action:action},
		dataType: 'json',
		success: function(user){
			$('#updatetxtuserid').val(user[0].user_id);
			$('#updatetxtlastname').val(user[0].last_name);
			$('#updatetxtfirstname').val(user[0].first_name);
			$('#updatetxtmiddleinitial').val(user[0].middle_initial);
			$('#updatetxtsuffix').val(user[0].suffix);
			//$('#updatetxtusername').val(user[0].username);
			$('#updatetxtemailaddress').val(user[0].email_address);
			$('#updateddlofficeuser').select2().val(user[0].office_id).trigger('change');
			$('#updateddlusertypeiduser').select2().val(user[0].user_type_id).trigger('change');
			$('#updateddlstatusiduser').select2().val(user[0].status_id).trigger('change');
			
		}
	});
}

//GET THE SECTOR OF THE USER
function getUserSector(user_id){
	$.ajax({
		type:	'POST',
		url:	'../../command/admin/sector_get.php',
		data:	{user_id:user_id},
		success: function (result) {
			$("#updateddlsectoriduser").html(result);
		}
	});
}

//VIEW USER MODAL
$(function(){
	$(document).on('click', '.updateUser', function(e){
		e.preventDefault();
		var user_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateUser').modal('show');
		getRowUser(user_id, action);
		getUserSector(user_id);
	});
});


//UPDATE NEW USER
$('#btnUpdateUser').click(function(){
	var user_id 						= 	$('#updatetxtuserid').val();
	var last_name 						= 	$('#updatetxtlastname').val();
	var first_name 						= 	$('#updatetxtfirstname').val();
	var middle_initial 					= 	$('#updatetxtmiddleinitial').val();
	var suffix 							= 	$('#updatetxtsuffix').val();
	//var username						= 	$('#updatetxtusername').val();
	var email_address 					= 	$('#updatetxtemailaddress').val();
	var user_type_id 					= 	$('#updateddlusertypeiduser').val();
	var office_id					 	= 	$('#updateddlofficeuser').val();
	var status_id 						= 	$('#updateddlstatusiduser').val();
	var sector_id 						= 	$('#updateddlsectoriduser').val();
	var action							=	'update';
	
	$('#btnUpdateUser').prop('disabled', true);
	
	if(last_name!='' && first_name!='' && email_address!=''){
		$.ajax({
			type: 'POST',
			url:  '../../command/admin/user.php',
			data: {sector_id:sector_id, user_type_id:user_type_id, status_id:status_id, user_id:user_id, office_id:office_id, email_address:email_address, suffix:suffix, last_name:last_name, first_name:first_name, middle_initial:middle_initial, action:action},
			success:function(user){
				$('#btnUpdateUser').prop('disabled', false);
				if (user == 'error'){
					$('#update_user_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Email Address or Username is already exist. </div>"));
				}
				else{
					fetchtblUser();
					$('#update_user_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Email Address: <b>" + email_address + "</b> has been successfully saved. </div>"));
				}
			},
            error: function(err) {
				$('#update_user_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>" + err + "</b> </div>"));
            }
		});
		setInterval(function(){
			$('#update_user_msg').html('').empty;
		}, 5000);
	}
	else{
		$('#update_user_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Please fill out the required fields. </div>"));
	}	
});


$(function(){
	$(document).on('click', '.resetUser', function(e){
		var email_address 		= $(this).data('emailaddress');
		var user_id 			= $(this).data('id');
		
		$("#mdlConfirmation").modal("show");
		$("#container_reset").empty();
		$("#container_reset").html("Do you really want to reset " + email_address + " user?");
		
		$("#updatetxtuseridreset").val(user_id);
		$("#updatetxtemailaddressreset").val(email_address);
		if(user_id == ""){
			$(".atap").show();
			$(".user").hide();
		}
		else{
			$(".atap").hide();
			$(".user").show();
		}
		
	});
});


//RESET USER
$('#btnUserReset').click(function(){
	var user_id 				= 	$('#updatetxtuseridreset').val();
	var email_address			=	$("#updatetxtemailaddressreset").val();
	var action					=	'reset';
	$('#btnUserReset').prop("disabled", true);
	
	if(user_id!=''){
		$.ajax({
			type: 'POST',
			url:  '../../command/admin/user.php',
			data: {email_address:email_address, user_id:user_id, action:action},
			success:function(code){
				$('#btnUserReset').prop("disabled", false);
				$("#mdlConfirmation").modal("show");
				$("#container_reset").html("Password has been reset.");
				$('.user').hide();
				$('.atap').show();
				
				alert(code);
			},
            error: function(err) {
				$('#add_user_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>" + err + "</b> </div>"));
            }
		});
		setInterval(function(){
			$('#add_user_msg').html('').empty;
		}, 5000);
	}
	else{
		$('#add_user_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> Please fill out the required fields. </div>"));
	}	
});


//******************************************* RIG TYPE SCRIPT ********************************************//

//RIG TYPE TABLE
function fetchtblRigType(){
	$.ajax({
		url:'../../tables/admin/tbl_rig_type.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_rig_type").html(data);
		}
	});
}


//ADD NEW RIG TYPE
$('#AddFormRigType').submit(function(e){
	e.preventDefault();
	var AddFormRigType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/rig_type.php',
		data: AddFormRigType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormRigType').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_rig_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormRigType')[0].reset();
				$('#add_rig_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				fetchtblRigType();
			}
			$('#AddFormRigType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_rig_type_msg').html('').empty;
	}, 5000);
});

//GET RIG TYPE
function getRowRigType(rig_type_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/rig_type.php',
		data: {rig_type_id:rig_type_id, action:action},
		dataType: 'json',
		success: function(rig_type){
			$('#updatetxtrigtypeid').val(rig_type[0].rig_type_id);
			$('#updatextxrigtypedesc').val(rig_type[0].rig_type_desc);
			$('#updateddlstatusidrigtype').select2().val(rig_type[0].status_id).trigger('change');
		}
	});
}

//VIEW RIG TYPE MODAL
$(function(){
	$(document).on('click', '.updateRigType', function(e){
		e.preventDefault();
		var rig_type_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateRigType').modal('show');
		getRowRigType(rig_type_id, action);
	});
});

//UPDATE RIG TYPE
$('#UpdateFormRigType').submit(function(e){
	e.preventDefault();
	var UpdateFormRigType = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/rig_type.php',
		data: UpdateFormRigType,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormRigType').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_rig_type_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_rig_type_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblRigType();
			}
			$('#UpdateFormRigType').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_rig_type_msg').html('').empty;
	}, 5000);
});


//******************************************* OPERATION SCRIPT ********************************************//

//OPERATION TABLE
function fetchtblOperation(){
	$.ajax({
		url:'../../tables/admin/tbl_operation.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_operation").html(data);
		}
	});
}


//ADD NEW OPERATION
$('#AddFormOperation').submit(function(e){
	e.preventDefault();
	var AddFormOperation = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/operation.php',
		data: AddFormOperation,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormOperation').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_operation_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormOperation')[0].reset();
				$('#add_operation_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				$('#AddFormOperation')[0].reset();
				fetchtblOperation();
			}
			$('#AddFormOperation').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_operation_msg').html('').empty;
	}, 5000);
});


//GET OPERATION
function getRowOperation(operation_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/operation.php',
		data: {operation_id:operation_id, action:action},
		dataType: 'json',
		success: function(operation){
			$('#updatetxtoperationid').val(operation[0].operation_id);
			$('#updatextxoperationdesc').val(operation[0].operation_desc);
			$('#updateddlstatusidoperation').select2().val(operation[0].status_id).trigger('change');
		}
	});
}

//VIEW RIG TYPE MODAL
$(function(){
	$(document).on('click', '.updateOperation', function(e){
		e.preventDefault();
		var operation_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateOperation').modal('show');
		getRowOperation(operation_id, action);
	});
});


//UPDATE OPERATION
$('#UpdateFormOperation').submit(function(e){
	e.preventDefault();
	var UpdateFormOperation = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/operation.php',
		data: UpdateFormOperation,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormOperation').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_operation_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_operation_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblOperation();
			}
			$('#UpdateFormOperation').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_operation_msg').html('').empty;
	}, 5000);
});


//******************************************* PROVINCE SCRIPT ********************************************//

//PROVINCE TABLE
function fetchtblProvince(){
	$.ajax({
		url:'../../tables/admin/tbl_province.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_province").html(data);
		}
	});
}


//ADD NEW PROVINCE
$('#AddFormProvince').submit(function(e){
	e.preventDefault();
	var AddFormProvince = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/province.php',
		data: AddFormProvince,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormProvince').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_province_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormProvince')[0].reset();
				$('.select2').select2().val('').trigger('change');
				$('#add_province_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				fetchtblProvince();
			}
			$('#AddFormProvince').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_province_msg').html('').empty;
	}, 5000);
});


//GET PROVINCE
function getRowProvince(province_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/province.php',
		data: {province_id:province_id, action:action},
		dataType: 'json',
		success: function(province){
			$('#updatetxtprovinceid').val(province[0].province_id);
			$('#updatextxprovincedesc').val(province[0].province_desc);
			$('#updateddlofficeidprovince').select2().val(province[0].office_id).trigger('change');
			$('#updateddlstatusidprovince').select2().val(province[0].status_id).trigger('change');
		}
	});
}

//VIEW RIG TYPE MODAL
$(function(){
	$(document).on('click', '.updateProvince', function(e){
		e.preventDefault();
		var province_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateProvince').modal('show');
		getRowProvince(province_id, action);
	});
});


//UPDATE PROVINCE
$('#UpdateFormProvince').submit(function(e){
	e.preventDefault();
	var UpdateFormProvince = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/province.php',
		data: UpdateFormProvince,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormProvince').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_province_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_province_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblProvince();
			}
			$('#UpdateFormProvince').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_province_msg').html('').empty;
	}, 5000);
});


//******************************************* CITY/MUNICIPALITY SCRIPT ********************************************//

//CITY/MUNICIPALITY TABLE
function fetchtblCityMunicipality(){
	$.ajax({
		url:'../../tables/admin/tbl_city_municipality.php',
		type:'GET',
		cache: false,
		beforeSend: function(){
			$('#divLoading').show();
			$('.box').hide();
			$('.box-tools').hide();
		},
		complete: function(){
			$('#divLoading').hide();
			$('.box').show();
			$('.box-tools').show();
		},
		success:function(data){
			$("#container_city_municipality").html(data);
		}
	});
}


//ADD NEW CITY/MUNICIPALITY
$('#AddFormCityMunicipality').submit(function(e){
	e.preventDefault();
	var AddFormCityMunicipality = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/city_municipality.php',
		data: AddFormCityMunicipality,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormCityMunicipality').css("opacity",".5");
        },
		success: function(output){
			if(output.error){
				$('#add_city_municipality_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message +  "</div>"));
			}
			else{
				$('#AddFormCityMunicipality')[0].reset();
				$('.select2').select2().val('').trigger('change');
				$('#add_city_municipality_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + output.message + " </div>"));
				fetchtblProvince();
			}
			$('#AddFormCityMunicipality').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_city_municipality_msg').html('').empty;
	}, 5000);
});


//GET CITY/MUNICIPALITY
function getRowCityMunicipality(city_municipality_id, action){
	$.ajax({
		type: 'POST',
		url: '../../command/admin/city_municipality.php',
		data: {city_municipality_id:city_municipality_id, action:action},
		dataType: 'json',
		success: function(city_municipality){
			$('#updatetxtcitymunicipalityid').val(city_municipality[0].city_municipality_id);
			$('#updatetxtcitymunicipalitydesc').val(city_municipality[0].city_municipality_desc);
			$('#updateddlprovinceidcitymunicipality').select2().val(city_municipality[0].province_id).trigger('change');
			$('#updateddlstatusidcitymunicipality').select2().val(city_municipality[0].status_id).trigger('change');
		}
	});
}

//VIEW CITY/MUNICIPALITY MODAL
$(function(){
	$(document).on('click', '.updateCityMunicipality', function(e){
		e.preventDefault();
		var city_municipality_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateCityMunicipality').modal('show');
		getRowCityMunicipality(city_municipality_id, action);
	});
});


//UPDATE CITY/MUNICIPALITY
$('#UpdateFormCityMunicipality').submit(function(e){
	e.preventDefault();
	var UpdateFormCityMunicipality = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/admin/city_municipality.php',
		data: UpdateFormCityMunicipality,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormCityMunicipality').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#edit_city_municipality_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#edit_city_municipality_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormCertificateType')[0].reset();
				fetchtblCityMunicipality();
			}
			$('#UpdateFormCityMunicipality').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#edit_city_municipality_msg').html('').empty;
	}, 5000);
});

// //ONCHANGE SHIP CLASSIFICATION
// $("#addddlshipclassificationid").on('change', function(){
	// var ship_classification_id = $(this).val();
	// alert(ship_classification_id);
	// $.ajax({
		// type:	'POST',
		// url:	'../../command/admin/ship_classification_type_get.php',
		// data:	{ship_classification_id:ship_classification_id},
		// success: function (result) {
			// $("#addddlshiptypeid").html(result);
		// }
	// });
// });


var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};



$("#addddlcategory").change(function(){
    var category_id = $(this).val();
	
	if(category_id == 1){
		$('.ship_type').show();
	}
	else{
		$('.ship_type').hide();
	}
});

$(function(){
	/** add active class and stay opened when selected */
	var url = window.location;

	// for sidebar menu entirely but not cover treeview
	$('ul.sidebar-menu a').filter(function() {
	    return this.href == url;
	}).parent().addClass('active');

	// for treeview
	$('ul.treeview-menu a').filter(function() {
	    return this.href == url;
	}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});


$(document).ready(function() {
    var url = window.location; 
    var element = $('ul.sidebar-menu a').filter(function() {
	return this.href == url || url.href.indexOf(this.href) == 0; }).parent().addClass('active');
    if (element.is('li')) { 
        element.addClass('active').parent().parent('li').addClass('active')
    }
});


$(function () {
	$('.select2').select2()
});

$('#txtlastname','#addtxtfirstname','#addtxtmiddleinitial','#addtxtsuffix','#city_municipality_desc, #addtxtcitymunicipalitydesc, #province_desc, #addtxtprovincedesc, #addtxtoperationdesc, #operation_desc, #addtxtrigtypedesc, #rig_type_desc, #updatextusertypedesc, #addtxtusertypedesc, #office_desc, #office_abbr, #office_place, #addtxtofficedesc, #addtxtofficeabbr, #addtxtofficeplace, #addtxttradingareadesc, #stern_type_desc, #addtxtsterntypedesc, #addtxtstemtypedesc, #stem_type_desc, #addtxtshiptypedesc, #ship_type_desc, #addtxtshipclassificationdesc, #ship_classification_desc, #addtxthullmaterialdesc, #hullmaterial_desc, #cert_type_abbr, #certificate_type_desc, #addtxtstatusdesc, #status_desc, #addtxtcertificatetypedesc, #addtxtcertificatetypeabbr, #cert_type_desc').keyup(function(){
  $(this).val($(this).val().toUpperCase());
});
</script>