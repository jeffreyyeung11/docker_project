<?php
include 'auth.php'; 
include '../../includes/config.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $skills = $_POST['skills'];
    $sort = $_POST['sort_order'];

    $stmt = $conn->prepare("UPDATE technical_skills SET category=?, skills=?, sort_order=? WHERE id=?");
    $stmt->bind_param("ssii", $category, $skills, $sort, $id);
    $stmt->execute();

    header("Location: skills.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM technical_skills WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Edit Skill</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
<div class="container">
  <h1>Edit Skill</h1>

  <form method="post">
    <label>Category</label><br>
    <input type="text" name="category" value="<?= htmlspecialchars($row['category']) ?>" required><br><br>

    <label>Skills</label><br>
    <textarea name="skills" rows="4" required><?= htmlspecialchars($row['skills']) ?></textarea><br><br>

    <label>Sort Order</label><br>
    <input type="number" name="sort_order" value="<?= $row['sort_order'] ?>"><br><br>

    <button type="submit">Update</button>
  </form>
</div>
</body>
</html>
