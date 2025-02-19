<?php 
 include"config.php";
 session_start();
 if(!isset($_SESSION["username"]))  
	{
		header("location:login.php?mes=error");
	}
	else
	{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'header.php'?>
	<link rel="stylesheet" href="css/admin.css"/>
	<link rel="" href="js/app.min.js"/>
	<style>
		.card-box {
    background-color: #bbb62099;
    padding: 1.5rem;
    -webkit-box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .1);
    box-shadow: 0 1px 4px 0 rgba(0, 0, 0, .1);
    margin-bottom: 24px;
    border-radius: .25rem
	}
	</style>
</head>
	<body>
		<?php include"admin_topnav.php" ?>
		<!-- Start Page Content here -->
	<div class="content-page">
		<div class="content" style="padding: 61px";>
			<!-- Start Content-->
			<div class="container-fluid">
				<div class="row" style="margin-left: 220px;"> <!--purchase-->
					<div class="col-10">
						<div class="page-title-box">
							<h4 class="page-title">Staff and Student Details</h4>
						</div>
					</div>
					<div class="col-md-6 col-xl-3">
						<div class="card-box">
							<div class="row">
								<div class="col-2">
									<div class="avatar-sm bg-info rounded">
										<i class="fa fa-2x fa-profile text-primary mr-3"></i>
									</div>
								</div>
								<div class="col-10">
									<div class="text-right">
										<h3 class="text-dark my-1">
											<span>
												<?php 
													$sql="SELECT COUNT(id) as tot_student FROM student_details";
													$res=$con->query($sql);
													$row=$res->fetch_assoc();
													$tot_student=$row["tot_student"];
													echo $tot_student;
												?>
											</span>
										</h3>
										<h5>Total Student</h5>
									</div>
								</div>
							</div>
						</div> 
					</div> 
					<div class="col-md-6 col-xl-3">
						<div class="card-box">
							<div class="row">
								<div class="col-2">
									<div class="avatar-sm bg-primary rounded">
										<i class="fe-cpu avatar-title font-22 text-white"></i>
									</div>
								</div>
								<div class="col-10">
									<div class="text-right">
										<h3 class="text-dark my-1">
											<span>
												<?php 
													$sql="SELECT COUNT(id) as tot_staff FROM staff_details";
													$res=$con->query($sql);
													$row=$res->fetch_assoc();
													$tot_staff=$row["tot_staff"];
													echo $tot_staff;
												?>
											</span>
										</h3>
										<h5>Total Staffs</h5>
									</div>
								</div>
							</div>
						</div> 
					</div> 				
				</div>
				<!-- end row -->
				<div class="row" style="margin-left: 220px;"> <!--purchase-->
					<div class="col-10">
						<div class="page-title-box">
							<h4 class="page-title">Class Details</h4>
						</div>
					</div>
					<div class="col-md-6 col-xl-3">
						<div class="card-box">
							<div class="row">
								<div class="col-2">
									<div class="avatar-sm bg-info rounded">
										<i class="fa fa-2x fa-profile text-primary mr-3"></i>
									</div>
								</div>
								<div class="col-10">
									<div class="text-right">
										<h3 class="text-dark my-1">
											<span>
												
											</span>
										</h3>
										<h5>Today </h5>
									</div>
								</div>
							</div>
						</div> 
					</div> 
					<div class="col-md-6 col-xl-3">
						<div class="card-box">
							<div class="row">
								<div class="col-2">
									<div class="avatar-sm bg-primary rounded">
										<i class="fe-cpu avatar-title font-22 text-white"></i>
									</div>
								</div>
								<div class="col-10">
									<div class="text-right">
										<h3 class="text-dark my-1">
											<span>
												
											</span>
										</h3>
										<h5>This Month</h5>
									</div>
								</div>
							</div>
						</div> 
					</div> 				
				</div>
				<!-- end row -->
			</div> <!-- container -->
		</div> <!-- content -->
		
		<!-- Footer Start -->
		<?php include 'footer.php'?>
		<!-- end Footer -->
	</div>
	<!-- End Page content -->
		<?php include"sidenav.php" ?>
	</body>
</html>
<?php 
	}
?>
