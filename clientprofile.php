<?php 
include ('includes/header.php');
include ('navbar.php');
include ('config/db.php');

session_start();
$name = $_SESSION['username'];	
$result = mysqli_query($conn,"SELECT  firstname,lastname FROM mild-up_users WHERE username = '$name' ");
$retrive = mysqli_fetch_array($result);


$fname = $retrive['firstname'];
$lname = $retrive['lastname'];

 ?>

 <div class="bg-success text-white">
 	<h2 align="center"><?php echo $fname."  ".$lname; ?></h2>
 </div>

 <?php include 'includes/footer.php'; ?>	