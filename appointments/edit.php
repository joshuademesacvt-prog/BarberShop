<?php require '../config/db.php';

$id = $_GET['id'];
$barber_id = $_GET['barber_id'];
$stmt = $pdo->prepare("SELECT * FROM appointments WHERE appointment_id = ?");
$stmt->execute([$id]);
$appt = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE appointments SET client_name=?, appointment_date=?, appointment_time=?, service_type=? WHERE appointment_id=?");
    $stmt->execute([$_POST['client_name'], $_POST['appointment_date'], $_POST['appointment_time'], $_POST['service_type'], $id]);
    header("Location: index.php?barber_id=$barber_id");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Appointment</title></head>
<body>
<h2>Edit Appointment</h2>
<form method="POST">
  Client: <input type="text" name="client_name" value="<?= htmlspecialchars($appt['client_name']) ?>" required><br><br>
  Date: <input type="date" name="appointment_date" value="<?= $appt['appointment_date'] ?>" required><br><br>
  Time: <input type="time" name="appointment_time" value="<?= $appt['appointment_time'] ?>" required><br><br>
  Service: <input type="text" name="service_type" value="<?= htmlspecialchars($appt['service_type']) ?>"><br><br>
  <button type="submit">Update</button>
</form>
<a href="index.php?barber_id=<?= $barber_id ?>">Back</a>
</body>
</html>