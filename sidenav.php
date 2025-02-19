<!-- side bar--!>
	<div class="left-side-menu">
	<div class="slimscroll-menu">
		<!--- Sidemenu -->
		<div id="sidebar-menu">
			<ul class="metismenu" id="side-menu">
				<?php
					$username=$_SESSION["username"];
					$sql="SELECT * FROM login_details WHERE username='$username'";
					$res=$con->query($sql);
					$row=$res->fetch_assoc();
					$role=$row["role"];
					if($role=="Admin")
					{
				?>
				<li class="menu-title">Principal</li>
				<li><a href="admin.php"><span class="badge badge-info badge-pill float-right"></span></span><span>Dashboard</span></a></li>
				<li><a href="class.php"><i class="fe-airplay"></i><span class="badge badge-info badge-pill float-right"></span></span><span> Class </span></a>
				</li>
				<li><a href="student_details.php"><i class="fe-package"></i><span class="badge badge-info badge-pill float-right"></span></span><span> Student </span></a>
				</li>
				<li><a href="staff_details.php"><i class="fe-shopping-cart"></i><span class="badge badge-info badge-pill float-right"></span></span><span> Teacher </span></a>
				</li>
				<li><a href="view_attendance.php"><i class="fe-users"></i><span class="badge badge-info badge-pill float-right"></span></span><span> View attendance </span></a></li>
				<li><a href="logout.php"><i class="fe-users"></i><span class="badge badge-info badge-pill float-right"></span></span><span> logout </span></a></li>
				<?php
					}
					elseif($role=="Teacher")
					{
				?>
				<li class="menu-title">Teacher</li>
				<li><a href="student_details.php"><i class="fe-home"></i><span class="badge badge-info badge-pill float-right"></span></span><span>Students</span></a></li>
				<li><a href="add_attendance.php"><i class="fe-airplay"></i><span class="badge badge-info badge-pill float-right"></span></span><span>Add Attendance</span></a></li>
				<li><a href="view_attendance.php"><i class="fe-airplay"></i><span class="badge badge-info badge-pill float-right"></span></span><span>View Attendance</span></a></li>
				<li><a href="logout.php"><i class="fe-users"></i><span class="badge badge-info badge-pill float-right"></span></span><span> logout </span></a></li>
				<?php 
					}
					else
					{
				?>
						<li class="menu-title">Student</li>
						<li><a href="view_attendance.php"><i class="fe-home"></i><span class="badge badge-info badge-pill float-right"></span></span><span>View Attendance</span></a></li>
						<li><a href="logout.php"><i class="fe-users"></i><span class="badge badge-info badge-pill float-right"></span></span><span> logout </span></a></li>
					
				<?php
					}
				?>
				
				
				
			</ul>
		</div>
		<!-- End Sidebar -->
		<div class="clearfix"></div>
	</div>
</div>