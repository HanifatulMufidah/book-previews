<?php
session_start();
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

</head>

<body class="bg-light">
  <div class="fixed-navbar mb-3">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
      <div class="container">
        <a class="navbar-brand" href="#">
          <i class="bi bi-book-half"></i> Share Your Read
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" href="#">Home</a>
            <a class="nav-link" href="#about">About</a>
            <a class="nav-link" href="#collections">Collections</a>
            <a class="nav-link" href="reader.php">Reader</a>

            <?php
            if (isset($_SESSION['username'])) {
            ?>
              <div class="dropdown">
                <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?= $_SESSION['username']; ?>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </div>
            <?php
            } else {
            ?>
              <a class="nav-link" href="login.php">Login</a>
            <?php
            }
            ?>

          </div>
        </div>
      </div>
    </nav>
  </div>

  <!-- Slide -->
  <section id="carouselExampleIndicators" class="carousel slide myslide bg-secondary" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/home1.jpg" class="d-block mx-auto" width="1300" height="1200" alt="...">
        <div class="carousel-caption">
          <h3>Jim Rohn</h3>
          <p>"Reading is essential for those who seek to rise above the ordinary."</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/home2.jpg" class="d-block mx-auto" width="1300" height="1200" alt="...">
        <div class="carousel-caption">
          <h3>J.K. Rowling</h3>
          <p>"If you don't like to read, you haven't found the right book."</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/home3.jpg" class="d-block mx-auto" width="1300" height="1200" alt="...">
        <div class="carousel-caption">
          <h3>Diane Duane</h3>
          <p>"Reading one book is like eating one potato chip."</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </section>

  <!-- About -->
  <section id="about" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <h3 class="text-center">About</h3>
          <p class="text-justify">Books are definitely useful to improve brain quality so that the quality of brain
            memory could be enhanced continuously.
            Books are also good for brain-stimulating activity.
            This is certainly useful for memorizing process either memorize the contain of the books or the other things
            The habits of reading books will influence every memories and help the brain when the reader in the hardest
            time.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Collections -->
  <section id="collections" class="py-5">
    <div class="container">
      <div class="row text-center mb-3">
        <div class="col-12">
          <h3>Collections</h3>
          <p></p>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" class="form-control" placeholder="Search..." id="term">
            <select class="form-select" id="category">
              <option selected value="">All Categories</option>
              <option value="self improvement">Self Improvement</option>
              <option value="religion">Religion</option>
              <option value="novel">Novel</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row justify-content-center" id="books_container">

      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="preview" data-bs-focus="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Preview</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body bg-light">
          <div class="row">
            <div class="col-4 col-lg-2">
              <img id="img_preview" src="./assets/img/atomic.jpg" alt="" class="img-fluid img-thumbnail mb-3">
            </div>
            <div class="col-8 col-lg-10">
              <div class="details alert alert-primary mb-3"></div>
            </div>
            <div class="col-12">
              <div class="comments">
                <hr>
                <h3>Comments</h3>
                <div class="list-group">

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer" style="display: block;">
          <form action="" method="POST" id="form_comment">
            <div class="input-group">
              <input type="hidden" id="username" name="username" value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Anonymous'; ?>">
              <input type="hidden" id="id_book" name="id_book">
              <input type="text" name="body" class="form-control" placeholder="Add Comment...">
              <button class="btn btn-primary">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- footer -->
  <footer class="py-3">
    <div class="container">
      <p class="text-center text-white">Created with <i class="bi bi-heart-fill text-danger"></i> by Hanifatul
        Mufidah 2022</p>
    </div>
  </footer>

  <!-- JavaScript -->
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="./assets/js/buku.js"></script>
</body>

</html>