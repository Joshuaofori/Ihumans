<?php
include("db.php");
include("h.php");


?>
<div class="panel panel-default">

     <div class="panel panel-heading">
	 <h2>
	 <a class="btn btn-success" href="add.php">Add Students</a>
    
	<a class="btn btn-info pull-right " href="index.php"> Back</a>
	</h2>
	
	
	<div class=" panel panel-body">
	<form action ="index.php" method="Post">
	
	<table class="table table-striped">
<tr>
	<th>#serial Number</th><th>Student Name</th><th>Index Number</th><th>Attendance Status</th>
	</tr>
	<?php $result=mysqli_query($con,"select * from attendance_records where date='$_POST[date]'");
	$serialNumber=0;
	$counter=0;
	while($row=mysqli_fetch_array($result))
	{
		$serialNumber++;
		
		
		
		?>
		
		
		<tr>
		<td><?php echo $serialNumber;?></td>
		<td><?php echo $row['student_name']; ?> 
        
		</td>
		<td><?php echo $row['index_number']; ?>  
		
		
		</td>
		<td>
		<input type="radio" name="attendance_status[<?php echo $counter; ?>]"
       <?php if($row['attendance_status']=="present")
		   echo "checked=checked";
		   ?>
		value="present">present
		 <input type="radio" name="attendance_status[<?php echo $counter; ?>]" 
		 <?php if($row['attendance_status']=="absent")
		   echo "checked=checked";
		   ?>
		 value="absent">absent
		
		
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