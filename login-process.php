<?php
require ('database.php');
$message = '';
$usertype = '';
// If form submitted, insert values into the database.
if (isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['passuser'];
//Checking is user existing in the database or not
$sql = "SELECT email, passowrd FROM users WHERE email=? and password=?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
	header("Location: registration.php?error=sqlerror");
	exit();
}else {
	mysqli_stmt_bind_param($stmt, "ss", $email, $password);
	myslqi_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
}
$rows = mysqli_num_rows($result);
	if($rows==1){

		$usertype = $rows['admin'];

if($usertype == 1){
	echo $usertype;
    header("Location: admin.php"); // This line triggers a redirect if the user_type is admin
} else {
    header("Location: login.php"); // This line triggers for other user_types
}
}
mysqli_close($conn);
}
?>
