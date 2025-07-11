<?php
session_start();
if(!isset($_SESSION['admin'])){
  header('Location: login.php');
  exit;
}

require_once '../db.php';

// Approve payment
if(isset($_GET['approve'])){
  $id = (int)$_GET['approve'];
  $stmt = $pdo->prepare("UPDATE payments SET status='verified', paid_at=NOW() WHERE id=?");
  $stmt->execute([$id]);
  header('Location: payments.php');
  exit;
}

// Fetch all pending payments
$stmt = $pdo->query("SELECT * FROM payments WHERE status='pending'");
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Pending Payments</h2>
<table border="1" cellpadding="5" cellspacing="0">
  <tr>
    <th>ID</th>
    <th>Player ID</th>
    <th>Transaction ID</th>
    <th>Amount</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <?php foreach($payments as $p): ?>
  <tr>
    <td><?=htmlspecialchars($p['id'])?></td>
    <td><?=htmlspecialchars($p['player_id'])?></td>
    <td><?=htmlspecialchars($p['transaction_id'])?></td>
    <td><?=htmlspecialchars($p['amount'])?></td>
    <td><?=htmlspecialchars($p['status'])?></td>
    <td><a href="?approve=<?= $p['id'] ?>">Approve</a></td>
  </tr>
  <?php endforeach; ?>
</table>
