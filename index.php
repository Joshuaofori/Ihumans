<?php
include("db.php");
include("h.php");

$flag=0;
$update=0;
 if(isset($_POST['submit']))
 {
	 $date =date("Y-m-d");
	 $records=mysqli_query($con,"select * from attendance_records where date='$date'");
	 $num=mysqli_num_rows($records);
	 if($num)
	 {
		foreach($_POST['attendance_status'] as $id=>$attendance_status)
	   {
		$student_name= $_POST['student_name'][$id];
		 $index_number=$_POST['index_number'][$id];
		 
		 $date=date("Y-m-d H:i:s");
		 
		 
		 $result=mysqli_query($con,"update attendance_records set student_name='$student_name',index_number='$index_number',attendance_status='$attendance_status',date='$date'where date='$date'");
	    if($result)
	    {
			$update=1;
		}
	   } 
		 
	 }
	 else
	 {
	  foreach($_POST['attendance_status'] as $id=>$attendance_status)
	   {
		$student_name= $_POST['student_name'][$id];
		 $index_number=$_POST['index_number'][$id];
		 
		 $date=date("Y-m-d H:i:s");
		 
		 
		 $result=mysqli_query($con,"insert into attendance_records(student_name,index_number,attendance_status,date)values('$student_name','$index_number','$attendance_status','$date')");
	    if($result)
	    {
			$flag=1;
		}
	   }
	 }
	 
 }


?>
<div class="panel panel-default">

     <div class="panel panel-heading">
	 <h2>
	 <a class="btn btn-success" href="add.php">Add Students</a>
    
	<a class="btn btn-info pull-right " href="view_all.php"> view_all</a>
	</h2>
	<?php if($flag) {?>
	<div class="alert alert-success">
	
	Attendance Data Insert Successfuly
	
	</div>
	<?php  } ?>
	<?php if($update) {?>
	<div class="alert alert-success">
	
	Attendance Data Updated Successfuly
	
	</div>
	<?php  } ?>
	
	<H3><div class="well text-center">Date:<?php echo date("Y-m-d"); ?></div></H3>
	
	<div class=" panel panel-body">
	<form action ="index.php" method="Post">
	
	<table class="table table-striped">
<tr>
	<th>#serial Number</th><th>Student Name</th><th>Index Number</th><th>Attendance Status</th>
	</tr>
	<?php $result=mysqli_query($con,"select * from attendance");
	$serialNumber=0;
	$counter=0;
	while($row=mysqli_fetch_array($result))
	{
		$serialNumber++;
		
		
		
		?>
		
		
		<tr>
		<td><?php echo $serialNumber;?></td>
		<td><?php echo $row['student_name']; ?> 
        <input type="hidden" value="<?php echo $row['student_name']; ?> " name="student_name[]">
		</td>
		<td><?php echo $row['index_number']; ?>  
		<input type="hidden" value="<?php echo $row['index_number']; ?> " name="index_number[]">
		
		</td>
		<td>
		
		
		<input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="present" 
		<?php if(isset($_POST['attendance_status'][$counter])&& $_POST['attendance_status'][$counter]=="present"){
		echo "checked=checked";
		}
		?>
		required>present
		 <input type="radio" name="attendance_status[<?php echo $counter; ?>]" value="absent"
         <?php if(isset($_POST['attendance_status'][$counter])&& $_POST['attendance_status'][$counter]=="absent"){
		echo "checked=checked";
		}
		?>
		 required>absent
		
		
		</td>
		</tr>
		
		<?php
		$counter++;
	}
	
	
	
	
	
	?>
	


	</table>
	
	
	<input type="submit" name="submit" value="submit" class="btn btn-primary" >
	
	</form>
	 </div>
	 
</div>	 