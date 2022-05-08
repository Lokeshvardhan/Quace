<?php 
	session_start();
	
	include 'db.php';
	//Output any connection error
	if ($conn->connect_error) {
		die('Error : (' . $conn->connect_errno . ') ' . $conn->connect_error);
	}

	$content = mysqli_real_escape_string($conn, $_POST['content']);
	$q_id = mysqli_real_escape_string($conn, $_POST['q_id']);
				$insert_row = $conn->query("INSERT INTO answers (q_id,a_provider, a_content) VALUES ('$q_id','$_SESSION[name]','$content')");

				if ($insert_row) {

					echo 'true';
				}
				else {

				echo 'false';

				}
?>