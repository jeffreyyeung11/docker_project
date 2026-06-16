<?php
include 'auth.php'; 
include '../../includes/config.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM technical_skills WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: skills.php");
exit;
