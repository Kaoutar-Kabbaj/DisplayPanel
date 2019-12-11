<?php
include 'connection/db_connection_file.php';
$conn = OpenCon();
session_start();
$id_user = $_SESSION['user'] ;

if (isset($id_user)){


    $sql = "SELECT * FROM user WHERE id_user like '$id_user'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        //echo " le total est  " . $row["sumetotal"]. "<br>";

        $solutions =$row['solutions'];


    }



}
if($solutions == 'myoption1'){
//    echo "myoption1";
   header("Location: panneau.php");
}else if($solutions =='myoption2'){
//    echo "myoption2";
   header("Location: panneau2.php");
}if($solutions =='myoption3'){
    //echo "myoption3";
    header("Location: panneau3.php");
}


?>