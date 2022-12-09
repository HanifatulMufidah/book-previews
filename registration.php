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
                        <form action="POST">
                            <label for="email">Email</label>
                            <input type="text" class="form-control mb-3" id="email" name="email">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control mb-3" id="nama" name="nama">
                            <label for="username">Username</label>
                            <input type="text" class="form-control mb-3" id="username" name="username">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="d-grid gap-2 mt-3">
                                <input class="btn btn-primary" type="submit" value="submit">
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