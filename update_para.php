<?php
include 'connection/db_connection_file.php';
$conn = OpenCon();
session_start();
$id_user = $_SESSION["user_id"];
$username=$_SESSION['username'];


if (isset($_POST['logger'])) {
    $logger= htmlspecialchars(addcslashes( $_POST['logger'], '\''));


}else{
    $logger='logger1';
}



if (isset($_POST['CD'])) {
    $CD = htmlspecialchars(addcslashes( $_POST['CD'], '\''));


}else{
    $CD=' ';
}


if (isset($_POST['weather'])) {
    $weather = htmlspecialchars(addcslashes( $_POST['weather'], '\''));


}else{
    $weather='weather2';
}



if (isset($_POST["Titre"])) {
    $Title = htmlspecialchars(addcslashes($_POST['Titre'], '\''));}else{


    $Title='Centrale photovoltaique';
}

if (isset($_POST["titre1"])) {
    $titre1 = htmlspecialchars(addcslashes($_POST['titre1'], '\''));}else{
    $titre1='Procuction actuelle';
}


if (isset($_POST["titre2"])) {
    $titre2 = htmlspecialchars(addcslashes($_POST['titre2'], '\''));}else{
    $titre2 = 'Ce batiment utilise de l energie solaire';

}

if (isset($_POST["titre3"])) {
    $titre3 = htmlspecialchars(addcslashes($_POST['titre3'], '\''));}else{


    $titre3='Vue mensuelle';
}

if (isset($_POST["titre4"])) {
    $titre4 = htmlspecialchars(addcslashes($_POST['titre4'], '\''));}else{


    $titre4='Ce batiment utilise de l energie solaire';
}

if (isset($_POST["calendar"])) {
    $calendar = htmlspecialchars(addcslashes($_POST['calendar'], '\''));}else{

    $calendar ='yes';

}
if (isset($_POST["myclock"])) {
    $clock = htmlspecialchars(addcslashes($_POST['myclock'], '\''));}else{$clock='clock2';

}
if (isset($_POST["textcolor"])) {
    $textcolor = $_POST['textcolor'];
}else{
    $textcolor='#fad345';
}

if (isset($_POST["color_graph"])) {
    $color_graph = $_POST['color_graph'];
}else{
    $color_graph='#fad345';
}


$sql="UPDATE `user` SET `titre`= '$Title',`meteo`='$weather',`CD`= '$CD',`type_clock`='$clock',`type_data_logger`='$logger',`titre1`='$titre1',`titre2`='$titre2',`color`='$textcolor',`titre3` = '$titre3',`titre4` ='$titre4',`calendar`= '$calendar',`color_graph` = '$color_graph' WHERE `id_user` LIKE '$id_user' ";
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