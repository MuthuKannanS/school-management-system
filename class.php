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
                    <!-- Start Content-->
                    <div class="container-fluid">
						<div class="row" style="margin-left: 220px;">
                            <div class="col-10">
                                <div class="card-box" style="padding: 61px;">
                                    <h4 class="header-title">Class List</h4>
                                    <p class="text-right">
									<form method="post" >
										<select name="class"  class="btn btn-info" required>
											<?php
												echo "<option>Select</option>";
												echo "<option value='6'>6th</option>";
												echo "<option value='7'>7th</option>";
												echo "<option value='8'>8th</option>";
												echo "<option value='9'>9th</option>";
												echo "<option value='10'>10th</option>";
												
											?>
										</select>
										<input type="submit" class="btn btn-info" value="submit" name="submit">
									</form>
                                    </p>
									<div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th>SI No</th>
                                                <th>Student Name</th>
                                                <th>Roll no</th>
                                                <th>Class</th>
                                                <th>Date Of Joining</th>
											</tr>
                                            </thead>
                                            <tbody>
											<?php
												if(isset($_POST['submit']))
												{
													$class=$_POST["class"];
													$sql="SELECT * FROM student_details WHERE class='$class'";
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
												}
												else
												{
													$sql="SELECT * FROM student_details";
													$res=$con->query($sql);
													$i=0;
													while($row=$res->fetch_assoc())
													{
														$i=$i+1;
														$id=$row["id"];
														$name=$row["student_name"];
														$rollno=$row["rollno"];
														$date=$row["date"];
														$class=$row["class"];
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
