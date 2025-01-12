<?php
include_once "Admin.php";
use Admin\Admin;

$admin = new Admin();
$menuItems = $admin->getMenu();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="insert.php">Vlozit menu</a></li>
    </ul>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Meno</th>
            <th>Aktualizovat</th>
            <th>Vymazat</th>
        </tr>
        <?php foreach ($menuItems as $menuItem): ?>
        <tr>
            <td><?php echo $menuItem['id']; ?></td>
            <td><?php echo $menuItem['content']; ?></td>
            <td><a href="update.php?id=<?php echo $menuItem['id']; ?>">Aktualizuj</a></td>
            <td><a href="delete.php?id=<?php echo $menuItem['id']; ?>">Vymazat</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
