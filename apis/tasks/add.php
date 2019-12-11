<?php

session_start();
header('Content-Type: application/json');
include '../../connection/db_connection_file.php';
$conn = OpenCon();
$data = '';
$error = '';
if (isset($_SESSION['user'])) {
    $id = $_SESSION['user'];
    
    $sql = "INSERT INTO tasks(title,content,priority,done,user_id,created_date,updated_date)"
        . " values('" . $_POST['title'] . "','" . $_POST['title'] . "','" . $_POST['priority'] . "',0," . $id . ",NOW(),NOW())";

    $query = $conn->query($sql);
    if ($query === true) {
        $data = "success";

    } else {
        http_response_code(400);
        $error = "error";
    }
}
echo json_encode(
    ["data" => $data, "error" => $error]
);
