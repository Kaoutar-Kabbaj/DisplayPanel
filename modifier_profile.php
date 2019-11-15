<?php
//test connection to the database
include 'connection/db_connection_file.php';
$conn = OpenCon();
session_start();
$user_session=$_SESSION['username'];

    $nom = htmlspecialchars(addcslashes($_POST["nom"], '\''));
    $username = htmlspecialchars(addcslashes($_POST["username"], '\''));
    $password = htmlspecialchars(addcslashes($_POST["password"], '\''));
    $email = htmlspecialchars(addcslashes($_POST["email"], '\''));
    $num_tel = htmlspecialchars(addcslashes($_POST["num_tel"], '\''));
    $username = htmlspecialchars(addcslashes($_POST["username"], '\''));
    $adresse = htmlspecialchars(addcslashes($_POST["adresse"], '\''));
    $CD = htmlspecialchars(addcslashes($_POST["CD"], '\''));
    $myselectbox = htmlspecialchars(addcslashes($_POST["myselectbox"], '\''));

    $sql= " UPDATE user SET nom='$nom',email='$email',num_tel='$num_tel',username='$username',password='$password',adresse='$adresse',CD='$CD',solutions='$myselectbox' WHERE username = '$user_session'";

    if ($conn->query($sql) === TRUE) {
          //echo "New record updated successfully";
        header("Location: user.php?word=upsucess");
    } else {
        header("Location: user.php?word=error");
    }

$conn->close();

?>