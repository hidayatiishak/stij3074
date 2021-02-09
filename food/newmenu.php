<?php
include_once("dbconnect.php");

$name = $_GET['name'];

 

if (isset($_GET['menuid'])) {
  $menuid = $_GET['menuid'];
  $menuname = $_GET['menuname'];
  $category = $_GET['category'];
  $prices = $_GET['prices'];

  try {
    $sql = "INSERT INTO menu(menuid,menuname, cat,price)
    VALUES ('$menuid', '$menuname', '$category','$prices')";
   
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
    echo "<script> window.location.replace('mainpage.php?name=".$name."') </script>;";

  } catch(PDOException $e) {
    echo "<script> alert('Insert Error')</script>";
   
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <head>
    
    <script>
  function previewFile() {
    const preview = document.querySelector('img');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {
      // convert image file to base64 string
      preview.src = reader.result;
    }, false);

    if (file) {
      reader.readAsDataURL(file);
    }
  }
  
  Filevalidation = () => { 
        const fi = document.getElementById('file'); 
        // Check if any file is selected. 
        if (fi.files.length > 0) { 
            for (const i = 0; i <= fi.files.length - 1; i++) { 
  
                const fsize = fi.files.item(i).size; 
                const file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (file >= 200) { 
                    alert( 
                      "File too Big, please select a file less than 200kb"); 
                } else if (file < 10) { 
                    alert( 
                      "File too small, please select a file greater than 20kb"); 
                } else { 
                   previewFile();
                } 
            } 
        } 
    } 
</script>
  <head><style>
body{background-color: lightblue
}
h1{color:white;
text-align: center;

}
p{ font-family: verdana;
font-size: 20px
</style>
</head>

<p>
<h2 align='center'><?php echo $name?></h2>
</p>

<body>
    <h2 align="center">Add New Menu</h2>

    <form action="newmenu.php" method="get" align="center" onsubmit="return confirm('Add new menu?');">
     
        <input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
       
        <label for="Menu ID">Menu ID:</label><br>
        <input type="text" id="menuid" name="menuid" value="" required><br><br>
        <label for="Menu Name">Menu Name:</label><br>
        <input type="text" id="menuname" name="menuname" value="" required><br><br>
        <label for="Category">Category:</label><br>
        <input type="text" id="category" name="category" value="" required><br><br>
        <label for="password">Price:</label><br>
        <input type="text" id="prices" name="prices" value="" required><br><br>
        <input type="submit" value="Submit" class="button">
        <a href="mainpage.php?id=<?php echo $id.'&name='.$name?>">Cancel</a>
    </form>
</body>
</p>

</html>