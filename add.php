
<?php
include("h.php");

include ("db.php");

$flag=0;
if(isset($_POST['submit']))
{
            mysqli_query($con,"INSERT INTO user(username,password) VALUES('$_POST[name]','$_POST[index]')");
	$result=mysqli_query($con,"INSERT INTO attendance(student_name,index_number) VALUES('$_POST[name]','$_POST[index]')");

if($result)
{
	$flag=1;
	
}

}



?>



<div class ="panel panel-default">

<?php if($flag) {   ?>

<div class="alert alert-success">

<strong>!success></strong>attendance data successfully inserted;

</div>

<?php } ?>





   <div class ="panel-heading">
<h2>
<a class ="btn btn-success"href="add.php">Add student</a>
<a class ="btn btn-info pull-right"href="index.php">Back</a>
</h2>
</div>

<div class="panel-body">

<form action="add.php"method="post">

<div class="form-group">
<label for="name">Student Name</label>
<input type="text" name="name" id ="name" class="form-control" required>
</div>

<div class="form-group">
<label for="index"> Index Number</label>
<input type="text" name="index" id="index" class="form-control" required>
</div>


<div class="form-group">
<input type="submit" name="submit" value="submit" class="btn btn-primary" required>

</div>
