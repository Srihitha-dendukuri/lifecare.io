<?php
$ppatientid = $_POST['ppatientid'];
$prescription = $_POST['prescription'];
$suggestions = $_POST['suggestions'];

if(!empty($ppatientid) || !empty($prescription) || !empty($suggestions)) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname ="test";
	//create connection
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
	}else{
		$SELECT ="SELECT ppatientid From doctor2 Where ppatientid =? Limit 1";
		$INSERT = "INSERT Into doctor2 (ppatientid, prescription, suggestions) values(?,?,?)";
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$ppatientid);
		$stmt->execute();
		$stmt->bind_result($ppatientid);
		$stmt->store_result();
		$stmt->store_result();
		$stmt->fetch();
		$rnum = $stmt->num_rows;
		if ($rnum==0) {
			$stmt->close();
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sss", $pptientid, $prescription, $suggestions);
			$stmt->execute();
			echo"yes";
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