<?php 
 include"config.php";
 session_start();
 if (isset($_SESSION["username"]))  
	{
		header("location:admin.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include"header.php" ?>
</head>

<body>
    
	<?php include"topnav.php"?>
 <!-- Contact Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Login</h5>
                <h1>Login to view </h1>
            </div>
            <div class="row justify-content-center">
			  <div class="col-lg-4">
                    <div style="background-color:#5e8d8d;"class="contact-form rounded p-5">
                        <div id="success">
							<?php
								if(isset($_GET["mes"]))
								{
									echo ' <p style="color:white;">Please Login Here!</p>';
								}
							?>
						</div>
                        <form method="post" >
                            <div class="control-group">
                                <input type="text" class="form-control border-0 p-4" name="username" id="rollno" placeholder="Your ID" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="password" class="form-control border-0 p-4" name="password" id="password" placeholder="Your Password" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-3 px-5" name="submit" value="submit" type="submit">Login</button>
                            </div>
                        </form>
						<?php
							if(isset($_POST["submit"]))
							{
								$username=$_POST["username"];
								$password=$_POST["password"];
								$sql="SELECT * FROM login_details WHERE username='$username' AND password='$password'";
								$res=$con->query($sql);
								if($row=$res->fetch_assoc())
								{
									$username=$row["username"];
								
									if($role=$row["role"])
									{
										$_SESSION["username"]=$username;
										echo "<script> window.open('admin.php','_self');</script>";
									}
						
									else
									{
										
										echo "<script> window.open('index.php','_self');</script>";
									}
								}
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

	<?php include"footer.php" ?>
</body>

</html>