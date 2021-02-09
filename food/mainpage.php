
<?php
session_start();
include_once("dbconnect.php");
$id = $_GET['id'];
$name = $_GET['name'];

echo "<p>Welcome to 3 Little Kitchen " . $_SESSION["name"] . ".<br></p>";
if (isset($_SESSION["name"])){

//delete
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $menuid = $_GET['menuid'];
      
      try {
        $sql = "DELETE FROM menu WHERE menuid='$menuid'";
        $conn->exec($sql);
        echo "<script> alert('Sucessfully deleted!')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Failed!')</script>";
      }
    }

    try {
        if (isset($_GET['subject'])) {
            $subject = $_GET['subject'];
            $sql = "SELECT * FROM menu WHERE id = '$id' AND menuname LIKE '%$subject%' ORDER BY price ASC";
        }else{
            $sql = "SELECT * FROM menu WHERE id = '$id' ORDER BY price ASC";    
        }
        
        $stmt = $conn->prepare($sql );
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $menu = $stmt->fetchAll(); 
        echo "<p><h1 align='center'>Menu List</h1></p>";
        echo "
        <form class=\"example\" action=\"mainpage.php\" style=\"margin:auto;max-width:300px\">
        <input type=\"text\" placeholder=\"Search menu..\" name=\"subject\">
        <input type=\"hidden\" name=\"id\" value=$id>
        <input type=\"hidden\" name=\"name\" value=$name>
        <button type=\"submit\"><i class=\"fa fa-search\"></i></button>
        </form><br>";
        
        echo "<table border='1' align='center'>
        <tr>
          <th>MenuID</th>
          <th>Menu Name</th>
          <th>Category</th>
          <th>Price</th>
          <th>Action</th>
        </tr>";
        
        foreach($menu as $menu) {
            echo "<tr>";
            echo "<td>".$menu['menuid']."</td>";
            echo "<td>".$menu['menuname']."</td>";
            echo "<td>".$menu['cat']."</td>";
            echo "<td>".$menu['price']."</td>";
            echo "<td>
            <a href='mainpage.php?id=".$id."&name=".$name."&menuid=".$menu['menuid']."&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>

             <a href='update.php?id=".$id."&name=".$name."&menuid=".$menu['menuid']."&menuname=".$menu['menuname']. "&prices=".$menu['price']."&category=".$menu['cat']." '>Update</a></td>";



            echo "</tr>";
        } 
        echo "</table>";
        echo "<p align='center'><a href='newmenu.php?id=".$id."&name=".$name."'>Add new menu</a></p>";
        echo "<p align='center'><a href='profile.php?id=".$id."&name=".$name."'>Your Profile</a></p>";
        echo "<p align='center'><a href='index.html'>Logout</a></p>";
        echo "</table>";

       
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

    <style>
body{background-color: lightblue
}
h1{color:white;
text-align: center;

}
p{ font-family: verdana;
font-size: 20px
</style>
</head>

<body>

</body>

</html>