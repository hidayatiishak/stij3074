<?php
include_once("dbconnect.php");

//get data 
$name = $_POST['name'];
$email = $_POST['email']; 
$id = $_POST['id'];
$password = sha1($_POST['password']);

 if(!empty($_FILES['uploaded_file'])){
    $path = "profileimages/";
    $path = $path . $id.'.jpg';
     if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)){
        try {
            $sql = "INSERT INTO user(name, email, password,id)
            VALUES ('$name', '$email', '$password','$id')";
           
            $conn->exec($sql);
            echo "<script> alert('Sucessfully Register')</script>";
            echo "<script> window.location.replace('index.html') </script>;";
        } catch(PDOException $e) {
            echo "<script> alert('Registration Failed!')</script>";
            echo "<script> window.location.replace('register.html') </script>;";
        }
        $conn = null;
     
     }else{
          echo "<script> alert('Image upload error')</script>";
          echo "<script> window.location.replace('register.html') </script>;";
     }
 }


?>