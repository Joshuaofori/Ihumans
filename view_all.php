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
	
	
	<table class="table table-striped">
<tr>
	<th>Serial Number</th><th>Dates</th><th>Show Attendance</th>
	</tr>
	<?php $result=mysqli_query($con,"select distinct date from attendance_records");
	$serialNumber=0;
	
	while($row=mysqli_fetch_array($result))
	{
		$serialNumber++;
		
		
		
		?>
		
		
		<tr>
		<td><?php echo $serialNumber;?></td>
		<td><?php echo $row['date']; ?> 
		</td>
		<td>
		
		<form action="show_attendence.php" method="POST">
		<input type="hidden" value=<?php echo $row['date'] ?> name="date">
		<input type="submit" value="show Attendance" class="btn btn-primary">
		
		
		
		</form>
		
		
		</td>
		
		</tr>
		
		<?php
		
	}
	
	?>
	</table>
	
	
	
	
	
	 </div>
	 
</div>	 