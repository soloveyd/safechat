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
	
	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$query = mysqli_query($con,"select count(uid) as user_count from user where username='$username';") or die(mysqli_error($con));
		$row = mysqli_fetch_array($query);
		$response['count'] = $row['user_count'];
		$response['success']=1;
	}else{
		$response['success']=0;		
	}
	echo json_encode($response);
?>