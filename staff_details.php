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
if(isset($_GET['delete_id']))
{
	$delete_id=$_GET['delete_id'];
	$sql = "DELETE FROM staff_details WHERE id='$delete_id'";
	if($con->query($sql))
	{
		echo"<script>windows.open('staff_details.php')</script>";
	}
	else
	{
		echo"<script>windows.open('admin.php')</script>";
		
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

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-10">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">Login Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row" style="margin-left: 220px;">
                            <div class="col-10">
                                <div class="card-box" style="padding: 61px;">
                                    <h4 class="header-title">Staff List</h4>
                                    <p class="text-right">
                                      <a href="add_staff.php" class="btn btn-primary btn-radius">Add Staff</a>
                                    </p>
                                    
                                    <div class="table-responsive">
                                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th>SI No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Class</th>
                                                <th>Rollno</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql="SELECT * FROM staff_details";
                                                    $res=$con->query($sql);
                                                    $i=0;
                                                    while($row=$res->fetch_assoc())
                                                    {
                                                        $i=$i+1;
                                                        $id=$row["id"];
                                                        $name=$row["name"];
                                                        $email=$row["email"];
                                                        $class=$row["class"];
														$rollno=$row["rollno"];
                                                ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $class; ?></td>
                                                <td><?php echo $rollno; ?></td>
                                                <td>
                                                    <?php 
                                                        echo "<a href='add_staff.php?edit_id=$id'><i style='color:green;' class='fa fa-edit edit'></i></a>"; 
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                        echo "<a href='staff_details.php?delete_id=$id'><i style='color:red;' class='fa fa-trash delete'></i></a>"; 
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
