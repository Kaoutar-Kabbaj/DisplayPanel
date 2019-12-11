<?php
session_start();
include 'connection/db_connection_file.php';
$conn = OpenCon();
if ($_SESSION["loggedIn"] != true) {
    header("Location: authentification.php");
}
$directory=$_SESSION["directory"] ;
$user=$_SESSION["user"] ;
$clients = $_POST['clients'];

foreach($clients as $selectValue){
    $tab_clients_affected [] = $selectValue;
}
$data_affected =  json_encode($tab_clients_affected);

$data_wanted = implode(",", $clients);

$old_customer = $_SESSION["old_customer"];

if(isset($clients)){
    $sql0 = "UPDATE user SET `affected` = '0' WHERE  id_user IN ($old_customer)";
    if (mysqli_query($conn, $sql0)) {

        $sql = "UPDATE user SET list_customers= '$data_affected'WHERE id_user='$user'";
        if (mysqli_query($conn, $sql)) {
            $sql2 = "UPDATE user SET affected = '1' WHERE id_user IN ($data_wanted)";

            if (mysqli_query($conn, $sql2)) {
                header("location:manage_customers.php?msg=success");
            } else {
                echo "false";
            }
        } else {
            echo "false";
        }
    }else
    {
        echo "false";
    }

}else{

    header("location:manage_customers.php?msg=error");
}








?>
