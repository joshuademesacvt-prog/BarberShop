<?php require '../config/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM barbers WHERE barber_id = ?");
$stmt->execute([$id]);
$barber = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE barbers SET full_name=?, specialty=?, contact_number=? WHERE barber_id=?");
    $stmt->execute([$_POST['full_name'], $_POST['specialty'], $_POST['contact_number'], $id]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Barber</title></head>
<body>
<h2>Edit Barber</h2>
<form method="POST">
  Name: <input type="text" name="full_name" value="<?= htmlspecialchars($barber['full_name']) ?>" required><br><br>
  Specialty: <input type="text" name="specialty" value="<?= htmlspecialchars($barber['specialty']) ?>"><br><br>
  Contact: <input type="text" name="contact_number" value="<?= htmlspecialchars($barber['contact_number']) ?>"><br><br>
  <button type="submit">Update</button>
</form>
<a href="index.php">Back</a>
</body>
</html>