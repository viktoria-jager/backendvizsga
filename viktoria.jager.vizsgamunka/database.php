<?php

$pdo = new PDO('mysql:host=localhost;dbname=etterem', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$stmt = $pdo->query("SELECT * FROM dishes");
$dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ételek listája</title>
</head>
<body>
    <h1>Ételek</h1>
    <ul>
        <?php foreach ($dishes as $dish): ?>
            <li>
                <?= htmlspecialchars($dish['name']) ?> - 
                <?= htmlspecialchars($dish['description']) ?> - 
                <?= $dish['price'] ?> Ft
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
