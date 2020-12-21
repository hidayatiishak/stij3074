<?php
include_once("dbconnect.php");
$id = $_GET['id'];
$title = $_GET['title']; 
$author = $_GET['author'];
$price = $_GET['price'];
$description = $_GET['description'];
$publisher = $_GET['publisher'];
$isbn = $_GET['isbn'];

if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE book SET title = '$title', author = '$author', price = '$price' WHERE id = '$id''";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php?') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
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
<body>


   <h3 align="center">Update <?php echo $id?> </h3>

    <form action="update.php" method="get" align="center" onsubmit="return confirm('Update?');">
        
    <input type="hidden" id="operation" name="operation" value="update"><br>

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

        <input type="submit" value="Update">
    </form>
    <p align="center"><a href="index.html?>">Cancel</a></p>
</body>

</html>