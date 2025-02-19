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
                        $sql="SELECT * FROM staff_details WHERE id='$edit_id'";
                        $res=$con->query($sql);
                        if($row=$res->fetch_assoc())
                        {
                            $id=$row["id"];
							$name=$row["name"];
                            $username=$row["username"];
                            $email=$row["email"];
                            $rollno=$row["rollno"];
                            $Password=$row["password"];
                            $class=$row["class"];
                        }
                   
                ?>
              

                    <!-- Form row -->
                    <div class="row" style="margin-left: 220px;">
                        <div class="col-10">
                            <div class="card" style="padding: 61px;border:none;">
                                <div class="card-body">
                                    <h4 class="header-title">Edit Staff Details Here</h4>
                                    <p class="text-danger text-mute font-13"><code class="highlighter-rouge"></code></p>
                                    <form method="post" class="parsley-examples">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Name</label>
                                                <input type="text" class="form-control" name="name" value='<?php echo $name; ?>' required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Username</label>
                                                <input type="text" class="form-control" name="username" value='<?php echo $username; ?>'required>
                                            </div>
											<div class="form-group col-md-6">
                                                <label class="col-form-label">Email</label>
                                                <input type="email" class="form-control" name="email" value='<?php echo $email; ?>' required>
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
											$username=$_POST["username"];
											$email=$_POST["email"];
											$Password=$_POST["password"];
											$class=$_POST["class"];
                                           
                                            $sql="UPDATE staff_details SET name='$name',username='$username',email='$email',password='$password',class='$class' WHERE id='$edit_id'";
                                            if($con->query($sql))
                                            {
                                                echo "<script>window.open('staff_details.php','_self')</script>";
                                            }
                                            else
                                            {
                                                echo "<script>window.open('add_staff.php','_self')</script>";
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
                                    <h4 class="header-title">Add Staff Here</h4>
                                    <p class="text-danger text-mute font-13"><code class="highlighter-rouge"></code></p>
                                    <form method="post" class="parsley-examples">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Name</label>
                                                <input type="text" class="form-control" name="name" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Username</label>
                                                <input type="text" class="form-control" name="username" required>
                                            </div>
											<div class="form-group col-md-6">
                                                <label class="col-form-label">Email</label>
                                                <input type="email" class="form-control" name="email" required>
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

                                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="Add Staff" name="add">

                                    </form>
                                    <?php
                                        if(isset($_POST["add"]))
                                        {
                                            $date=date("Y-m-d");
                                            $name=$_POST["name"];
                                            $username=$_POST["username"];
                                            $password=$_POST["password"];
                                            $email=$_POST["email"];
											$sql="SELECT * FROM staff_code";
											$res=$con->query($sql);
											$row=$res->fetch_assoc();
											$old_staff_id=$row["t_code"];
											$staff_id=$old_staff_id+1;
											$sql="UPDATE staff_code SET t_code='$staff_id'";
											$con->query($sql);
											$rollno="SMK_T$staff_id";
											$class=$_POST["class"];
											$role="Teacher";
                                            $sql="INSERT INTO login_details (name,username,password,role,date) VALUES ('$name','$username','$password','$role','$date')";
											$con->query($sql);
											$sql="INSERT INTO staff_details (name,username,email,rollno,password,class,date) VALUES ('$name','$username','$email','$rollno','$password','$class','$date')";
                                            if($con->query($sql))
                                            {
                                                echo "<script>window.open('staff_details.php','_self')</script>";
                                            }
                                            else
                                            {
                                                echo "<script>window.open('add_staff.php','_self')</script>";
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
