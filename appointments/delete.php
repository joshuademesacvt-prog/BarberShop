<?php require '../config/db.php';

$id = $_GET['id'];
$barber_id = $_GET['barber_id'];
$stmt = $pdo->prepare("DELETE FROM appointments WHERE appointment_id = ?");
$stmt->execute([$id]);
header("Location: index.php?barber_id=$barber_id");
exit;
?>