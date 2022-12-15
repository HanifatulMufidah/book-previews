<?php
session_start();
require_once 'connection.php';

function getComments($conn, $id_book)
{
  $output = [];
  $result = mysqli_query($conn, "SELECT comments.*, username FROM comments LEFT JOIN user ON comments.id_user = user.id_user WHERE comments.id_book = $id_book");
  while ($data = mysqli_fetch_assoc($result)) {
    $output[] = $data;
  }
  echo json_encode($output);
}

// get
if (isset($_GET['q'])) {
  $q = $_GET['q'];

  switch ($q) {
    case 'books':
      $output = [];
      $result = mysqli_query($conn, "SELECT * FROM books");
      while ($data = mysqli_fetch_assoc($result)) {
        $output[] = $data;
      }
      echo json_encode($output);
      break;

    case 'comments':
      $id_book = $_GET['id_book'];
      getComments($conn, $id_book);
      break;

    case 'add_comment':
      $_POST = json_decode(file_get_contents('php://input'), true);
      $username = $_POST['username'];
      $id_book = $_POST['id_book'];
      $body = $_POST['body'];

      mysqli_query($conn, "INSERT INTO comments VALUES(NULL,(SELECT id_user FROM `user` WHERE `username`='$username'),$id_book,'$body')");
      getComments($conn, $id_book);
      break;

    case 'edit_comment':
      $_POST = json_decode(file_get_contents('php://input'), true);
      $id_comment = $_POST['id_comment'];
      $id_book = $_POST['id_book'];
      $body = $_POST['body'];

      mysqli_query($conn, "UPDATE comments SET body='$body' WHERE id_comment = $id_comment");
      getComments($conn, $id_book);
      break;

    case 'delete_comment':
      $id_comment = $_GET['id_comment'];
      $id_book = $_GET['id_book'];

      mysqli_query($conn, "DELETE FROM comments WHERE id_comment = $id_comment");
      getComments($conn, $id_book);
      break;

    default:
      echo isset($_SESSION['username']) ? 'Hello ' . $_SESSION['username'] : "You have not logged in";
      break;
  }
}
