<!DOCTYPE html>
<html>
<head>
	<title>patients list</title>
	<style type="text/css">
		table{
		border-collapse: collapse;
		width: 100%;
		color: #000304;
		fort-family: monospace;
		font-size: 25px;
		text-align: left;
	}
	th{
		background-color: #17AAD7;
		color: white;
	}
	tr:nth-child(even){background-color: #f2f2f2}
	</style>
</head>
<body>
	<div id="navbar" class="navbar-collapse collapse">
                     <ul class="nav navbar-nav">
                        <li><a class="active" href="Doctor2.html">report</a></li>
                    </ul>
                </div>
    

	<table>
		<tr>
			<th>Patient Id</th>
			<th>Name</th>
			<th>Number</th>
			
			<th>Gender</th>
			<th>Symptoms</th>
			
		</tr>
		<?php
		$conn = mysqli_connect("localhost","root","","test");
		if($conn-> connect_error){
			die("Connection failed:". $conn-> connect_error);
		}
		$sql = "SELECT patientid, name, numb, gender, symptoms from patient";
		$result = $conn-> query($sql);
		if($result-> num_rows > 0){
			while($row =$result-> fetch_assoc()){
				echo "<tr><td>". $row["patientid"] . "</td><td>". $row["name"]. "</td><td>". $row["numb"]. "</td><td>". $row["gender"]. "</td><td>". $row["symptoms"]. "</td><td>";
			}
			echo "</table>";
		}
		else{
			echo "0 result";
		}
		$conn-> close();


		?>

	</table>
	
</body>
</html>