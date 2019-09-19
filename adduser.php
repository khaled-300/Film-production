<?php

if (isset($_POST['addUser'])){
  require ('database.php');

  $username      = $_POST['username'];
  $email         = $_POST['email'];
  $Passuser      = $_POST['passuser'];
  $Passuserrepeat= $_POST['Passuser-repeat'];

  if (empty($username) ||empty($email) ||empty($Passuser)||empty($Passuserrepeat)) {
     	header("Location: signup.php?error=emptyfields&username=".$username."email=".$email);
      exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)
   && !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$username)) {
    header("Location: signup.php?error=Invalidemailid");
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: signup.php?error=Invalidemailusername".$username);
    exit();
  }
  else if ($Passuser !== $Passuserrepeat) {
    header("Location: signup.php?error=passwordcheck&username=".$username."email=".$email);
    exit();
  }
else {
  $sql = "SELECT username FROM users WHERE username=?";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: signup.php?error=sqlerror");
    exit();
  }
  else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck > 0) {
      header("Location: signup.php?error=usertaken&email=".$email);
      exit();
    }
    else {
      $sql = "INSERT INTO users (username, email ,password) VALUES (?,?,?)";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: signup.php?error=sqlerror");
        exit();
      }
      else {
        $hashedpassword = password_hash($Passuser, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $username , $email, $hashedpassword);
        mysqli_stmt_execute($stmt);
        header("Location: signup.php?signup=success");
        exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
else {
  header("Location: signup.php");
  exit();
}
?>
