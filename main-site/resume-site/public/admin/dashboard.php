<?php include 'auth.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<div class="container">

    <h1>Admin Dashboard</h1>

    <p>Welcome, <?= htmlspecialchars($_SESSION['admin_user']) ?></p>

    <ul>
        <li><a href="skills.php">Manage Technical Skills</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

</div>

</body>
</html>