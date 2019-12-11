

<?php
// Include config file

include 'connection/db_connection_file.php';
$conn = OpenCon();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $update = true;
    $record = mysqli_query($conn,"SELECT * FROM user WHERE id_user='$id'");

    if (count($record) == 1 ) {
        $n = mysqli_fetch_array($record);
        $nom = $n['nom'];
        $address = $n['adresse'];
        $email = $n['email'];
        $solutions = $n['solutions'];
        $num_tel = $n['num_tel'];
    }
    if($solutions == 'myoption1'){
        $data = "espace.php";
//        header("Location: panneau.php");
    }else if($solutions =='myoption2'){
        $data = "espace2.php";
//        header("Location: panneau2.php");
    }if($solutions =='myoption3'){
        $data = "espace3.php";
//        header("Location: panneau3.php");
    }

    echo json_encode(['url' => $data]);
}

?>

