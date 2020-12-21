<?php
session_start();
include_once("dbconnect.php");
//$matric = $_GET['matric']; 
//$name = $_GET['name'];

// if (isset($_COOKIE["email"])){
//   echo "Value is: " . $_COOKIE["email"];
// }
//echo "Welcome " . $_SESSION["name"] . ".<br>";
//if (isset($_SESSION["name"])){

//delete operation
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $id = $_GET['id'];
      try {
        $sql = "DELETE FROM book WHERE id='$id' AND title='$title'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

    try {

        $sql = "SELECT * FROM book WHERE id = '$id'";
        $stmt = $conn->prepare($sql );
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $courses = $stmt->fetchAll(); 
        echo "<p><h1 align='center'>Book List</h1></p>";
        echo "<table border='1' align='center'>
        <tr>
          <th>Book ID</th>
          <th>Title</th>
          <th>Author</th>
          <th>Price</th>
          <th>Description</th>
          <th>Publisher</th>
          <th>ISBN</th>
          <th>Operation</th>
        </tr>";
        
        foreach($book as $book) {
            echo "<tr>";
            echo "<td>".$book['id']."</td>";
            echo "<td>".$book['title']."</td>";
            echo "<td>".$book['author']."</td>";
            echo "<td>".$book['price']."</td>";
            echo "<td>".$book['description']."</td>";
            echo "<td>".$book['Publisher']."</td>";
            echo "<td>".$book['isbn']."</td>";
           


            echo "<td><a href='mainpage.php?title=".$title."&id=".$book['id']."&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
            <a href='update.php?id=title=".$title."&id=".$book['id']."&title=".$book['title'].
            "&author=".$book['author']."&price=".book['price']."description=".$book['desscription']."&isbn=".book['isbn']."'>Update</a></td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo "<p align='center'><a href='newbook.php?id=".$id."&title=".$title."'>Insert new grade</a></p>";
  
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}else{
  echo "<script> alert('Timer expired!!!')</script>";
  echo "<script> window.location.replace('index.html') </script>;";
}
}else{
  echo "<script> alert('Session Expired!!!')</script>";
  echo "<script> window.location.replace('index.html') </script>;";
}
  $conn = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<body>

</body>

</html>