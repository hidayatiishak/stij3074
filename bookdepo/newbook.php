<<?php
include_once("dbconnect.php");
//$matric = $_GET['matric'];
//$name = $_GET['name'];

// if (isset($_COOKIE["email"])){
//   echo "Value is: " . $_COOKIE["email"];
// }

if (isset($_GET['id'])) {
$id = $_GET['id'];
$title = $_GET'title']; 
$author = $_GETT['author'];
$price = ($_GET['price']);
$description = ($_GETT['description']);
$publisher = ($_GET['publisher']);
$isbn = ($_GET['isbn']) 

  try {
    $sql = "INSERT INTO book(id, title, price, author, description, publisher,isbn)
    VALUES ('$id', '$title', '$price','$author', '$description' '$publisher' '$isbn')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
    echo "<script> window.location.replace('mainpage.php?') </script>;";

  } catch(PDOException $e) {
    echo "<script> alert('Insert Error')</script>";
    //echo "<script> window.location.replace('register.html') </script>;";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<p>
<h2 align='center'><?php echo $name?></h2>
</p>

<body>
    <h2 align="center">Insert New Book</h2>

    <form action="newgrade.php" method="get" align="center" onsubmit="return confirm('Insert new grade?');">

       
    <label for="id">Book Id:</label><br>
    <input type="text" id="id" name="id" value="" required><br>

    <label for="title">Title:</label><br>
    <input type="text" id="title" name=title" value="" required><br>

    <label for="author">Author:</label><br>
    <input type="text" id="author" name="author" value="" required><br>

    <label for="price">Price</label><br>
    <input type="text" id="price name="price" value="" required><br>


    <label for="description">Description:</label><br>
    <input type="descriptionr" id="description" name="description" value="" required><br><br>


    <label for="publisher">Publisher:</label><br>
    <input type="publisher" id="publisher" name="publisher" value="" required><br><br>

  
    <label for="isbn">ISBN:</label><br>
    <input type="isbn" id="isbn" name="isbn" value="" required><br><br>
    </form>

    <p align="center"><a href="mainpage.php">Cancel</a></p>
</body>

</html>