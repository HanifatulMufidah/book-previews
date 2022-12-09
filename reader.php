<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/1c256bdeea.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <header class="fixed-top">
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand fw-bold">DB READERS</a>
                <div class="collapse navbar-collapse">
                    <form action="data-daftar-mahasiswa.php" method="POST" class="col me-3">
                        <input type="text" name="keyword" id="search" class="form-control" placeholder="Search...">
                        <input type="submit" name="search" hidden>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="login.php" class="btn btn-outline-light">Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <p class="m-2">Logged in as :
            <?php
            if ($_SESSION) {
                echo "Admin";
            } else {
                echo "Guest";
            };
            ?>
        </p>
    </header>

    <main>
        <title>SYR | Data Daftar Readers</title>

        <?php
        require_once('connection.php');
        session_start();

        // Kode untuk menampilkan data mahasiswa
        $result = mysqli_query($conn, "SELECT * FROM users");

        ?>

        <div class="content container-fluid text-center justify-content-center mt-5 p-4">
            <div class="row">
                <h1>Data Daftar Readers</h1>
                <?php

                if (isset($_SESSION['msg'])) {
                    if ($_SESSION['msg'] != '') {

                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $_SESSION['msg']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                <?php

                        $_SESSION['msg'] = '';
                    }
                }

                ?>
                <div class="card shadow p-3">
                    <table class="table table-hover shadow">
                        <thead>
                            <tr class="table-dark">
                                <th>Email</th>
                                <th>Name</th>
                                <th class="col-5">Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= $data['name'] ?></td>
                                    <td><?= $data['address'] ?></td>
                                    <td>
                                        <?php
                                        if ($_SESSION) {
                                        ?>
                                            <a class="fw-bold" href="ubah.php?nim=<?= $data['nim']; ?>">Edit</a> |
                                            <a class="fw-bold" href="proses-hapus-mahasiswa.php?nim=<?= $data['nim']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Delete</a>
                                        <?php
                                        } else {
                                        ?>
                                            <a class="fw-bold" href="ubah.php?nim=<?= $data['nim']; ?>">Edit</a> |
                                            <a class="fw-bold" href="proses-hapus-mahasiswa.php?nim=<?= $data['nim']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Delete</a>
                                        <?php
                                        };
                                        ?>

                                    </td>

                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div><a class="btn btn-dark" href="tambah-mahasiswa.php"><i class="fas fa-plus"></i>&nbsp; Add New</a></div>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>