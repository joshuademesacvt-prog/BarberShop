<?php require '../config/db.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Barbers</title></head>
<body>
<h2>All Barbers</h2>
<a href="create.php">+ Add Barber</a>
<table border="1" cellpadding="8">
  <tr><th>ID</th><th>Name</th><th>Specialty</th><th>Contact</th><th>Actions</th></tr>
  <?php
    $stmt = $pdo->query("SELECT * FROM barbers");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
  ?>
  <tr>
    <td><?= $row['barber_id'] ?></td>
    <td><?= htmlspecialchars($row['full_name']) ?></td>
    <td><?= htmlspecialchars($row['specialty']) ?></td>
    <td><?= htmlspecialchars($row['contact_number']) ?></td>
    <td>
      <a href="../appointments/index.php?barber_id=<?= $row['barber_id'] ?>">View Appointments</a> |
      <a href="edit.php?id=<?= $row['barber_id'] ?>">Edit</a> |
      <a href="delete.php?id=<?= $row['barber_id'] ?>" onclick="return confirm('Delete this barber?')">Delete</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>