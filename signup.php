<?php 
// $msg = '';

include 'includes/header.php';
include 'navbar.php';
include 'config/db.php';
// session_start();

if (isset($_POST['submit'])) {
	$fname = $_POST['name'];
	$lname = $_POST['last'];
	$mail = $_POST['mail'];
	$pass  = $_POST['password'];
	$Uname = $_POST['user'];
	$check = isset($_POST['terms']);

	mysqli_query($conn,"INSERT INTO  mild-up_users(firstname,lastname,username,email,password)
		VALUES ('$fname','$lname','$Uname','$mail','$pass')");



}
 ?>


<div class="container" id="signup">
<h4 class="display-4">Sign-up here!</h4>
<p id="success" class="text-success w3-fading"></p>
<form method="post" action="index.php">
	<div class="form-group">
		<label for="fname"> First Name : </label>
		<input type="text" class="form-control" name="name" id="fname" />
		<p id="confirm1" class="w3-pale-red error"></p>
	</div>
<div class="form-group">
		<label for="lname"> Last Name : </label>
		<input type="text" class="form-control" name="last" id="lname" />
		<p id="confirm2" class="w3-pale-red error"></p>
	</div>
<div class="form-group">
		<label for="Uname">Username : </label>
		<input type="text" class="form-control" name="user" id="Uname" />
		<p id="confirm3" class="w3-pale-red error"></p>
	</div>
	<div class="form-group">
		<label for="email"> Email Address : </label>
		<input type="email" class="form-control" name="mail" id="email" />
		<p id="confirm4" class="w3-pale-red error"></p>
	</div>
<div class="form-group">
		<label for="password"> Password : </label>
		<input type="password" class="form-control" name="password" id="password" />
		<p id="confirm5" class="w3-pale-red error"></p>
	</div>
	<div class="form-group">
		<label for="Cpass"> confirm Password : </label>
		<input type="password" class="form-control" name="passwordconfirm" id="Cpass" />
		<p id="confirm6" class="w3-pale-red error"></p>
	</div>
	<div class="checkbox">
		<label ><input type="checkbox" name="terms" class="form-check" id="check" />I agree to the Terms and Condition  </label>
			</div>
<button type="submit" name="submit" id="submit" class="btn w3-button w3-right bg-primary text-white">Submit</button>
</form>
</div>
<hr style="height:10px;">

<?php include 'includes/footer.php'; ?>