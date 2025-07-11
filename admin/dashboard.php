<?php
session_start();
if(!isset($_SESSION['admin'])){
  header('Location: login.php');
  exit;
}
?>

<h2>Admin Dashboard</h2>
<a href="payments.php">Verify Payments</a><br>
<a href="logout.php">Logout</a>
