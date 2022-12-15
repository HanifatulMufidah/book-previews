<?php
session_start();

require_once 'connection.php';
$name = '';
$email = '';
$username = '';
$password = '';
$password_repeat = '';

if (isset($_POST['submit'])) {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $password_repeat = htmlspecialchars(trim($_POST['password_repeat']));

    if ($password == $password_repeat) {

        mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email'");
        if (!mysqli_affected_rows($conn) > 0) {

            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$name', '$email', '$username', '$password_hashed') ");

            $_SESSION['msg'] = "You have just registered, please login";
            header("location:login.php");
        } else {
            $err = "The email or username is already registered";
        }
    } else {
        $err = "Make sure to confirm your password";
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
                        <h3 class="text-center">Register</h3>
                        <hr>
                        <?php
                        if (isset($err)) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $err; ?>
                            </div>
                        <?php
                        }

                        ?>
                        <form method="POST">
                            <label for="name">Name</label>
                            <input type="text" class="form-control mb-3" id="name" name="name" value="<?= $name; ?>" required>
                            <label for="email">Email</label>
                            <input type="email" class="form-control mb-3" id="email" name="email" value="<?= $email; ?>" required>
                            <label for="username">Username</label>
                            <input type="text" class="form-control mb-3" id="username" name="username" value="<?= $username; ?>" required>
                            <label for="password">Password</label>
                            <input type="password" class="form-control mb-3" id="password" name="password" value="<?= $password; ?>" required>
                            <label for="password_repeat">Confirm your password</label>
                            <input type="password" class="form-control mb-3" id="password_repeat" name="password_repeat" value="<?= $password_repeat; ?>" required>
                            <div class="d-grid gap-2 mb-3">
                                <input class="btn btn-primary" type="submit" value="submit" name="submit">
                            </div>
                            <p>Already have an account? <a href="login.php">Login</a></p>
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