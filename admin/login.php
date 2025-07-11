<?php
session_start();
if(isset($_POST['password'])){
  if($_POST['password'] === 'admin123'){ // Change password as needed
    $_SESSION['admin'] = true;
    header('Location: dashboard.php');
    exit;
  } else {
    $error = "Wrong password!";
  }
}
?>

<form method="post">
  <input type="password" name="password" placeholder="Admin Password" required>
  <button type="submit">Login</button>
</form>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
