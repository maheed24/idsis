<script src="libraries/jquery/dist/jquery.min.js"></script>

<script>

$(document).ready(function(e){
	//LOGIN
	// Submit form data via Ajax
	$("#frmLogin").on('submit', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'command/login.php',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('#btnLogin').attr("disabled","disabled");
				$('#frmLogin').css("opacity",".5");
				$('#frmLogin').css('display','none');
				$('#divLoading').css('display','');
			},
			success: function(response){ 
				$('#login_message').html('');
				if(response.status == 1){
					$('#login_message').html('<div><label class="alert alert-danger btn-block text-center" style="background:#fb483a!important;color:white;border-color:#fb483a!important;text-align:left!important;text-weight:normal!important;">'+response.message+'</label></div>');
				}
				else{
					if(response.role == 'administrator'){
						window.location= response.user;
					}
					else if(response.user == 'marina'){
						window.location= response.user;
					}
					else {
						window.location= response.user;
					}
				}
				$('#frmLogin').css("opacity","");
				$("#btnLogin").removeAttr("disabled");
				$('#divLoading').css('display','none');
				$('#frmLogin').css('display','');
				//$('.loading').addClass('hidden');
			}
		});
		setInterval(function(){
			$('#login_message').html('').empty;
		}, 5000);
	});
	
	
	
	//SIGN UP
	// Submit form data via Ajax
	$("#FrmRegistration").on('submit', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'command/signup.php',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('#submit').attr("disabled","disabled");
				$('#frmReset').css("opacity",".5");
				$('#FrmRegistration').css('display','none');
				$('#divLoading').css('display','');
			},
			success: function(response){ 
				alert(response.message);
				$('#signup_message').html('');
				if(response.status == 1){
					$('#signup_message').html('<div><label class="alert alert-danger btn-block text-center" style="background:#fb483a!important;color:white;border-color:#fb483a!important;text-align:left!important;text-weight:normal!important;">'+response.message+'</label></div>');
				}
				else{
					$('#FrmRegistration')[0].reset();
					$('#signup_message').html('<div><label class="alert alert-success btn-block text-center" style="background:#28a745!important;color:white;border-color:#28a745!important;text-align:left!important;text-weight:normal!important;">'+response.message+'</label></div>');
				}
				$('#frmReset').css("opacity","");
				$("#submit").removeAttr("disabled");
				$('#divLoading').css('display','none');
				$('#FrmRegistration').css('display','');
				//$('.loading').addClass('hidden');
			}
		});
		setInterval(function(){
			$('#signup_message').html('').empty;
		}, 5000);
	});
	
	//FORGOT PASSWORD
	// Submit form data via Ajax
	$("#frmForgotPassword").on('submit', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'command/reset_password.php',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(response){
				$('#btnForgotPassword').attr("disabled","disabled");
				$('#frmForgotPassword').css("opacity",".5");
				$('#frmForgotPassword').css('display','none');
				$('#divLoading').css('display','');
				$('.card-footer').css('display','none');
			},
			success: function(response){ 
				$('#forgot_password_message').html('');
				if(response.status == 1){
					$('#forgot_password_message').html('<div><label class="alert alert-danger btn-block text-center" style="background:#fb483a!important;color:white;border-color:#fb483a!important;text-align:left!important;text-weight:normal!important;">'+response.message+'</label></div>');
				}
				else{
					$('#frmForgotPassword')[0].reset();
					$('#forgot_password_message').html('<div><label class="alert alert-success btn-block text-center" style="background:#28a745!important;color:white;border-color:#28a745!important;text-align:left!important;text-weight:normal!important;">'+response.message+'</label></div>');
				}
					
				$('#frmForgotPassword').css("opacity","");
				$("#btnForgotPassword").removeAttr("disabled");
				$('#divLoading').css('display','none');
				$('#frmForgotPassword').css('display','');
				$('.card-footer').css('display','');
				//$('.loading').addClass('hidden');
			}
		});
		setInterval(function(){
			$('#forgot_password_message').html('').empty;
		}, 5000);
	});
	
	//RESET PASSWORD
	// Submit form data via Ajax
	$("#frmReset").on('submit', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'command/change_password.php',
			data: new FormData(this),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData:false,
			beforeSend: function(){
				$('#btnReset').attr("disabled","disabled");
				$('#frmReset').css("opacity",".5");
				$('#frmReset').css('display','none');
				$('#divLoading').css('display','');
			},
			success: function(response){ 
				alert(response.message);
				$('#reset_message').html('');
				if(response.status == 1){
					$('#reset_message').html('<div><label class="alert alert-danger btn-block text-center" style="background:#fb483a!important;color:white;border-color:#fb483a!important;text-align:left!important;text-weight:normal!important;">'+response.message+'</label></div>');
				}
				else{
					$('#frmReset')[0].reset();
					$('#reset_message').html('<div><label class="alert alert-success btn-block text-center" style="background:#28a745!important;color:white;border-color:#28a745!important;text-align:left!important;text-weight:normal!important;">'+response.message+'</label></div>');
				}
				$('#frmReset').css("opacity","");
				$("#btnReset").removeAttr("disabled");
				$('#divLoading').css('display','none');
				$('#frmReset').css('display','');
				//$('.loading').addClass('hidden');
			}
		});
		
		setInterval(function(){
			window.location = 'index.php'
		}, 5000);
			
	});

});


//UPPERCASE OF TEXT
$('#txtlastname, #txtfirstname, #txtmiddlename, #txtsuffix').keyup(function(){
	$(this).val($(this).val().toUpperCase());
});
	
</script>