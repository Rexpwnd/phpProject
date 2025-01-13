<?php
include_once "Admin.php";
use Admin\Admin;

$admin = new Admin();
$pricingPlans = $admin->getPricingPlans();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="btn btn-danger" href="insert.php">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="mt-4">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Pricing Title</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pricingPlans as $plan): ?>
                    <tr>
                        <td><?php echo $plan['id']; ?></td>
                        <td><?php echo $plan['title']; ?></td>
                        <td><a class="btn btn-info" href="update.php?id=<?php echo $plan['id']; ?>">Update</a></td>
                        <td><a class="btn btn-danger" href="delete.php?id=<?php echo $plan['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr> <td colspan="4" class="text-center"> <a class="btn btn-success" href="insert.php">Add New Item</a> </td> </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
