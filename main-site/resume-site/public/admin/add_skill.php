<?php
include 'auth.php'; 
include '../../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $skills = $_POST['skills'];
    $sort = $_POST['sort_order'];

    $stmt = $conn->prepare("INSERT INTO technical_skills (category, skills, sort_order) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $category, $skills, $sort);
    $stmt->execute();

    header("Location: skills.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Add Skill</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
<div class="container">
  <h1>Add Skill Category</h1>

  <form method="post">
    <label>Category</label><br>
    <input type="text" name="category" required><br><br>

    <label>Skills</label><br>
    <textarea name="skills" rows="4" required></textarea><br><br>

    <label>Sort Order</label><br>
    <input type="number" name="sort_order" value="1"><br><br>

    <button type="submit">Save</button>
  </form>
</div>
</body>
</html>
