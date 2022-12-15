<?php
session_start();
require_once 'connection.php';

$username = '';
$password = '';

if (isset($_SESSION['username'])) {
    header("location:index.php");
}

if (isset($_POST['submit'])) {

    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $data = mysqli_fetch_assoc($sql);

    if (mysqli_affected_rows($conn) > 0) {

        if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $data['username'];
            header("location:index.php");
        } else {
            $err = "Incorrect password";
        }
    } else {
        $err = "User not found";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Your Read</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/img/book-stack.png" type="image/x-icon">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/custom.css">

    <style>
        body .row {
            min-height: 100vh;
        }
    </style>

</head>

<body class="bg-primary">


    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Login</h3>
                        <hr>
                        <?php
                        if (isset($err) || (isset($_SESSION['msg']) && $_SESSION['msg'] != '')) {
                        ?>
                            <div class="alert alert-<?= isset($err) ? 'danger' : 'success'; ?>" role="alert">
                                <?= isset($err) ? $err : $_SESSION['msg']; ?>
                            </div>
                        <?php
                            $_SESSION['msg'] = '';
                        }

                        ?>
                        <form method="POST">
                            <label for="username">Username</label>
                            <input type="text" class="form-control mb-3" id="username" name="username" value="<?= $username; ?>" required>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $password; ?>" required>
                            <div class="d-grid gap-2 mt-3">
                                <input class="btn btn-primary" type="submit" value="submit" name="submit">
                                <a href="registration.php" class="btn btn-secondary">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript -->
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>