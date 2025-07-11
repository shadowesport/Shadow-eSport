<!DOCTYPE html>
<html>
<head>
  <title>Join Tournament</title>
  <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
  <h2>Join Tournament</h2>
  <form method="post" action="join.php">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Game UID:</label><br>
    <input type="text" name="game_uid" required><br><br>

    <label>Transaction ID (Payment):</label><br>
    <input type="text" name="transaction_id" required><br><br>

    <button type="submit">Join Tournament</button>
  </form>
</body>
</html>
