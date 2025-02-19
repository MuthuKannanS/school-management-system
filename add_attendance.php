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
<?php
if(isset($_GET['present_id']))
{
	$present_id=$_GET['present_id'];
	$sql = "SELECT * FROM student_details WHERE id='$present_id'";
	$res=$con->query($sql);
	$row=$res->fetch_assoc();
	$class=$row["class"];
	$rollno=$row["rollno"];
	$date=date("y-m-d");
	$sql="INSERT INTO stu_attendance (rollno,class,attendance,date) VALUES ('$rollno','$class','Present','$date')";
	if($con->query($sql))
	{
		echo"<script>windows.open('add_attendance.php')</script>";
	}
}
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
                                    <h4 class="header-title">Your Class Student||<?php echo"$rollno || $class"; ?> </h4>
                                    <p class="text-right">
                                    <!--  <a href="add_student.php" class="btn btn-primary btn-radius">Add Student</a> -->
										<?php
											if(isset($_POST['submit']))
											{
												
												$sql = "SELECT * FROM student_details WHERE class='$class'";
												$res=$con->query($sql);
												while($row=$res->fetch_assoc())
												{
												$class=$row["class"];
												$rollno=$row["rollno"];
												$date=date("y-m-d");
												$sql="INSERT INTO stu_attendance (rollno,class,attendance,date) VALUES ('$rollno','$class','Present','$date')";
												$con->query($sql);
												
													echo"<script>windows.open('add_attendance.php')</script>";
												}
											}
											?>
										<form method="post" >	
											<select name="class" id="class" class="btn btn-primary" required>
												<?php
													echo "<option>All Present</option>";
												?>
											</select>
											<input type="submit" class="btn btn-info" value="submit" name="submit">
										</form>
										
                                    </p>
									<table class="table table-bordered toggle-circle mb-0" data-page-size="2">
                                            <thead>
                                            <tr>
                                                
                                                <th>Roll no</th>
                                                <th>attendance</th>
                                            </tr>
                                            </thead>
											<tbody>
											</tbody>
										</table>
                                    <div class="table-responsive">
										
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th>SI No</th>
                                                <th>Student Name</th>
                                                <th>Roll no</th>
                                                <th>Class</th>
												<th>Present</th>
                                                <th>Absent</th>
                                            </tr>
                                            </thead>
                                            <tbody>
										
											
                                                <?php
                                                    $sql="SELECT * FROM student_details WHERE class='$class'";
                                                    $res=$con->query($sql);
                                                    $i=0;
                                                    while($row=$res->fetch_assoc())
                                                    {
                                                        $i=$i+1;
                                                        $id=$row["id"];
                                                        $name=$row["student_name"];
                                                        $rollno=$row["rollno"];
                                                        $class=$row["class"];
														$date=$row["date"];
																										
                                                ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $rollno; ?></td>
                                                <td><?php echo $class; ?></td>
												<td>
                                                    <?php 
                                                        echo "<a href='add_attendance.php?present_id=$id'><i style='color:green;' class='fa fa-check'></i></a>"; 
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        echo "<a href='add_attendance'><i style='color:red;' class='fa fa-times'></i></a>"; 
                                                    ?>
                                                </td>
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
