<?php
require_once 'db.php';

// Payment verification function
function isPaymentVerified($transaction_id, $pdo){
  $stmt = $pdo->prepare("SELECT status FROM payments WHERE transaction_id = ?");
  $stmt->execute([$transaction_id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result && $result['status'] === 'verified';
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $name = trim($_POST['name']);
  $game_uid = trim($_POST['game_uid']);
  $transaction_id = trim($_POST['transaction_id']);
  
  if(empty($name) || empty($game_uid) || empty($transaction_id)){
    die("All fields are required.");
  }

  if(!isPaymentVerified($transaction_id, $pdo)){
    die("Payment not verified. Please wait for admin approval.");
  }

  $stmt = $pdo->prepare("SELECT id FROM players WHERE game_uid = ?");
  $stmt->execute([$game_uid]);
  if($stmt->fetch()){
    die("This UID already joined the tournament.");
  }

  $stmt = $pdo->prepare("INSERT INTO players (name, game_uid, payment_id) VALUES (?, ?, ?)");
  $stmt->execute([$name, $game_uid, $transaction_id]);

  $pdo->exec("UPDATE tournaments SET total_players = total_players + 1 WHERE id = 1");

  echo "Player joined successfully! Good luck.";
}
?>
