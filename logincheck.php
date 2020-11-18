
<?php
session_start();
include "db_conn.php";;
if (isset($_POST['userid']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$userid = validate($_POST['userid']);
	$pass = validate($_POST['password']);

	if (empty($userid)) {
		header("Location: loginregister.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: loginregister.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_name='$userid' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
		
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $userid && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: account.php");
		        exit();
            }else{
				header("Location: loginregister.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: loginregister.php?error=Incorect User name or password");
	        exit();
		}
	}

}else{
	header("Location: loginregister.php");
	exit();
}
