<?php 
session_start();

echo $_SESSION['user_type'];
// if($c){
	// header('location: app/pages/client/company_profile.php');
// }	

?>
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="../../../public/images/profile.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo $name; ?></p>
				<a href="#"><?php echo $company_name;?></a>
			</div>
		</div>
		<ul class="sidebar-menu" data-widget="tree" style="font-weight:normal!important;">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree" style="font-weight:normal!important;">
			<li class="header">MANAGE</li>
			<li><a href="company_profile.php"><i class="fas fa-file"></i><span style="margin-left:10px;">COMPANY PROFILE</span></a></li>
			<li><a href="ship_name.php"><i class="fas fa-file"></i><span style="margin-left:10px;">SHIP NAME</span></a></li>
			
			<?php 
			
			
				// if($user_type_id == 1){
					//echo'	<li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span style="margin-left:10px;">DASHBOARD</span></a></li>
							// <li><a href="status.php"><i class="fas fa-toggle-on"></i><span style="margin-left:10px;">STATUS</span></a></li>
							// <li><a href="uacs_code.php"><i class="fas fa-qrcode"></i><span style="margin-left:10px;">UACS CODE</span></a></li>
							// <li><a href="trans_type.php"><i class="fas fa-mercury"></i><span style="margin-left:10px;">TRANSACTION TYPE</span></a></li>
							// <li><a href="office.php"><i class="fas fa-building"></i><span style="margin-left:10px;">OFFICE</span></a></li>
							// <li><a href="services_division.php"><i class="fas fa-square-root-alt"></i><span style="margin-left:10px;">SERVICES/DIVISION</span></a></li>
							// <li><a href="section.php"><i class="far fa-building"></i><span style="margin-left:10px;">DIVISION/SECTION</span></a></li>
							// <li><a href="division_section.php"><i class="fas fa-list"></i><span style="margin-left:10px;">OFFICES PER SERVICES/DIVISION</span></a></li>
							// <li><a href="trans_uacs.php"><i class="fas fa-random"></i><span style="margin-left:10px;">TRANS UACS</span></a></li>
							// <li><a href="user_type.php"><i class="fas fa-users-cog"></i><span style="margin-left:10px;">USER TYPE</span></a></li>
							// <li><a href="user.php"><i class="fas fa-users"></i><span style="margin-left:10px;">USER</span></a></li>
							// <li><a href="search.php"><i class="fas fa-search"></i><span style="margin-left:10px;">SEARCH</span></a></li>';
				// }
				// else if($user_type_id == 2){
					// echo'	<li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span style="margin-left:10px;">DASHBOARD</span></a></li>
							// <li><a href="transaction.php"><i class="fas fa-barcode"></i><span style="margin-left:10px;">ATAP</span></a></li>
							// <li><a href="search.php"><i class="fas fa-search"></i><span style="margin-left:10px;">SEARCH</span></a></li>';
				// }
				
				// else if($user_type_id == 3){
					// echo'	<li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span style="margin-left:10px;">DASHBOARD</span></a></li>
							// <li><a href="transaction.php"><i class="fas fa-barcode"></i><span style="margin-left:10px;">ATAP</span></a></li>';
				// }
			?>
			<?php 
				// if($user_type_id == 3){
					// echo "<li class='header'>REPORT</li>";
					// echo '<li><a href="report.php"><i class="fas fa-copy"></i><span style="margin-left:10px;">REPORT</span></a></li>';
				// }
			?>
		</ul>
    </section>
    <!-- /.sidebar -->
</aside>