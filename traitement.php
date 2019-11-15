



<?php
//test connection to the database
include 'connection/db_connection_file.php';
$conn = OpenCon();
if(isset($_POST['name']) and isset($_POST['D_area']) and isset($_POST['email']) and isset($_POST['phone'])and isset($_POST['myselectbox'])and isset($_POST['username'])and isset($_POST['password'])){
$name = htmlspecialchars(addcslashes($_POST["name"], '\''));
$D_area = htmlspecialchars(addcslashes($_POST["D_area"], '\''));
$email = htmlspecialchars(addcslashes($_POST["email"], '\''));
$phone = htmlspecialchars(addcslashes($_POST["num_tel"], '\''));
$myselectbox = htmlspecialchars(addcslashes($_POST["myselectbox"], '\''));
$username = htmlspecialchars(addcslashes($_POST["username"], '\''));
$password = htmlspecialchars(addcslashes($_POST["password"], '\''));
$adresse=htmlspecialchars(addcslashes($_POST["adresse"], '\''));
$CD=htmlspecialchars(addcslashes($_POST["CD"], '\''));
$sql = "INSERT INTO `user`(`id_user`, `nom`, `D_area`, `email`, `num_tel`, `solutions`, `username`, `password`,`adresse`,`CD`) VALUES (null,'$name', '$D_area', '$email','$phone','$myselectbox','$username','$password','$adresse','$CD')";
//$sql = "INSERT user (nom, D_area, email,num_tel,solutions,username,password) VALUES ('$name', '$D_area', '$email','$phone','$myselectbox','$username','$password') ";
$result = $conn->query($sql);
if ($result === TRUE) {
    echo "New record created successfully";
	header("Location: authentification.php"); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}}
$conn->close(); 
?>