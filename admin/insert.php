<?php
include_once "auth.php";
include_once "Admin.php";
use Admin\Admin;

$admin = new Admin();

if(isset($_POST['submit'])) {
    $insert = $admin->insertPricingPlan($_POST);
    if($insert) {
        $message = '<div class="alert alert-success" role="alert">Record inserted successfully.</div>';
    } else {
        $message = '<div class="alert alert-danger" role="alert">Record insertion failed.</div>';
    }
}
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
                    <li class="nav-item"><a class="btn btn-secondary" href="index.php">Go Back</a></li>
                </ul>
            </div>
        </nav>

        <div class="mt-4">
            <?php if(isset($message)) echo $message; ?>
            <form action="insert.php" method="post" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                    <div class="invalid-feedback">Please enter a title.</div>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Price" required>
                    <div class="invalid-feedback">Please enter a price.</div>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" placeholder="Content" required></textarea>
                    <div class="invalid-feedback">Please enter content.</div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Insert</button>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>
