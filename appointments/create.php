<?php require '../config/db.php';

$barber_id = $_GET['barber_id'] ?? $_POST['barber_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO appointments (barber_id, client_name, appointment_date, appointment_time, service_type) VALUES (?,?,?,?,?)");
    $stmt->execute([$barber_id, $_POST['client_name'], $_POST['appointment_date'], $_POST['appointment_time'], $_POST['service_type']]);
    header("Location: index.php?barber_id=$barber_id");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Appointment</title></head>
<body>
<h2>Add Appointment</h2>
<form method="POST">
  <input type="hidden" name="barber_id" value="<?= $barber_id ?>">
  Client Name: <input type="text" name="client_name" required><br><br>
  Date: <input type="date" name="appointment_date" required><br><br>
  Time: <input type="time" name="appointment_time" required><br><br>
  Service: <input type="text" name="service_type"><br><br>
  <button type="submit">Save</button>
</form>
<a href="index.php?barber_id=<?= $barber_id ?>">Back</a>
</body>
</html>