<?php
	//connect to the database
	require_once __DIR__ . '/db_config.php';
	$con=mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);
	// Check connection
	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	
	$response = array();
	
	if(isset($_POST['phone_id']) && isset($_POST['username']) && ($_POST['salt'])){
		$phone_id = $_POST['phone_id'];		
		$username = $_POST['username'];
		$salt = $_POST['salt'];
		$query = mysqli_query($con,"insert into user(username,password,salt) values('$username', '$phone_id', '$salt');") 
			or die(mysqli_error($con));
		$response['success']=1;
	}else{
		$response['success']=0;		
	}
	echo json_encode($response);
?>