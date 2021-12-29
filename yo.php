<!DOCTYPE html>
<html>
<head>
	<title> Health Records</title>
	<style>
    body {background-image: url("https://static.wixstatic.com/media/be1a87_72daef73027f46c0a83bc2b458e75063~mv2.jpg");}
div {
  background-color: white;
  height: 500px;
  width: 500px;
  border: 10px solid black;
  padding: 50px;
  margin: 30px;
  border-radius: 50px 50px 50px 50px;    
}
</style>
</head>
<body>
	<center>
		<div><form action="" method="POST">
			<label for="pid">Patient ID :</label>
			<input type="text" id="pid" name="pid" placeholder="Enter Patient Id" required><br><br>
			<input type="submit" name="search" value="Search Data"></form><br><br>
<?php 
$connection= mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'test');

if(isset($_POST['search']))
{
	$pid = $_POST['pid'];
	$query="SELECT *FROM doctor where pid='$pid' ";
	$query_run= mysqli_query($connection, $query);
	 while($row = mysqli_fetch_array($query_run))
	 {

	 	?>


	 	    <form action="" method="POST">
	 	    	<label for="pid">PATIENT ID: </label>
	 	    	
	 	    	<input type="text" name="pid" value="<?php echo $row['pid'] ?>" /><br><br>
	 	    	<label for="prescription">Prescription: </label>
	 	    	
	 	    	<input  type="text" name="prescriptions" value="<?php echo $row['prescriptions'] ?>" rows="4" cols="40">
	 	    	</input><br><br>
	 	    	<lable for="suggestions">Suggestions: </lable>
	 	    	<input type="text" name="suggestions" value="<?php echo $row['suggestions'] ?>" rows="4" cols="40"> </input><br><br>
	 	    </form>



	 	<?php



	 }

}
?>
</div>
  
	</center>

</body>
</html>