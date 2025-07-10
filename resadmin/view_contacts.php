<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: index.html");
  exit;
}
include 'db.php';
$result = $conn->query("SELECT * FROM contacts ORDER BY contact_time DESC");
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contacts - Diyalo Admin Panel</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>Diyalo Admin Panel - Contacts</header>
<div class="container">
  <div class="sidebar">
    <a href="dashboard.php">🍽 Menu</a>
    <a href="view_orders.php">🧾 Orders</a>
    <a href="view_reservations.php">📅 Reservations</a>
    <a href="view_contacts.php" class="active">📨 Contacts</a>
  </div>
  <div class="content">
    <div class="card">
      <h3>Contact Messages</h3>
      <table>
        <tr>
          <th>Name</th><th>Phone</th><th>Email</th><th>Message</th><th>Contact Time</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['phone']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
          <td><?= htmlspecialchars($row['contact_time']) ?></td>
        </tr>
        <?php endwhile; ?>
      </table>
    </div>
  </div>
</div>
</body>
</html>
