<?php
$pid = $_POST['pid'];
$prescriptions = $_POST['prescriptions'];
$suggestions = $_POST['suggestions'];


if(!empty($pid) || !empty($prescriptions) || !empty($suggestions) ) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword ="";
	$dbname ="test";
	//create connection
	$conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
	if(mysqli_connect_error()){
		die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
	}else{
		$SELECT ="SELECT pid From doctor Where pid =? Limit 1";
		$INSERT = "INSERT Into doctor (pid, prescriptions, suggestions) values(?,?,?)";
		$stmt = $conn->prepare($SELECT);
		$stmt->bind_param("s",$pid);
		$stmt->execute();
		$stmt->bind_result($pid);
		$stmt->store_result();
		$stmt->store_result();
		$stmt->fetch();
		$rnum = $stmt->num_rows;
		if ($rnum==0) {
			$stmt->close();
			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("sss", $pid, $prescriptions, $suggestions);
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