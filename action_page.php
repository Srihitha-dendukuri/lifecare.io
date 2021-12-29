<?php
$patientid = $_POST['patientid'];
$name = $_POST['name'];
$numb = $_POST['numb'];

$gender=$_POST['gender'];
$symptoms = $_POST['symptoms'];
if(!empty($patient_id) || !empty($name) || !empty($numb) ||  !empty($gender) || !empty($symptoms)) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname ="test";
	//create connection
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
	}else{
		$SELECT ="SELECT patientid From patient Where patientid =? Limit 1";
		$INSERT = "INSERT Into patient (patientid, name, numb, gender, symptoms) values(?,?,?,?,?)";
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$patientid);
		$stmt->execute();
		$stmt->bind_result($patientid);
		$stmt->store_result();
		$stmt->store_result();
		$stmt->fetch();
		$rnum = $stmt->num_rows;
		if ($rnum==0) {
			$stmt->close();
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sssss", $patientid, $name, $numb, $gender, $symptoms);
			$stmt->execute();
			header('Location: index.html');
		}
		else{
			echo"someone already register using this patient ID";
		}
		$stmt->close();
		$conn->close();


      
      

	}
} else{
	echo "All field are required";
    die();

}
?>