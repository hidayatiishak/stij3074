<?php
include_once("dbconnect.php");
$id = $_GET['id'];
$name = $_GET['name'];
$menuid = $_GET['menuid'];
$menuname = $_GET['menuname'];
$category = $_GET['category'];
$prices = $_GET['prices'];

if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE menu SET menuname = '$menuname', cat = '$category', price = '$prices' WHERE  menuid = '$menuid'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Successfully updated!')</script>";
        echo "<script> window.location.replace('mainpage.php?email=".$email."&name=".$name."') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Failed! Try again.')</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Main Page</title>
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
<p>
   
    <form action="update.php" method="get" align="center" onsubmit="return confirm('Update?');">
        <h3 align="center">Update Menu Details </h3>
        <input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
        <input type="hidden" id="operation" name="operation" value="update"><br>
        <input type="hidden" id="menuid" name="menuid" value="<?php echo $menuid;?>" required><br><br>
        <label for="email">Menu Name:</label><br>
        <input type="text" id="menuname" name="menuname" value="<?php echo $menuname;?>" required><br><br>
        <label for="Category">Category:</label><br>
        <input type="text" id="category" name="category" value="<?php echo $category;?>" required><br><br>
        <label for="password">Price</label><br>
        <input type="text" id="prices" name="prices" value="<?php echo $prices;?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <p align="center"><a href="mainpage.php?id=<?php echo $id.'&name='.$name?>">Cancel</a></p>
</body>

</html>