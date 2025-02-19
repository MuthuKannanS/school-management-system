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
	
</head>
	<body>
		<?php include"admin_topnav.php" ?>
		
		<?php include"sidenav.php" ?>
		
		<!-- Start Page Content here -->
            <div class="content-page">
                <div class="content">
					<!-- start page title -->
					<div class="row">
						<div class="col-10">
							<div class="page-title-box">
								<h4 class="page-title">Student Details</h4>
							</div>
						</div>
					</div>     
					<!-- end page title --> 
					<?php
						$username=$_SESSION["username"];
						$sql="SELECT staff_details.rollno,staff_details.class from staff_details INNER JOIN login_details on staff_details.username = login_details.username";
						$res=$con->query($sql);
						$row=$res->fetch_assoc();
						$class=$row["class"];
						$rollno=$row["rollno"];
					?>
                    <!-- Start Content-->
                    <div class="container-fluid">
						<div class="row" style="margin-left: 220px;">
                            <div class="col-10">
                                <div class="card-box" style="padding: 61px;">
                                    <h4 class="header-title">Your Class Student</h4>
                                    <p class="text-right">
                                      <a href="add_student.php" class="btn btn-primary btn-radius">Add Student</a>
                                    </p>
                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th>SI No</th>
                                                <th>Student Name</th>
                                                <th>Roll no</th>
												<th>Date</th>
												<th>Attendance</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    
													$sql="SELECT stu_attendance.rollno,stu_attendance.date  from stu_attendance INNER JOIN student_details on student_details.rollno = stu_attendance.rollno";
                                                    $res=$con->query($sql);
                                                    $i=0;
                                                    while($row=$res->fetch_assoc())
                                                    {
                                                        $i=$i+1;
                                                        $id=$row["id"];
                                                        $name=$row["student_name"];
                                                        $rollno=$row["rollno"];
														$date=$row["date"];
                                                ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $rollno; ?></td>
                                                <td><?php echo $class; ?></td>
                                                <td><?php echo $date; ?></td>
											</tr>
                                           <?php
                                            }
                                           ?>
                                            </tbody>
                                            <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div> <!-- end .table-responsive-->
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

              
	</div>
	</body>
</html>
<?php 
	}
?>
