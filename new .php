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
		$sql="SELECT * FROM student_details LEFT JOIN stu_attendance ON student_details.rollno=stu_attendance.rollno WHERE stu_attendance.attendance IS NULL";
		$res=$con->query($sql);
		$row=$res->fetch_assoc();
		$class=$row["class"];
		$rollno=$row["rollno"];
		$date=date("y-m-d");
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