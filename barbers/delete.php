<?php require '../config/db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM barbers WHERE barber_id = ?");
$stmt->execute([$id]);
header("Location: index.php");
exit;
?>