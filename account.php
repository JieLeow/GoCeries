<?php
  session_start();
  include('db_conn.php');
  if (isset($_SESSION['user_id']) && isset($_SESSION['user_loginname'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products | Go!Ceries</title>

    <!-- Add boostrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- OWN CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- HEADER -->
    <?php
        include('phpTemplates/header.php');
    ?>

    <div class="account-info">
        <div class="container">
            <div>
              <h2 style="text-align:center"><b><?php echo $_SESSION['user_name']; ?>'s Account Information</b></h2>
                <table style="width:40%">
                  <tr><h6><b>User Information</b></h6> </tr>
                  <tr>
                    <td>Name:</td>
                    <td><?php echo $_SESSION['user_name']; ?></td>
                  </tr>
                  <tr>
                    <td>User Name:</td>
                    <td><?php echo $_SESSION['user_loginname']; ?></td>
                  </tr>
                </table>
                <table style="width:40%">
                  <tr><h6><b>Contact Information</b></h6> </tr>
                  <tr>
                    <td>Email Address:</td>
                    <td><?php echo $_SESSION['payment_email']; ?></td>
                  </tr>
                  <tr>
                    <td>Shippping Address</td>
                    <td><?php echo $_SESSION['payment_address']; ?></td>
                  </tr>
                </table>
                <table style="width:40%">
                  <tr><h6><b>Change password</b></h6></tr>
                  <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
                    <div style="width:500px;">
                      <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
                      <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
                        <tr>
                          <td width="40%"><label>Current Password</label></td>
                          <td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
                        </tr>
                        <tr>
                          <td><label>New Password</label></td>
                          <td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
                        </tr>
                        <td><label>Confirm Password</label></td>
                        <td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
                      </tr>
                      <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
                      </tr>
                    </table>
                  </div>
                </form>
              </table>
            </div>
          </div>
        </div>

        <script>
        function validatePassword() {
          var currentPassword,newPassword,confirmPassword,output = true;

          currentPassword = document.frmChange.currentPassword;
          newPassword = document.frmChange.newPassword;
          confirmPassword = document.frmChange.confirmPassword;

          if(!currentPassword.value) {
            currentPassword.focus();
            document.getElementById("currentPassword").innerHTML = "required";
            output = false;
          }
          else if(!newPassword.value) {
            newPassword.focus();
            document.getElementById("newPassword").innerHTML = "required";
            output = false;
          }
          else if(!confirmPassword.value) {
            confirmPassword.focus();
            document.getElementById("confirmPassword").innerHTML = "required";
            output = false;
          }
          if(newPassword.value != confirmPassword.value) {
            newPassword.value="";
            confirmPassword.value="";
            newPassword.focus();
            document.getElementById("confirmPassword").innerHTML = "not same";
            output = false;
          }
          return output;
        }
      </script>




<?php
    include('phpTemplates/footer.php');
    //$_SESSION["userId"] = "9";
    if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='" . $_SESSION["user_id"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["user_password"]) {
        mysqli_query($conn, "UPDATE users set user_password='" . $_POST["newPassword"] . "' WHERE user_id='" . $_SESSION["user_id"] . "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
}
?>
<?php
}else{
     header("Location: loginregister.php?error=You need to login before shopping");
     exit();
}
 ?>
