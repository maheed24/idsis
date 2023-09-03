<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="{{asset('img/marina.png')}}" /><title>IDSIS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('libraries/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('libraries/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('libraries/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/css/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/css/dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->

<style>



.content{
	padding-top:50px!important;
}
.dataTables_filter  {
	float:right!important;
}
.dataTables_paginate  {
	float:right!important;
	margin-top:-30px!important;
}

#divLoading {
    position: fixed;
    top: 30%;
    bottom: 0;
    left: 47%;
    right: 0;
    background-color: transparent;
    opacity: 0.8;
    display: block;
    z-index: 1001;
    width: 100%;
    height: 100vh!important;
}

body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}

.container {
    max-width: 960px;
    margin: 30px auto;
    padding: 20px;
}

#imageUpload, #updateimageUpload
{
    display: none;
}

#profileImage, #updateprofileImage
{
    cursor: pointer;
}

.card {
    box-shadow: 0 2px 3px 0 rgba(0,0,0,.1), 0 2px 2px 0 rgba(0,0,0,.06);
	position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
}

.form-horizontal .seafarer_form{
    padding: 12px 16px 12px 5px;
    height: 40px;
    font-size: 14px;
    color: black!important;
    border: none;
    border-bottom: 2px solid #ccc;
    border-radius: 0;
    box-shadow: none;
    margin-bottom: 15px;
}

.form-horizontal .seafarer_form:focus{
    border-color: #3f9cb5;
    box-shadow: none;
}

.form-horizontal .control-label{
    font-size: 13px;
    color: #ccc;
    position: absolute;
    top: 15px;
    
}

.form-horizontal seafarer_form.form-control{
    resize: vertical;
    height: 130px;
}

label{
	font-weight:normal!important;
	float:left;
	font-size: 14px;
}

</style>
<script>
var t;
    window.onload = resetTimer();
    // DOM Events
    document.onmousemove = resetTimer();
    document.onkeypress = resetTimer();
    //console.log('loaded');

function logout() {
        //alert("You are now logged out.")
        location.href = '../../../logout.php'
    }

    function resetTimer() {
		
        ////clearTimeout(t);
        //t = setTimeout(logout, 3000000)
        
    }
</script>