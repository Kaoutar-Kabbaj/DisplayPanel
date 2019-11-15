<?php
include 'connection/db_connection_file.php';
$conn = OpenCon();
session_start();

$username=$_SESSION['username'];
$Title =  htmlspecialchars(addcslashes( $_POST['Titre'], '\''));
$weather = htmlspecialchars(addcslashes( $_POST['weather'], '\''));
$Data = htmlspecialchars(addcslashes( $_POST['Data'], '\''));
$clock = htmlspecialchars(addcslashes($_POST['myclock'], '\''));
$logger = htmlspecialchars(addcslashes($_POST['logger'], '\''));

$sql="UPDATE `user` SET `titre`= '$Title',`meteo`='$weather',`dossier`= '$Data',`type_clock`='$clock',`type_data_logger`='$logger' WHERE `username` LIKE '$username' ";
$result = $conn->query($sql);

if ($result === TRUE) {
    $data = "success";
//   header('Location:espace.php?word=upsucess');
} else {
    $data = "error";
//   header('Location:espace.php?word=error');
}
$conn->close();
echo json_encode(['msg' => $data]);
?>