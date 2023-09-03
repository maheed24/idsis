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

<script>
//COCPR TABLE

function fetchtblVessel(){
	$.ajax({
		url:'../../tables/marina/tbl_co_cpr.php',
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
			$("#container_vessel").html(data);
		}
	});
}


//ADD NEW VESSEL
$('#AddFormVessel').submit(function(e){
	e.preventDefault();
	var AddFormVessel = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/marina/co_cpr.php',
		data: AddFormVessel,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#AddFormVessel').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#add_co_cpr_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#AddFormVessel')[0].reset();
				$('#add_co_cpr_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#AddFormVessel')[0].reset();
				fetchtblVessel();
			}
			$('#AddFormVessel').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#add_co_cpr_msg').html('').empty;
	}, 5000);
});


//GET SHIP CLASSIFICATION TYPE





// function getRowCOCPR(details_id, action){
// 	$.ajax({
// 		type: 'POST',
// 		url: '../../command/marina/co_cpr.php',
// 		data: {id:details_id, action:action},
// 		dataType: 'json',
// 		success: function(details){
// 			//alert(details[0].ship_type_id);
// 			$('#updatetxtdetailsid').val(details[0].details_id);
// 			$('#updatetxtprincipalname').val(details[0].principal_name);
// 			$('#updatetxtcompanyname').val(details[0].company_name);
// 			$('#updatetxtbusinessaddress').val(details[0].business_address);
// 			$('#updatetxtshipname').val(details[0].ship_name);
// 			$('#updatetxtofficialno').val(details[0].official_no);
// 			$('#updatetxtimono').val(details[0].imo_no);
// 			$('#updatetxtformershipname').val(details[0].former_ship_name);
// 			$('#updatetxtformerowner').val(details[0].former_owner);
// 			$('#updateddlshipclassificationdetailsid').select2().val(details[0].ship_classification_id).trigger('change');
// 			$('#updateddlshiptypedetailsid').select2().val(details[0].ship_type_id).trigger('change');
// 			$('#updateddltradingareaid').select2().val(details[0].trading_area_id).trigger('change');
// 			$('#updatetxtbuilder').val(details[0].builder);
// 			$('#updatetxtplacebuilt').val(details[0].place_built);
// 			$('#updatetxtyearbuilt').val(details[0].year_built);
// 			$('#updatetxtmodifiedby').val(details[0].modified_by);
// 			$('#updatetxtplacemodified').val(details[0].place_modified);
// 			$('#updatetxtyearmodified').val(details[0].year_modified);
// 			$('#updatetxtlength').val(details[0].length);
// 			$('#updatetxtgrosstonnage').val(details[0].gross_tonnage);
// 			$('#updatetxtnoscrew').val(details[0].no_screw);
// 			$('#updatetxtnomasts').val(details[0].no_masts);
// 			$('#updatetxtbreadth').val(details[0].breadth);
// 			$('#updatetxtnettonnage').val(details[0].net_tonnage);
// 			$('#updatetxtdeadweight').val(details[0].deadweight);
// 			$('#updatetxtnodecks').val(details[0].no_decks);
// 			$('#updatetxtdepth').val(details[0].depth);
// 			$('#updateddlhullmaterialid').select2().val(details[0].hull_material_id).trigger('change');
// 			$('#updateddlsterntypeid').select2().val(details[0].stern_type_id).trigger('change');
// 			$('#updateddlstemtypeid').select2().val(details[0].stem_type_id).trigger('change');
// 			$('#updateddlrigtypeid').select2().val(details[0].rig_type_id).trigger('change');
// 			$('#updateddloperationid').select2().val(details[0].operation_id).trigger('change');
// 			$('#updatetxtcallsign').val(details[0].call_sign);
// 			//$('#updateddlprovinceid').val(details[0].province_id).change();
// 			$('#updateddlprovinceid').select2().val(details[0].province_id).trigger('change');
// 			// $('#updateddlcitymunicipalityid').select2().val(details[0].city_municipality_id).trigger('change');
// 			$('#updatetxtnationality').val(details[0].nationality);
// 			$('#updatetxtbodyno').val(details[0].body_no);
// 			$('#updatetxthomeport').val(details[0].homeport);
// 			$('#updateddlacquisitiontypeid').select2().val(details[0].acquisition_type_id).trigger('change');
			
// 			if(details[0].ship_classification_id == 6){
// 				$('.vessel').hide();
// 				$('.recreational').show();
// 				$('.adjust-right').css('padding-right','20px');
// 				$('.homeport').css('padding-right','0px');
// 			}
// 			else{
// 				$('.vessel').show();
// 				$('.recreational').hide();
// 				$('.adjust-right').css('padding-right','0px');
// 				$('.homeport').css('padding-right','20px');
// 			}
// 		}
// 	});
// }


//VIEW STATUS MODAL
$(function(){
	$(document).on('click', '.updateDetails', function(e){
		e.preventDefault();
		var details_id = $(this).data('id');
		var action = 'view';
		$('#mdlUpdateCOCPR').modal('show');
		getRowCOCPR(details_id, action);
		getRowShipPropulsion(details_id);
		getRowShipHistory(details_id);
		$('#addtxtdetailsidpayment').val(details_id);
		$('#updatetxtdetailsidchangehomeport').val(details_id);
	});
});


//VIEW STATUS MODAL
$(function(){
	$(document).on('click', '#btnAddCertPayment', function(e){
		e.preventDefault();
		$('#AddCert').show();
		$('#shiphistory').hide();
		$('#BtnPayment').hide();
	});
});


//ADD NEW VESSEL
$('#UpdateFormVessel').submit(function(e){
	e.preventDefault();
	var UpdateFormVessel = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/marina/co_cpr.php',
		data: UpdateFormVessel,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#UpdateFormVessel').css("opacity",".5");
        },
		success: function(response){
			//alert(response.message);
			if(response.error){
				$('#update_co_cpr_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				//$('#UpdateFormVessel')[0].reset();
				$('#update_co_cpr_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//$('#UpdateFormVessel')[0].reset();
				fetchtblVessel();
			}
			$('#UpdateFormVessel').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#update_co_cpr_msg').html('').empty;
	}, 5000);
});


//GET ROW SHIP PROPULSION ROW
function getRowShipPropulsion(details_id){
	$.ajax({
		type: 'POST',
		url:'../../tables/marina/tbl_ship_propulsion.php',
		data: {details_id:details_id},
		success:function(ship_propulsion){
			$("#shippropulsion").html(ship_propulsion);
		},
		error: function(err) {
			//alert(err);
		}
	});
}

//GET ROW SHIP CERT/LICENSE HISTORY
function getRowShipHistory(details_id){
	$.ajax({
		type: 'POST',
		url:'../../tables/marina/tbl_ship_info_history.php',
		data: {details_id:details_id},
		success:function(ship_history){
			$("#shiphistory").html(ship_history);
		},
		error: function(err) {
			//alert(err);
		}
	});
}


//ADD PROPULSION SYSTEM
$(function(){
	$(document).on('click', '#btnAddPropulsion', function(){
		var engine_make 			= $('#addtxtenginemakeps').val();
		var serial_no 				= $('#addtxtserialnops').val();
		var horsepower 				= $('#addtxthorsepowerps').val();
		var no_cyclinder 			= $('#addtxtnocyclinderps').val();
		var cycle 					= $('#addtxtcycleps').val();
		var details_id 				= $('#addtxtdetails_id').val();
		var status_id 				= $('#addddlstatusidps').val();
		var action 					= 'add';
		
		if(engine_make != ''){
			$.ajax({
				url:"../../command/marina/ship_propulsion.php",
				method:"POST",
				data:{details_id:details_id, status_id:status_id, action:action, engine_make:engine_make, serial_no:serial_no, horsepower:horsepower, no_cyclinder:no_cyclinder, cycle:cycle},
				success:function(data){
					if (data == 'error'){
						$('#update_co_cpr_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>Particulars of Propulsion System for " + details_id + "</b> is already exist. </div>"));
					}
					else{
						$.ajax({
							type: 'POST',
							url:  '../../tables/marina/tbl_ship_propulsion.php',
							data: {action:action, engine_make:engine_make, serial_no:serial_no, horsepower:horsepower, no_cyclinder:no_cyclinder, cycle:cycle},
							success:function(propulsion_data){
								getRowShipPropulsion(details_id);
								$('#update_co_cpr_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Ship Propulsion System has been successfully saved. </div>"));
								//$(".updatePropulsion").css("display","none");
								$("#propulsion").html(propulsion_data);
								//$("#footerpropulsion").show();
							},
							error: function(err) {
								$('#update_co_cpr_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>" + err + "</b> </div>"));
							}
						});
						$('#update_co_cpr_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>Particulars of Propulsion System for " + details_id + "</b> has been successfully saved. </div>"));
					}
					$('#footerpropulsion').hide();
				},
				error: function(err) {
					$('#update_co_cpr_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>" + err + "</b> </div>"));
				}
			});
			setInterval(function(){
				$('#update_co_cpr_msg').html('').empty;
			}, 5000);	
		}
		else{
			$('#update_co_cpr_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please fill out all the required fields </div>"));
		}
	});
});

//THIS FUNCTION USED TO HIDE AND SHOW DIV AND SPAN
$(function(){
	$(document).on('click', '.btnAddPropulsion1', function(e){
		let detail_id = $('#detail_id').val();
		let engine_make = $('#engine_make').val();
		let horsepower = $('#horsepower').val();
		let serial_no = $('#serial_no').val();
		let no_cyclinder = $('#no_cyclinder').val();
		let cycle = $('#cycle').val();
		let status_id = $('#status_id').val();

		
		let mydata = {
			detail_id: detail_id,
			engine_make: engine_make,
			horsepower: horsepower,
			serial_no: serial_no,
			no_cyclinder: no_cyclinder,
			cycle: cycle,
			status_id:status_id,
		} 
		

		
		$.ajax({
		type: "GET",
		url:"/api/create-ship",
		
		data: mydata,
		success: function (response) {
			console.log(response)
			console.log('from backend');
			window.location.reload();

			// console.log('#detail_id');

			// if(response.status == 404)
			// {
			// 	alert(response.message);
			// 	$('#editmodal').modal('hide');
			// }
			// else
			// {
			// 	$('#id').val(id);
			// 	$('#detail_id').val(id);
            //     $('#updatetxtprincipalname').val(response.detail.principal_name);
            //     $('#updatetxtcompanyname').val(response.detail.company_name);
            //     $('#updatetxtbusinessaddress').val(response.detail.business_address);
            //     $('#updatetxtshipname').val(response.detail.ship_name);
            //     $('#updatetxtofficialno').val(response.detail.official_no);
            //     $('#updatetxtimono').val(response.detail.imo_no);
            //     $('#updatetxtformershipname').val(response.detail.former_ship_name);
            //     $('#updatetxtformerowner').val(response.detail.former_owner);
            //     $('#updateddlshipclassificationdetailsid').select2().val(response.detail.ship_classification_id).trigger('change');
            //     $('#updateddlshiptypedetailsid').select2().val(response.detail.ship_type_id).trigger('change');
            //     $('#updateddltradingareaid').select2().val(response.detail.trading_area_id).trigger('change');
            //     $('#updatetxtbuilder').val(response.detail.builder);
            //     $('#updatetxtplacebuilt').val(response.detail.place_built);
            //     $('#updatetxtyearbuilt').val(response.detail.year_built);
            //     $('#updatetxtmodifiedby').val(response.detail.modified_by);
            //     $('#updatetxtplacemodified').val(response.detail.place_modified);
            //     $('#updatetxtyearmodified').val(response.detail.year_modified);
            //     $('#updatetxtlength').val(response.detail.length);
            //     $('#updatetxtgrosstonnage').val(response.detail.gross_tonnage);
            //     $('#updatetxtnoscrew').val(response.detail.no_screw);
            //     $('#updatetxtnomasts').val(response.detail.no_masts);
            //     $('#updatetxtbreadth').val(response.detail.breadth);
            //     $('#updatetxtnettonnage').val(response.detail.net_tonnage);
            //     $('#updatetxtdeadweight').val(response.detail.deadweight);
            //     $('#updatetxtnodecks').val(response.detail.no_decks);
            //     $('#updatetxtdepth').val(response.detail.depth);
            //     $('#updateddlhullmaterialid').select2().val(response.detail.hull_material_id).trigger('change');
            //     $('#updateddlsterntypeid').select2().val(response.detail.stern_type_id).trigger('change');
            //     $('#updateddlstemtypeid').select2().val(response.detail.stem_type_id).trigger('change');
            //     $('#updateddlrigtypeid').select2().val(response.detail.rig_type_id).trigger('change');
            //     $('#updateddloperationid').select2().val(response.detail.operation_id).trigger('change');
            //     $('#updatetxtcallsign').val(response.detail.call_sign);
            //     $('#updateddlprovinceid').val(response.detail.province);
            //     $('#updatetxtnationality').val(response.detail.nationality);
            //     $('#updatetxtbodyno').val(response.detail.body_no);
            //     $('#updatetxthomeport').val(response.detail.homeport);
            //     $('#updateddlacquisitiontypeid').select2().val(response.detail.acquisition_type_id).trigger('change');
			// 	$('#editForm').attr('action','/co_cpr/'+id);
			// 	// $('#addForm').attr('action','/co_cpr');
			// }
		}
	});
			

	});
});
$(function(){
	$(document).on('click', '.editshippropulsion', function(){

		//var ship_id = $("#txtshipidpropulsion").val();
		$(this).closest("tr").find("span.editSpan").hide();
		$(this).closest("tr").find("input.editInput").show();
		$(this).closest("tr").find("select.editSelect").show();
		$(this).closest("tr").find("button.updateshippropulsion").show();
		$(this).closest("tr").find("button.editshippropulsion").hide();
		$('#footershippropulsion').hide();

		
	});
});

//THIS FUNCTION USED TO DISPLAY EDIT MODAL


$(function(){
	$(document).on('click', '.updateshippropulsion', function(e){
		
		
		if(engine_make != '' && serial_no != '' && horsepower != ''  && no_cyclinder != ''  && cycle != '' && status_id != ''){
			
			let updated_data = {
					details_id: detail_id,
					ship_propulsion_id:ship_propulsion_id,
					engine_make:engine_make, 
					serial_no:serial_no, 
					horsepower:horsepower, 
					no_cyclinder:no_cyclinder,
					cycle:cycle, 
					status_id:status_id, 
					action:action
				}

				
			
			
			setInterval(function(){
				$('#update_co_cpr_msg').html('').empty;
			}, 5000);	
		}
		else{
			$('#update_co_cpr_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Please fill out all the required fields </div>"));
		}		
	});
});
/// HISTORY ADD
$(function(){
	$(document).on('click', '.btnAddPayment', function(e){
		let details_id = $('#details_id').val();
		let amount = $('#amount').val();
		let or_date = $('#or_date').val();
		let or_no = $('#or_no').val();
		let cert_no = $('#cert_no').val();
		let sec_no = $('#sec_no').val();
		let date_issued = $('#date_issued').val();
		let validity = $('#validity').val();
		let cert_type_id = $('#cert_type_id').val();

		
		let mydata = {
			details_id: details_id,
			amount: amount,
			or_date: or_date,
			or_no: or_no,
			cert_no: cert_no,
			sec_no: sec_no,
			date_issued:date_issued,
			validity:validity,
			cert_type_id:cert_type_id,
		} 
		

		
		$.ajax({
		type: "GET",
		url:"/api/create-cert",
		
		data: mydata,
		success: function (response) {
			console.log(response)
			console.log('from backend');
			window.location.reload();


		}
	});
			

	});
});

///CHANGE HOMEPORT 
$(function(){
	$(document).on('click', '#btnAddChangeHomeport', function(e){
	
		let details_id = $('#details_id').val();
		let homeport = $('#homeport').val();
		
		
		let mydata = {

			details_id: details_id,
			homeport: homeport,
			
		} 
		

		
		$.ajax({
		type: "GET",
		url:"/api/change-homeport",
		
		data: mydata,
		success: function (response) {
			console.log(response)
			console.log('from backend');
			window.location.reload();


		}
	});
			

	});
});

//HISTORY UPDATE
$(function(){
	$(document).on('click', '#btnUpdatePayment', function(e){
		let cert_id = $('#cert_id1').val();
		let details_id = $('#details_id1').val();
		let amount = $('#amount1').val();
		let or_date = $('#or_date1').val();
		let or_no = $('#or_no1').val();
		let cert_no = $('#cert_no1').val();
		let sec_no = $('#sec_no1').val();
		let date_issued = $('#date_issued1').val();
		let validity = $('#validity1').val();
		let cert_type_id = $('#cert_type_id1').val();

		
		let mydata = {
			cert_id: cert_id,
			details_id: details_id,
			or_no: or_no,
			amount: amount,
			or_date: or_date,
			cert_no: cert_no,
			sec_no: sec_no,
			date_issued:date_issued,
			validity:validity,
			cert_type_id:cert_type_id,
			
		} 

		

		
		$.ajax({
		type: "GET",
		url:"/api/update-cert",
		
		data: mydata,
		success: function (response) {
			
		
			window.location.reload();


		}
	});
			

	});
});


//ADD NEW VESSEL
// $('#AddCert').submit(function(e){
// 	e.preventDefault();
// 	var AddCert = $(this).serialize();
// 	$.ajax({
// 		method: 'GET',
// 		url: '/api/create-cert',
// 		data: AddCert,
// 		dataType: 'json',
// 		beforeSend: function(){
//             $('.submitBtn').attr("disabled","disabled");
//             $('#AddCert').css("opacity",".5");
//         },
// 		success: function(response){
// 			if(response.error){
// 				$('#payment_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
// 			}
// 			else{
// 				$('#AddCert')[0].reset();
// 				$('#payment_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
// 				//getRowShipHistory(details_id);
// 			}
// 			$('#AddCert').css("opacity","");
//             $(".submitBtn").removeAttr("disabled");
// 		}
// 	});
// 	setInterval(function(){
// 		$('#payment_msg').html('').empty;
// 	}, 5000);
// });


//GET STATUS
// function getRowCert(certificate_license_id, action){
// 	$.ajax({
// 		type: 'POST',
// 		url: '../../command/marina/payment.php',
// 		data: {certificate_license_id:certificate_license_id, action:action},
// 		dataType: 'json',
// 		success: function(certificate_license){
// 			$('#updatetxtcertificatelicenseid').val(certificate_license[0].certificate_license_id);
// 			$('#updatetxtorno').val(certificate_license[0].or_no);
// 			$('#updatetxtordate').val(certificate_license[0].or_date);
// 			$('#updatetxttotalamountpayment').val(certificate_license[0].amount);
// 			$('#updatetxtcertno').val(certificate_license[0].cert_no);
// 			$('#updatetxtsecno').val(certificate_license[0].sec_no);
// 			$('#updatetxtvalidity').val(certificate_license[0].validity);
// 			$('#updateddlcerttypeid').select2().val(certificate_license[0].cert_type_id).trigger('change');
// 			$('#updatetxtdetailsidEdit').val(certificate_license[0].details_id);
// 			$('#updatetxtdateissued').val(certificate_license[0].date_issued);
// 			$('#updatetxtdatevalidity').val(certificate_license[0].validity);
// 		}
// 	});
// }

//VIEW STATUS MODAL

	// $(document).on('click', '.editPayment', function(e){
	// 	e.preventDefault();
	// 	//var cert_id = $(this).val();
	// 	var id = $(this).data('id');
	// 	//var action = 'view';
	// 	$('#EditCert').show();
	// 	//alert(id);
		
	// 	$.ajax({
	// 		type: "GET",
	// 		url:"/edit-certificate/"+id,
	// 		success: function (response) {
	// 			if(response.status == 404)
	// 			{
	// 				alert(response.message);
	// 				//$('#editmodal').modal('hide');
	// 			}
	// 			else
	// 			{
	// 			$('#id').val(cert_id);
	// 			$('#details_id').val(id);
    //             $('#or_no').val(response.certificate_licenses.or_no);
    //             $('#or_date').val(response.certificate_licenses.or_date);
    //             $('#cert_no').val(response.certificate_licenses.cert_no);
    //             $('#sec_no').val(response.certificate_licenses.sec_no);
    //             $('#cert_type_id').select2().val(response.certificate_licenses.cert_type_id).trigger('change');
    //             $('#amount').val(response.certificate_licenses.amount);
    //             $('#date_issued').val(response.certificate_licenses.date_issued);
    //             $('#validity').val(response.certificate_licenses.validity);
               
	// 		}
	// 	}
	// });
	// 	$('#shiphistory').hide();
	// 	$('#AddCert').hide();
	// 	$('#btnAddCertPayment').hide();
	// 	//getRowCert(cert_id, action);
	// });


//UPDATE CERTIFICATE TYPE
$('#EditCert').submit(function(e){
	e.preventDefault();
	var EditCert = $(this).serialize();
	$.ajax({
		type: "GET",
		url:"/edits-cert/"+id,
		success: function (response) {
			if(response.status == 404)
			{
				alert(response.message);
				$('#editmodal').modal('hide');
			}
			else
			{
				$('#id').val(id);
				$('#details_id').val(id);
                $('#amoun').val(response.certificate_license.amount);
                $('#or_date').val(response.certificate_license.or_date);
                $('#or_no').val(response.certificate_license.or_no);
                $('#cert_no').val(response.certificate_license.cert_no);
                $('#sec_no').val(response.certificate_license.sec_no);
                $('#date_issued').val(response.certificate_license.date_issued);
                $('#validity').val(response.certificate_license.validity);
                $('#cert_type_id').select2().val(response.certificate_license.cert_type_id).trigger('change');
               
			}
		}
	});
	// $.ajax({
	// 	method: 'POST',
	// 	url: '../../command/marina/payment.php',
	// 	data: EditCert,
	// 	dataType: 'json',
	// 	beforeSend: function(){
    //         $('.submitBtn').attr("disabled","disabled");
    //         //$('#EditCert').css("opacity",".5");
    //     },
	// 	success: function(response){
	// 		if(response.error){
	// 			$('#update_payment_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
	// 		}
	// 		else{
	// 			$('#update_payment_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
	// 			//$('#EditCert')[0].reset();
	// 			getRowShipHistory(details_id);
	// 			//fetchtblHullMaterial();
	// 		}
	// 		//$('#EditCert').css("opacity","");
    //         $(".submitBtn").removeAttr("disabled");
	// 	}
	// });
	setInterval(function(){
		$('#update_payment_msg').html('').empty;
	}, 5000);
});

$(function(){
	$(document).on('click', '#btnPaymentAddBack', function(e){
		$('#btnAddCertPayment').show();
		$('#AddCert').hide();
		$('#shiphistory').show();
		var details_id = $('#addtxtdetailsidpayment').val();
		getRowShipHistory(details_id);
		$('#BtnPayment').show();
		
	});
});

// $(function(){
// 	// $(document).on('click', '.viewshipinfocert', function(e){
// 	// 	var certificate_license_id = $(this).data('id');
// 	// 	$('#addtxtcertificatelicenseidcert').val(certificate_license_id);
		
// 	// });
// });


$(function(){
	$(document).on('click', '#btnPaymentEditBack', function(e){
		$('#btnAddCertPayment').show();
		$('#AddCert').hide();
		$('#EditCert').hide();
		$('#shiphistory').show();
		var details_id = $('#addtxtdetailsidpayment').val();
		getRowShipHistory(details_id);
		$('#BtnPayment').show();
		
	});
});


$("#addddlshipclassificationdetailsid").on('change', function(){
	var ship_classification_id = $(this).val();

	$.ajax({
		type:	'POST',
		url:	'../../command/marina/ship_classification_type_get.php',
		data:	{ship_classification_id:ship_classification_id},
		success: function (result) {
			$("#addddlshiptypedetailsid").html(result);
		}
	});
	
	if(ship_classification_id == 6){
		$('.vessel').hide();
		$(".place_built").css("padding-right", "0px");
		$(".net_tonnage").css("padding-right", "20px");
		$(".operation").css("padding-right", "20px");
		$('.recreational').show();
	}
	else{
		$('.vessel').show();
		$(".place_built").css("padding-right", "0px");
		$(".net_tonnage").css("padding-right", "0px");
		$(".operation").css("padding-right", "0px");
		$('.recreational').hide();
	}
});


$("#updateddlshipclassificationdetailsid").on('change', function(){
	var ship_classification_id = $(this).val();

	// $.ajax({
		// type:	'POST',
		// url:	'../../command/marina/ship_classification_type_get.php',
		// data:	{ship_classification_id:ship_classification_id},
		// success: function (result) {
			// $("#addddlshiptypedetailsid").html(result);
		// }
	// });
	
	if(ship_classification_id == 6){
		$('.vessel').hide();
		$(".place_built").css("padding-right", "0px");
		$(".net_tonnage").css("padding-right", "20px");
		$(".operation").css("padding-right", "20px");
		$('.recreational').show();
	}
	else{
		$('.vessel').show();
		$(".place_built").css("padding-right", "0px");
		$(".net_tonnage").css("padding-right", "0px");
		$(".operation").css("padding-right", "0px");
		$('.recreational').hide();
	}
});


//GET ROW SHIP TYPE FUNCTION
function getRowShipType(ship_classification_id, ship_type_id){
	$.ajax({
		type:	'POST',
		url:	'../../command/marina/ship_type_get.php',
		data:	{ship_classification_id:ship_classification_id, ship_type_id:ship_type_id},
		success: function (result) {
			$("#updateddlshiptypedetailsid").html(result);
		}
	});
}


//CHANGE HOMEPORT
// $('#AddChangeHomeport').submit(function(e){
// 	e.preventDefault();
// 	var AddChangeHomeport = $(this).serialize();
// 	$.ajax({
// 		method: 'POST',
// 		url:"/api/change-homeport",
// 		data: AddChangeHomeport,
// 		dataType: 'json',
// 		beforeSend: function(){
//             $('.submitBtn').attr("disabled","disabled");
//             $('#AddChangeHomeport').css("opacity",".5");
//         },
// 		success: function(response){
// 			if(response.error){
// 				$('#change_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
// 			}
// 			else{
// 				$('#AddChangeHomeport')[0].reset();
// 				$('#change_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
// 				//getRowShipHistory(details_id);
// 				fetchtblVessel();
				
// 			}
// 			$('#AddChangeHomeport').css("opacity","");
//             $(".submitBtn").removeAttr("disabled");
// 		}
// 	});
// 	setInterval(function(){
// 		$('#change_msg').html('').empty;
// 	}, 5000);
// });


//******************************************* CHANGE HOMEPORT SCRIPT ********************************************//

//CHANGE HOMEPORT TABLE
function fetchtblChangeHomeport(){
	$.ajax({
		url:'../../tables/marina/tbl_change_homeport.php',
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
			$("#container_change_homeport").html(data);
		}
	});
}

//VIEW STATUS MODAL
$(function(){
	$(document).on('click', '.acceptvessel1', function(e){
		e.preventDefault();
		var details_id = $(this).data('id');
		//$('#mdlConfirmation').show();
		$('#mdlConfirmation1').modal('show');
		$('#updatetxtdetailsidchange').val(details_id);
	});
});


//CHANGE HOMEPORT
$('#frmAcceptHomeport').submit(function(e){
	e.preventDefault();
	var frmAcceptHomeport = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: '../../command/marina/co_cpr.php',
		data: frmAcceptHomeport,
		dataType: 'json',
		beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#frmAcceptHomeport').css("opacity",".5");
        },
		success: function(response){
			if(response.error){
				$('#accept_change_msg').html(("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message +  "</div>"));
			}
			else{
				$('#frmAcceptHomeport')[0].reset();
				$('#accept_change_msg').html(("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>" + response.message + " </div>"));
				//getRowShipHistory(details_id);
				//$('#mdlConfirmation').modal('close')
				fetchtblVessel();
				
			}
			$('#frmAcceptHomeport').css("opacity","");
            $(".submitBtn").removeAttr("disabled");
		}
	});
	setInterval(function(){
		$('#accept_change_msg').html('').empty;
	}, 5000);
});

//ONCHANGE SHIP TYPE
$("#updateddlshipclassificationdetailsid").on('change', function(){
	var ship_classification_id = $(this).val();
	var ship_type_id = $("#updateddlshiptypedetailsid").val();
	
	getRowShipType(ship_classification_id, ship_type_id);
});



$("#addddlprovinceid").on('change', function(){
	var province_id = $(this).val();

	$.ajax({
		type:	'POST',
		url:	'../../command/marina/homeport.php',
		data:	{province_id:province_id},
		success: function (result) {
			$("#addddlcitymunicipalityid").html(result);
		}
	});
});

// $("#updateddlprovinceid").on('change', function(){
	// var province_id = $(this).val();

	// $.ajax({
		// type:	'POST',
		// url:	'../../command/marina/homeport.php',
		// data:	{province_id:province_id},
		// success: function (result) {
			// $("#updateddlcitymunicipalityid").html(result);
		// }
	// });
// });



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


function previewProfileImage( uploader ) {   
    //ensure a file was selected 
    if (uploader.files && uploader.files[0]) {
        var imageFile = uploader.files[0];
        var reader = new FileReader();    
        reader.onload = function (e) {
            //set the image data as source
            $('#profileImage').attr('src', e.target.result);
        }    
        reader.readAsDataURL( imageFile );
    }
}

$("#imageUpload").change(function(){
    previewProfileImage( this );
});

$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});


$("#addtxtyearbuilt").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});

$(function () {
	$('.select2').select2()
});

$('#updatetxtprincipalname, #updatetxtcompanyname, #updatetxtbusinessaddress, #updatetxtshipname, #updatetxtofficialno, #updatetxtcallsign, #updatetxtimono, #updatetxtformershipname, #updatetxtformerowner, #updatetxtbuilder, #updatetxtplacebuilt, #updatetxtmodifiedby, #updatetxtplacemodified, #updatetxtnationality, #updatetxtbodyno, #addtxtcertno, #updatetxtcertno, #addtxtplacebuilt, #addtxtplacemodified, #addtxtbodyno, #addtxtnationality, #addtxtmodifiedby, #addtxtbuilder, #addtxtformerowner, #addtxtformershipname, #addtxtimono, #addtxtcallsign, #addtxtprincipalname, #addtxtcompanyname, #addtxtbusinessaddress, #addtxtshipname, #engine_make, #serial_no').keyup(function(){
  $(this).val($(this).val().toUpperCase());
});
</script>