<?php require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO barbers (full_name, specialty, contact_number) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['full_name'], $_POST['specialty'], $_POST['contact_number']]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Barber</title></head>
<body>
<h2>Add Barber</h2>
<form method="POST">
  Name: <input type="text" name="full_name" required><br><br>
  Specialty: <input type="text" name="specialty"><br><br>
  Contact: <input type="text" name="contact_number"><br><br>
  <button type="submit">Save</button>
</form>
<a href="index.php">Back</a>
</body>
</html>