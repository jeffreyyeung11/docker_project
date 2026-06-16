<?php
include 'auth.php'; 
include '../../includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Manage Technical Skills</title>
  <link rel="stylesheet" href="../styles.css">
</head>
<body>
<div class="container">
  <h1>Technical Skills Admin</h1>

  <p><a href="add_skill.php">➕ Add Skill Category</a></p>

  <?php
  $result = $conn->query("SELECT * FROM technical_skills ORDER BY sort_order");

  while ($row = $result->fetch_assoc()) {
      echo '<div class="item">';
      echo '<div class="item-header">';
      echo '<div class="role">' . htmlspecialchars($row['category']) . '</div>';
      echo '<div>';
      echo '<a href="edit_skill.php?id=' . $row['id'] . '">Edit</a> | ';
      echo '<a href="delete_skill.php?id=' . $row['id'] . '" onclick="return confirm(\'Delete?\')">Delete</a>';
      echo '</div>';
      echo '</div>';
      echo '<div class="meta">' . htmlspecialchars($row['skills']) . '</div>';
      echo '</div>';
  }
  ?>

  <p><a href="logout.php">Logout</a></p>

</div>
</body>
</html>
