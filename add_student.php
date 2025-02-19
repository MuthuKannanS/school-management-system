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
		
		<div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                <?php
                    if(isset($_GET["edit_id"]))
                    {
                        $edit_id=$_GET["edit_id"];
                        $sql="SELECT * FROM student_details WHERE id='$edit_id'";
                        $res=$con->query($sql);
                        if($row=$res->fetch_assoc())
                        {
                            $id=$row["id"];
							$name=$row["student_name"];
							$class=$row["class"];
                            $rollno=$row["rollno"];
                            $Password=$row["password"];
                        }
                   
                ?>
              

                    <!-- Form row -->
                    <div class="row" style="margin-left: 220px;">
                        <div class="col-10">
                            <div class="card" style="padding: 61px;border:none;">
                                <div class="card-body">
                                    <h4 class="header-title">Edit Student Details Here</h4>
                                    <p class="text-danger text-mute font-13"><code class="highlighter-rouge"></code></p>
                                    <form method="post" class="parsley-examples">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Name</label>
                                                <input type="text" class="form-control" name="name" value='<?php echo $name; ?>' required>
                                            </div>
											<div class="form-group col-md-6">
                                                <label class="col-form-label">Password</label>
                                                <input type="Password" class="form-control" name="password" value='<?php echo $Password; ?>' required>
                                            </div>
											<div class="form-group col-md-6">
                                                <label class="col-form-label">Class</label>
                                                <select name="class" id="class" class="form-control" required>
                                                    <?php
                                                        echo "<option></option>";
                                                        echo "<option value='6'>6th</option>";
                                                        echo "<option value='7'>7th</option>";
                                                        echo "<option value='8'>8th</option>";
                                                        echo "<option value='9'>9th</option>";
                                                        echo "<option value='10'>10th</option>";
														
                                                    ?>
                                                </select>
                                            </div>

                                        </div>


                                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="Edit Staff" name="edit">

                                    </form>

                                    <?php
                                        if(isset($_POST["edit"]))
                                        {
                                            $name=$_POST["name"];
											$Password=$_POST["password"];
											$class=$_POST["class"];
                                           
                                            $sql="UPDATE student_details SET student_name='$name',password='$password',class='$class' WHERE id='$edit_id'";
                                            if($con->query($sql))
                                            {
                                                echo "<script>window.open('student_details.php','_self')</script>";
                                            }
                                            else
                                            {
                                                echo "<script>window.open('add_student.php','_self')</script>";
											}
                                        }
                                    ?>

                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                    <?php
                     }
                     else
                     {
                    ?>
					<!-- start page title -->
					<div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Add Login Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Form row -->
                    <div class="row" style="margin-left: 220px;">
                        <div class="col-10">
                            <div class="card" style="padding: 61px;border:none;">
                                <div class="card-body">
                                    <h4 class="header-title">Add Student Here</h4>
                                    <p class="text-danger text-mute font-13"><code class="highlighter-rouge"></code></p>
                                    <form method="post" class="parsley-examples">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Name</label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
											<div class="form-group col-md-6">
                                                <label class="col-form-label">Password</label>
                                                <input type="Password" class="form-control" name="password" required>
                                            </div>
											<div class="form-group col-md-6">
                                                <label class="col-form-label">Class</label>
                                                <select name="class" id="class" class="form-control" required>
                                                    <?php
                                                        echo "<option></option>";
                                                        echo "<option value='6'>6th</option>";
                                                        echo "<option value='7'>7th</option>";
                                                        echo "<option value='8'>8th</option>";
                                                        echo "<option value='9'>9th</option>";
                                                        echo "<option value='10'>10th</option>";
														
                                                    ?>
                                                </select>
                                            </div>

                                        </div>

                                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="Add Student" name="add">

                                    </form>
                                    <?php
                                        if(isset($_POST["add"]))
                                        {
                                            $date=date("Y-m-d");
                                            $name=$_POST["name"];
											$sql1="SELECT * FROM student_code";
											$res=$con->query($sql1);
											$row=$res->fetch_assoc();
											$old_student_id=$row["stu_code"];
											$student_id=$old_student_id+1;
											$sql2="UPDATE student_code SET stu_code='$student_id'";
											$con->query($sql2);
											$rollno="SMK_S$student_id";
											$password=$_POST["password"];
											$class=$_POST["class"];
											$sql="INSERT INTO login_details (name,username,password,role,date) VALUES ('$name','$rollno','$password','Student','$date')";
											$con->query($sql);
                                            $sql="INSERT INTO student_details (student_name,password,rollno,class,date) VALUES ('$name','$password','$rollno','$class','$date')";
                                            if($con->query($sql))
                                            {
                                                echo "<script>window.open('student_details.php','_self')</script>";
                                            }
                                            else
                                            {
                                                echo "<script>window.open('add_student.php','_self')</script>";
											}
                                        }
                                    ?>

                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                    <?php
                     }
                    ?>

                </div> <!-- container -->

            </div> <!-- content -->
	</body>
</html>
<?php 
	}
?>
