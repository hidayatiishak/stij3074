<?php
include_once("dbconnect.php");

if (isset($_COOKIE["timer"])){

//get data first
$id = $_POST['id'];
$title = $_POST['title']; 
$author = $_POST['author'];
$price = $_POST['price'];
$description = $_POST['description'];
$publisher = $_POST['publisher'];
$isbn = $_POST['isbn'];

try {
    $sql = "INSERT INTO book(id, title, price, author, description, publisher,isbn)
    VALUES ('$id', '$title', '$price','$author', '$description' '$publisher' '$isbn')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Book Registration Success')</script>";
    echo "<script> window.location.replace('bookreg.html') </script>;";

  } catch(PDOException $e) {
    //echo $sql . "<br>" . $e->getMessage();
    echo "<script> alert('Book Registration Error')</script>";
    echo "<script> window.location.replace('bookreg.html') </script>;";
  }
  
  $conn = null;
}else{
  echo "<script> alert('Timer expired!!!')</script>";
  echo "<script> window.location.replace('index.html') </script>;";
}
?>