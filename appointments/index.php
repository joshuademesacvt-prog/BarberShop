<?php require '../config/db.php';

$barber_id = $_GET['barber_id'];
$stmt = $pdo->prepare("SELECT b.full_name, a.* FROM appointments a JOIN barbers b ON a.barber_id = b.barber_id WHERE a.barber_id = ?");
$stmt->execute([$barber_id]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
$barber_name = $appointments[0]['full_name'] ?? 'Unknown';
?>
<!DOCTYPE html>
<html>
<head><title>Appointments</title></head>
<body>
<h2>Appointments for: <?= htmlspecialchars($barber_name) ?></h2>
<a href="create.php?barber_id=<?= $barber_id ?>">+ Add Appointment</a>
<table border="1" cellpadding="8">
  <tr><th>Client</th><th>Date</th><th>Time</th><th>Service</th><th>Actions</th></tr>
  <?php foreach ($appointments as $row): ?>
  <tr>
    <td><?= htmlspecialchars($row['client_name']) ?></td>
    <td><?= $row['appointment_date'] ?></td>
    <td><?= $row['appointment_time'] ?></td>
    <td><?= htmlspecialchars($row['service_type']) ?></td>
    <td>
      <a href="edit.php?id=<?= $row['appointment_id'] ?>&barber_id=<?= $barber_id ?>">Edit</a> |
      <a href="delete.php?id=<?= $row['appointment_id'] ?>&barber_id=<?= $barber_id ?>" onclick="return confirm('Delete?')">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<a href="../barbers/index.php">Back to Barbers</a>
</body>
</html>