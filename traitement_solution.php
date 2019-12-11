<?php
include 'connection/db_connection_file.php';
$conn = OpenCon();
session_start();


if (isset($_SESSION['username'])){

    $username=$_SESSION['username'] ;

    $sql = "SELECT * FROM user WHERE username like '$username'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        //echo " le total est  " . $row["sumetotal"]. "<br>";

        $solutions =$row['solutions'];


    }



}
if($solutions == 'myoption1'){
    header("Location: panneau.php");
}else if($solutions =='myoption2'){
    header("Location: panneau2.php");
}if($solutions =='myoption3'){
    header("Location: panneau3.php");
}


?>