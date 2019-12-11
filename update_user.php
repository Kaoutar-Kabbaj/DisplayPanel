<?php
include 'connection/db_connection_file.php';
$conn = OpenCon();

if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $address = $_POST["address"];
    $email =$_POST["email"];
    $solutions = $_POST["solutions"];

    $phone = $_POST["phone"];
    // Check input errors before inserting in database
    if(isset($nom) && isset($address) && isset($email) && isset($solutions) && isset($phone)){
        // Prepare an update statement
        $sql = "UPDATE user SET nom='$nom', adresse='$address', email='$email', solutions='$solutions',num_tel = '$phone' WHERE id_user=$id";
        
        if (mysqli_query($conn, $sql)) {
            echo "true";
        }else {
            echo "false";
        }
    }
    // Close connection
    $conn->close();
}
?>