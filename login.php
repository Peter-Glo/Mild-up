<?php
session_start();

 include 'includes/header.php';
 include 'navbar.php';
include 'config/db.php';

$msg = '';
$msg1 = '';
$msg2 = '';

function user_exist($logUname,$conn)
{
	
	$row = mysqli_query($conn,"SELECT id FROM mild-up_users WHERE username = '$logUname' ");
	{
	if (mysqli_num_rows($row)==1) {
		return true;
	} else {
		return false;
	}
	header("location:clientprofile.php");
}
}



if (isset($_POST['submit'])) {
	$logUname = $_POST['name'];
	$logpass = $_POST['password'];
if (empty($logUname)) {
	$msg = "<div class='text-danger'>Username must not be empty !!</div>";
}else if (empty($logpass)) {
	$msg1 = "<div class='text-danger'>Password must not be empty !!</div>";
}else if (user_exist($logUname,$conn)) {
	$pass = mysqli_query($conn,"SELECT password FROM mild-up_users WHERE username= '$logUname' ");
$pass_w = mysqli_fetch_array($pass);
$passme = $pass_w['password'];
// $password = md5($password);
if ($logpass !==$passme) {
	$msg1 =  "<div class='text-danger'>Password is incorrect !!</div>";
}
else{
	$msg2 = "<div class='text-success'>Login successfull</div> " ;
	header('location:clientprofile.php');
}
}else {
	$msg =  "<div class='text-danger'> Username does'nt exist! </div>"; 
}



} 



 ?>



<div class="container  col-md-4 offset-md-4 w3-white" id="login">
	<h1 class="display-4">Login Here!!</h1>
<form method="POST">
	<div class="form-group">
		<label>Username : </label>
		<input type="text" name="name" class="form-control" />
		<?php echo $msg; ?>
	</div>
	<div class="form-group">
		<label >Password : </label>
		<input type="password" name="password" class="form-control" />
		<?php echo $msg1; ?>
	</div>
<div class="form-check">
		<label><input type="checkbox" name="check" class="checkbox" />Remember me ! </label>
	</div><br><br>
	<center><button type="submit" name="submit" id="logsubmit" class="btn bg-success text-white w3-center">Log In</button></center>
</form><br><br><br>
Don't have an account? please register .<a href="signup.php" class="btn w3-large">Here !</a>

</div>

<?php include 'includes/footer.php'; ?>
