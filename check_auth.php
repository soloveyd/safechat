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
	
	if(isset($_POST['phone_id'])){
		$phone_id = $_POST['phone_id'];
		$query = mysqli_query($con,"select username, password, salt from user;") or die(mysqli_error($con));
		$response['exists'] = 0;
		while($row = mysqli_fetch_row($query)){
			if(md5($row[2] . $phone_id) == $row[1]){
				$response['username'] = $row[0];
				$response['exists'] = 1;
				break;
			}
		}
		$response['success']=1;
	}else{
		$response['success']=0;		
	}
	echo json_encode($response);
?>