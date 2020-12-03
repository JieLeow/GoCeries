
<?php
session_start();
  include('db_conn.php');

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
		$sql = "SELECT * FROM users WHERE user_loginname='$userid' ";
  $hashpass = md5($pass);
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_loginname'] === $userid && $row['user_password'] === $pass || $row['user_password'] === $hashpass) {
            	$_SESSION['user_loginname'] = $row['user_loginname'];
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['user_id'] = $row['user_id'];
              	$_SESSION['user_email'] = $row['user_email'];
            	header("Location: mainPage.php");
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
