<?php 
		session_start();
		include 'db.php';
		
			$chk_del_sql="DELETE FROM users WHERE u_id='$_SESSION[login]' ";
			$chk_del_run=mysqli_query($conn,$chk_del_sql);
			unset($_SESSION['login']);
			unset($_SESSION['name']);
			unset($_SESSION['email']);
			header("location:index.php?delete_account=true");

		?>
		