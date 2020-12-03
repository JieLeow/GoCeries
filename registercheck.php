<?php
session_start();
  include('db_conn.php');


if (isset($_POST['username']) && isset($_POST['password'])
&&isset($_POST['userid']) && isset($_POST['re_password'])
&& isset($_POST['email'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$pass = validate($_POST['password']);
  $re_pass = validate($_POST['re_password']);
  $userid = validate($_POST['userid']);
  $email = validate($_POST['email']);
  $user_data = 'userid=' . $userid. '&username='. $username;


	if (empty($username)) {
		header("Location: loginregister.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: loginregister.php?error=Password is required&$user_data");
	    exit();
	}
  else if(empty($re_pass)){
        header("Location: loginregister.php?error=Re_Password is required&$user_data");
	    exit();
	}
  else if(empty($userid)){
        header("Location: loginregister.php?error=User Id is required&$user_data");
	    exit();
	}
  else if(empty($email)){
        header("Location: loginregister.php?error=Email is required&$user_data");
	    exit();
	}
  else if($pass !== $re_pass){
        header("Location: loginregister.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}


  else{

    // hashing the password
          $pass = md5($pass);

  	    $sql = "SELECT * FROM users WHERE user_loginname='$userid' ";
        $sql1 = "SELECT * FROM users WHERE user_email='$email' ";
  		$result = mysqli_query($conn, $sql);
      $result1 = mysqli_query($conn, $sql1);


  		if (mysqli_num_rows($result) > 0) {
  			header("Location: loginregister.php?error=The username is taken try another&$user_data");
  	        exit();
  		} else if(mysqli_num_rows($result1) > 0) {
        header("Location: loginregister.php?error=The email is taken try another");
  	        exit();
      }
      else {
             $sql2 = "INSERT INTO users(user_loginname, user_password, user_name, user_email) VALUES('$userid', '$pass', '$username','$email')";
             $result2 = mysqli_query($conn, $sql2);
             if ($result2) {
             	 header("Location: loginregister.php?success=Your account has been created successfully");
  	         exit();
             }else {
  	           	header("Location: loginregister.php?error=unknown error occurred&$user_data");
  		        exit();
             }
  		}
  	}

}else{
	header("Location: loginregister.php");
	exit();
}
